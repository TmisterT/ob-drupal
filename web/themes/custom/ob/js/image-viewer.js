(function (Drupal, once) {
  Drupal.behaviors.obImageViewer = {
    attach(context) {
      once('ob-image-viewer', 'a[data-image-viewer]', context).forEach((link) => {
        link.addEventListener('click', (event) => {
          if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) return;
          if (typeof HTMLDialogElement === 'undefined') return;
          event.preventDefault();
          const dialog = document.createElement('dialog');
          dialog.className = 'news-image-viewer';
          dialog.setAttribute('aria-label', Drupal.t('Image viewer'));
          const toolbar = document.createElement('div');
          toolbar.className = 'news-image-viewer__toolbar';
          const stage = document.createElement('div');
          stage.className = 'news-image-viewer__stage';
          const img = document.createElement('img');
          img.src = link.href;
          img.alt = link.querySelector('img')?.alt || '';
          let zoom = 1;
          const button = (label, action) => {
            const control = document.createElement('button');
            control.type = 'button';
            control.textContent = label;
            control.addEventListener('click', action);
            toolbar.append(control);
            return control;
          };
          const resize = () => {
            img.style.width = `${zoom * 100}%`;
            img.style.maxHeight = zoom === 1 ? '100%' : 'none';
            out.disabled = zoom <= 1;
            more.disabled = zoom >= 4;
          };
          const out = button(Drupal.t('Zoom out'), () => { zoom = Math.max(1, zoom - 0.5); resize(); });
          const more = button(Drupal.t('Zoom in'), () => { zoom = Math.min(4, zoom + 0.5); resize(); });
          const original = document.createElement('a');
          original.href = link.href;
          original.target = '_blank';
          original.rel = 'noopener';
          original.textContent = Drupal.t('Open original');
          toolbar.append(original);
          const close = button(Drupal.t('Close'), () => dialog.close());
          stage.append(img);
          dialog.append(toolbar, stage);
          document.body.append(dialog);
          dialog.addEventListener('close', () => { dialog.remove(); link.focus(); });
          dialog.addEventListener('click', (e) => { if (e.target === dialog) dialog.close(); });
          resize();
          dialog.showModal();
          close.focus();
        });
      });
    },
  };
})(Drupal, once);
