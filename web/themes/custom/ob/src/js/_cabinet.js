((Drupal, once) => {
  Drupal.behaviors.obCabinetProfiles = {
    attach(context) {
      once('ob-cabinet-profiles', '.cabinet-page .menu-section-page__body', context).forEach((body) => {
        const list = body.querySelector('ol');
        if (!list) return;
        list.setAttribute('role', 'list');
        Array.from(list.children).forEach((item) => {
          if (item.tagName !== 'LI') return;
          const text = item.firstChild;
          if (!text || text.nodeType !== Node.TEXT_NODE) return;
          const separator = text.textContent.indexOf(',');
          if (separator < 1) return;
          const name = document.createElement('strong');
          name.className = 'cabinet-member__name';
          name.textContent = text.textContent.slice(0, separator);
          const comma = document.createElement('span');
          comma.className = 'visually-hidden';
          comma.textContent = ',';
          const portfolio = document.createElement('div');
          portfolio.className = 'cabinet-member__portfolio';
          text.textContent = text.textContent.slice(separator + 1);
          while (item.firstChild) portfolio.append(item.firstChild);
          item.append(name, comma, portfolio);
        });
      });
    },
  };
})(Drupal, once);
