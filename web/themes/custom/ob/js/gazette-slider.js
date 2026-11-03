(function (Drupal, once) {
  'use strict';
  Drupal.behaviors.obGazetteSlider = {
    attach(context) {
      once('ob-gazette-slider', '[data-gazette-slider]', context).forEach((section) => {
        const track = section.querySelector('.gazette-slider');
        if (!track) return;
        const controls = section.querySelector('[data-gazette-controls]');
        const previous = section.querySelector('[data-gazette-prev]');
        const next = section.querySelector('[data-gazette-next]');
        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        const updateControls = () => {
          const overflow = track.scrollWidth > track.clientWidth + 2;
          controls.hidden = !overflow;
          previous.disabled = track.scrollLeft <= 2;
          next.disabled = track.scrollLeft + track.clientWidth >= track.scrollWidth - 2;
        };
        const move = (direction) => {
          const card = track.querySelector('.gazette-card');
          const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
          track.scrollBy({ left: direction * (card.getBoundingClientRect().width + gap), behavior: reducedMotion.matches ? 'instant' : 'smooth' });
        };
        previous.addEventListener('click', () => move(-1));
        next.addEventListener('click', () => move(1));
        track.addEventListener('scroll', updateControls, { passive: true });
        track.addEventListener('keydown', (event) => {
          if (event.target !== track || !['ArrowLeft', 'ArrowRight'].includes(event.key)) return;
          event.preventDefault();
          move(event.key === 'ArrowRight' ? 1 : -1);
        });
        if (window.ResizeObserver) new ResizeObserver(updateControls).observe(track);
        else window.addEventListener('resize', updateControls);
        updateControls();

        const dialog = section.querySelector('[data-gazette-dialog]');
        if (!dialog || typeof dialog.showModal !== 'function') return;
        const documentPanel = dialog.querySelector('[data-gazette-document]');
        let opener;
        section.querySelectorAll('[data-gazette-preview]').forEach((link) => {
          link.addEventListener('click', (event) => {
            if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
            event.preventDefault();
            opener = link;
            dialog.querySelector('#gazette-viewer-title').textContent = link.dataset.gazetteTitle;
            dialog.querySelector('[data-gazette-open]').href = link.href;
            dialog.querySelector('[data-gazette-download]').href = link.href;
            const frame = document.createElement('iframe');
            frame.title = documentPanel.dataset.viewerTitle + ': ' + link.dataset.gazetteTitle;
            frame.src = link.href;
            documentPanel.replaceChildren(frame);
            dialog.showModal();
            document.documentElement.classList.add('gazette-preview-open');
          });
        });
        dialog.querySelector('[data-gazette-close]').addEventListener('click', () => dialog.close());
        dialog.addEventListener('click', (event) => {
          if (event.target !== dialog) return;
          const box = dialog.getBoundingClientRect();
          if (event.clientX < box.left || event.clientX > box.right || event.clientY < box.top || event.clientY > box.bottom) dialog.close();
        });
        dialog.addEventListener('close', () => {
          documentPanel.replaceChildren();
          document.documentElement.classList.remove('gazette-preview-open');
          if (opener?.isConnected) opener.focus();
        });
      });
    }
  };
})(Drupal, once);
