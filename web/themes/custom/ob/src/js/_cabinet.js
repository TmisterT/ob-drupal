((Drupal, once) => {
  Drupal.behaviors.obCabinetProfiles = {
    attach(context) {
      once('ob-cabinet-profiles', '.cabinet-page .menu-section-page__body', context).forEach((body) => {
        const list = body.querySelector('ol');
        if (!list) return;
        list.setAttribute('role', 'list');
        Array.from(list.children).forEach((item) => {
          if (item.tagName !== 'LI') return;
          const text = item.textContent.replace(/\s+/g, ' ').trim();
          const separator = text.indexOf(',');
          if (separator < 1) return;
          const portfolio = text.slice(separator + 1).trim();
          const office = portfolio.match(/^((?:(?:Vice President|President) and )?Minister)\s+(?:for|of)\s+(.+)$/i);
          // Keep unfamiliar editorial formats intact rather than guessing titles.
          if (!office || item.querySelectorAll('a').length > 1) return;
          const link = item.querySelector('a')?.cloneNode(true);
          let ministryText = office[2];
          if (link) {
            const acronym = link.textContent.trim();
            if (ministryText.endsWith(`(${acronym})`)) {
              ministryText = ministryText.slice(0, -(acronym.length + 2)).trim();
            }
            else return;
          }

          const title = document.createElement('p');
          title.className = 'cabinet-member__title';
          title.textContent = office[1];
          const name = document.createElement('h3');
          name.className = 'cabinet-member__name';
          name.textContent = text.slice(0, separator).trim();
          const ministry = document.createElement('div');
          ministry.className = 'cabinet-member__portfolio';
          const label = document.createElement('span');
          label.className = 'cabinet-member__label';
          label.textContent = Drupal.t('Ministry / Office');
          const ministryName = document.createElement('p');
          ministryName.className = 'cabinet-member__ministry';
          ministryName.textContent = ministryText;
          ministry.append(label, ministryName);
          item.replaceChildren(title, name, ministry);
          item.classList.add('cabinet-member');
          if (/President/i.test(office[1])) item.classList.add('cabinet-member--leadership');
          if (link) {
            const footer = document.createElement('div');
            footer.className = 'cabinet-member__footer';
            link.classList.add('cabinet-member__link');
            link.setAttribute('aria-label', Drupal.t('Visit @ministry website', { '@ministry': ministryText }));
            const arrow = document.createElement('span');
            arrow.setAttribute('aria-hidden', 'true');
            arrow.textContent = ' ↗';
            link.append(arrow);
            footer.append(link);
            item.append(footer);
          }
        });
      });
    },
  };
})(Drupal, once);
