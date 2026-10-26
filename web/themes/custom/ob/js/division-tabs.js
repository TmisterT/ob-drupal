(function (Drupal, once) {
  Drupal.behaviors.obDivisionTabs = {
    attach(context) {
      once('ob-division-tabs', '.division-page .menu-section-page__body', context).forEach((body) => {
        const headings = ['climate-change', 'disaster-risk-management'].map((id) => body.querySelector(`#${id}`));
        if (headings.some((heading) => !heading) || headings[0].parentElement !== headings[1].parentElement) return;

        const tablist = document.createElement('div');
        tablist.className = 'division-tabs';
        tablist.setAttribute('role', 'tablist');
        tablist.setAttribute('aria-label', Drupal.t('Division functions'));
        headings[0].before(tablist);
        const panels = [];
        const tabs = headings.map((heading) => {
          const panel = document.createElement('div');
          panel.className = 'division-tabs__panel';
          panel.id = `${heading.id}-panel`;
          panel.setAttribute('role', 'tabpanel');
          panel.setAttribute('tabindex', '0');
          heading.before(panel);
          let current = heading;
          do {
            const next = current.nextSibling;
            panel.append(current);
            current = next;
          } while (current && !(current.nodeType === 1 && current.tagName === 'H2'));
          const tab = document.createElement('button');
          tab.type = 'button';
          tab.id = `${heading.id}-tab`;
          tab.textContent = heading.textContent;
          tab.setAttribute('role', 'tab');
          tab.setAttribute('aria-controls', panel.id);
          panel.setAttribute('aria-labelledby', tab.id);
          tablist.append(tab);
          panels.push(panel);
          return tab;
        });

        function select(index, focus = false) {
          tabs.forEach((tab, i) => {
            tab.setAttribute('aria-selected', String(i === index));
            tab.tabIndex = i === index ? 0 : -1;
            panels[i].hidden = i !== index;
          });
          if (focus) tabs[index].focus();
        }
        tabs.forEach((tab, index) => {
          tab.addEventListener('click', () => select(index));
          tab.addEventListener('keydown', (event) => {
            let next;
            if (event.key === 'ArrowRight') next = (index + 1) % tabs.length;
            if (event.key === 'ArrowLeft') next = (index + tabs.length - 1) % tabs.length;
            if (event.key === 'Home') next = 0;
            if (event.key === 'End') next = tabs.length - 1;
            if (next !== undefined) {
              event.preventDefault();
              select(next, true);
            }
          });
        });
        function followHash() {
          const index = panels.findIndex((panel) => Array.from(panel.querySelectorAll('[id]')).some((element) => `#${element.id}` === window.location.hash));
          if (index !== -1) select(index);
        }
        select(window.location.hash === '#disaster-risk-management' ? 1 : 0);
        followHash();
        window.addEventListener('hashchange', followHash);
        body.querySelectorAll('a[href="#climate-change"], a[href="#disaster-risk-management"]').forEach((link) => {
          link.addEventListener('click', () => select(link.hash === '#climate-change' ? 0 : 1));
        });
      });
    },
  };
})(Drupal, once);
