((Drupal, once) => {
  Drupal.behaviors.obHomepageSearch = {
    attach(context) {
      once('ob-header-search', '[data-ob-header-search]', context).forEach((headerForm) => {
        headerForm.addEventListener('submit', (event) => {
          const homepageForm = document.querySelector('.homepage-search__form');
          event.preventDefault();
          if (!homepageForm) {
            const url = new URL(headerForm.dataset.homepageUrl, window.location.href);
            url.searchParams.set('keys', headerForm.querySelector('[name="keys"]').value.trim());
            url.hash = 'site-search';
            window.location.assign(url.href);
            return;
          }
          homepageForm.querySelector('[name="keys"]').value = headerForm.querySelector('[name="keys"]').value;
          homepageForm.closest('.homepage-search').scrollIntoView();
          homepageForm.requestSubmit();
        });
      });
      once('ob-homepage-search', '.homepage-search__form', context).forEach((form) => {
        const input = form.querySelector('[name="keys"]');
        const filter = form.querySelector('select');
        const section = form.closest('.homepage-search');
        const results = section.querySelector('[data-homepage-search-results]');
        const content = results.querySelector('[data-homepage-search-content]');
        const status = results.querySelector('[data-homepage-search-status]');
        const fallback = results.querySelector('[data-homepage-search-fallback]');
        const heading = results.querySelector('h2');
        let controller;

        const search = async (url) => {
          controller?.abort();
          const request = new AbortController();
          controller = request;
          results.hidden = false;
          results.setAttribute('aria-busy', 'true');
          content.replaceChildren();
          fallback.hidden = true;
          fallback.href = url.href;
          status.textContent = Drupal.t('Searching…');
          try {
            const response = await fetch(url, { signal: request.signal, credentials: 'same-origin' });
            if (!response.ok) throw new Error('Search unavailable');
            const html = await response.text();
            if (request.signal.aborted || controller !== request) return;
            const document = new DOMParser().parseFromString(html, 'text/html');
            const matches = document.querySelector('[data-ob-search-results]');
            if (!matches) throw new Error('Search response unavailable');
            content.append(matches);
            const pager = document.querySelector('#main-content .pagination-wrapper');
            if (pager) content.append(pager);
            status.textContent = Drupal.t('Results for “@query”', { '@query': input.value.trim() });
            heading.focus({ preventScroll: true });
          }
          catch (error) {
            if (error.name === 'AbortError' || controller !== request) return;
            status.textContent = Drupal.t('Search results could not be loaded here. Please try again or open the search results page.');
            fallback.hidden = false;
          }
          finally {
            if (controller === request) results.removeAttribute('aria-busy');
          }
        };

        const submit = () => {
          const url = new URL(form.action, window.location.href);
          url.searchParams.set('keys', input.value.trim());
          if (filter.value) url.searchParams.append('f[]', filter.value);
          search(url);
        };
        form.addEventListener('submit', (event) => {
          event.preventDefault();
          if (form.reportValidity()) submit();
        });
        form.addEventListener('reset', () => {
          controller?.abort();
          controller = undefined;
          input.value = '';
          filter.value = '';
          document.querySelectorAll('[data-ob-header-search] [name="keys"]').forEach((field) => {
            field.value = '';
          });
          content.replaceChildren();
          status.textContent = '';
          fallback.hidden = true;
          fallback.removeAttribute('href');
          results.hidden = true;
          results.removeAttribute('aria-busy');
          const url = new URL(window.location.href);
          ['keys', 'f[]', 'f[0]', 'page'].forEach((key) => url.searchParams.delete(key));
          window.history.replaceState(window.history.state, '', url.href);
          input.focus({ preventScroll: true });
        });
        filter.addEventListener('change', () => {
          if (input.value.trim()) submit();
        });
        content.addEventListener('click', (event) => {
          const link = event.target.closest('.pagination-wrapper a');
          if (!link || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
          const url = new URL(link.href, window.location.href);
          if (url.origin !== window.location.origin) return;
          event.preventDefault();
          search(url);
        });
        const focusSearch = () => input.focus({ preventScroll: true });
        if (window.location.hash === '#site-search') focusSearch();
        window.addEventListener('hashchange', () => {
          if (window.location.hash === '#site-search') focusSearch();
        });
        const params = new URLSearchParams(window.location.search);
        if (params.get('keys')) {
          input.value = params.get('keys');
          const type = params.get('f[]') || params.get('f[0]');
          if ([...filter.options].some((option) => option.value === type)) filter.value = type;
          submit();
        }
      });
    },
  };
})(Drupal, once);
