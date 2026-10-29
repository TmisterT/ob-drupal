import Dropdown from 'bootstrap/js/dist/dropdown';

((Drupal, once) => {
  Drupal.behaviors.obHoverNavigation = {
    attach(context) {
      once('ob-hover-navigation', '.primary-navigation', context).forEach((navigation) => {
        const desktop = window.matchMedia('(min-width: 1200px) and (any-hover: hover) and (any-pointer: fine)');
        const items = Array.from(navigation.querySelectorAll('li.dropdown'))
          .map((item) => ({
            item,
            toggle: item.querySelector(':scope > [data-bs-toggle="dropdown"]'),
            menu: item.querySelector(':scope > .dropdown-menu'),
            timer: undefined,
          }))
          .filter(({ toggle, menu }) => toggle && menu);

        const cancelClose = (entry) => window.clearTimeout(entry.timer);
        const close = (entry) => {
          cancelClose(entry);
          Dropdown.getOrCreateInstance(entry.toggle).hide();
          entry.item.classList.remove('opens-left');
        };
        const closeBranch = (entry) => {
          items.filter(({ item }) => entry.item.contains(item)).reverse().forEach(close);
        };

        items.forEach((entry) => {
          const { item, toggle, menu } = entry;
          item.addEventListener('pointerenter', (event) => {
            if (!desktop.matches || event.pointerType !== 'mouse') return;
            cancelClose(entry);
            items.filter((other) => other.item !== item && other.item.parentElement === item.parentElement)
              .forEach(closeBranch);
            // Match Bootstrap's open state without moving keyboard focus on hover.
            toggle.classList.add('show');
            toggle.setAttribute('aria-expanded', 'true');
            menu.classList.add('show');
            if (item.parentElement.classList.contains('dropdown-menu')) {
              item.classList.remove('opens-left');
              if (menu.getBoundingClientRect().right > window.innerWidth - 8) {
                item.classList.add('opens-left');
              }
            }
          });
          item.addEventListener('pointerleave', (event) => {
            if (!desktop.matches || event.pointerType !== 'mouse') return;
            cancelClose(entry);
            entry.timer = window.setTimeout(() => {
              if (!item.contains(document.activeElement)) closeBranch(entry);
            }, 250);
          });
          item.addEventListener('focusout', (event) => {
            if (!item.contains(event.relatedTarget) && !item.matches(':hover')) closeBranch(entry);
          });
          toggle.addEventListener('hide.bs.dropdown', (event) => {
            if (event.target !== toggle) return;
            items.filter((other) => other.item !== item && item.contains(other.item)).reverse().forEach(close);
          });
        });
        desktop.addEventListener('change', () => items.slice().reverse().forEach(close));
      });
    },
  };
})(Drupal, once);
