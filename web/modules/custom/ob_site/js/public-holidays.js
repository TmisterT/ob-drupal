(function (Drupal, once) {
  'use strict';

  Drupal.behaviors.holidayPdfViewer = {
    attach(context) {
      once('holiday-pdf-viewer', '.holiday-archive__pdf', context).forEach((details) => {
        const loadPdf = () => {
          const frame = details.querySelector('iframe[data-pdf-src]');
          if (details.open && frame) {
            frame.src = frame.dataset.pdfSrc;
            delete frame.dataset.pdfSrc;
          }
        };
        details.addEventListener('toggle', loadPdf);
        loadPdf();
      });
    }
  };
})(Drupal, once);
