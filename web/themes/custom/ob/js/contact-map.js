(function (Drupal, once) {
  Drupal.behaviors.obContactMap = {
    attach(context) {
      once('ob-contact-map', '[data-contact-map]', context).forEach((container) => {
        const button = container.querySelector('[data-load-contact-map]');
        button.hidden = false;
        button.addEventListener('click', () => {
          const frame = document.createElement('iframe');
          frame.title = Drupal.t('Office of Te Beretitenti location on Google Maps');
          frame.src = container.dataset.mapSrc;
          frame.referrerPolicy = 'no-referrer-when-downgrade';
          frame.allowFullscreen = true;
          container.replaceChildren(frame);
          frame.focus();
        }, { once: true });
      });
    },
  };
})(Drupal, once);
