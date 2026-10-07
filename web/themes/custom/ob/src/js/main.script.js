// * Bootstrap libraries
import './_bootstrap';
import './_homepage-search';
import './_official-board';

// * Any other global site-wide JavaScript should be placed below.



((Drupal, once) => {
  // Dismissible sitewide alert behavior.
  Drupal.behaviors.obSitewideAlert = {
    attach(context) {
      once('ob-site-alert', '[data-site-alert-dismiss]', context).forEach((button) => {
        const alert = button.closest('.site-alert');
        if (!alert) return;
        const id = alert.getAttribute('data-site-alert-id') || 'site-alert';
        // hide if previously dismissed
        if (localStorage.getItem('dismissed:' + id)) {
          alert.classList.add('site-alert--hidden');
          return;
        }
        button.addEventListener('click', () => {
          alert.classList.add('site-alert--hidden');
          try { localStorage.setItem('dismissed:' + id, '1'); } catch (e) { /* noop */ }
        });
      });
    },
  };

  Drupal.behaviors.obHomepageCarousel = {
    attach(context) {
      once('ob-homepage-carousel', '#homepage-hero-carousel', context).forEach((element) => {
        const $ = window.jQuery;
        const slides = Array.from(element.querySelectorAll('.homepage-slider__slide'));
        const indicators = Array.from(element.querySelectorAll('[data-homepage-slide-to]'));
        const toggle = element.querySelector('[data-homepage-carousel-toggle]');
        const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
        let paused = reducedMotion.matches;
        let focused = false;
        let hovered = false;
        let slider;

        const updateSlides = (instance) => {
          slides.forEach((slide, index) => {
            const active = index === instance.currentSlide;
            slide.classList.toggle('active', active);
            slide.setAttribute('aria-hidden', active ? 'false' : 'true');
            slide.inert = !active;
          });
          indicators.forEach((button, index) => {
            const active = index === instance.currentSlide;
            button.classList.toggle('active', active);
            if (active) button.setAttribute('aria-current', 'true');
            else button.removeAttribute('aria-current');
          });
        };
        const updatePlayback = () => {
          if (!slider) return;
          if (paused || focused || hovered) slider.pause();
          else slider.play();
          if (toggle) {
            toggle.setAttribute('aria-pressed', paused ? 'true' : 'false');
            toggle.classList.toggle('is-paused', paused);
            toggle.querySelector('.visually-hidden').textContent = paused
              ? toggle.dataset.labelPlay : toggle.dataset.labelPause;
          }
        };

        $(element).flexslider({
          selector: '.homepage-slider__slides > .homepage-slider__slide',
          animation: 'fade',
          animationSpeed: reducedMotion.matches ? 0 : 650,
          slideshowSpeed: 7000,
          slideshow: slides.length > 1 && !paused,
          fadeFirstSlide: false,
          controlNav: false,
          directionNav: false,
          keyboard: false,
          pauseOnAction: false,
          touch: true,
          start(instance) {
            slider = instance;
            updateSlides(instance);
            if (slides.length > 1) updatePlayback();
          },
          after: updateSlides,
        });
        slider = $(element).data('flexslider');
        updateSlides(slider);
        if (slides.length < 2) return;
        toggle?.addEventListener('click', () => {
          paused = !paused;
          updatePlayback();
        });
        indicators.forEach((button, index) => {
          button.addEventListener('click', () => slider.flexAnimate(index));
        });
        element.querySelectorAll('[data-homepage-direction]').forEach((button) => {
          button.addEventListener('click', () => {
            slider.flexAnimate(slider.getTarget(button.dataset.homepageDirection));
          });
        });
        element.addEventListener('keydown', (event) => {
          if (!['ArrowLeft', 'ArrowRight'].includes(event.key)
            || event.target.matches('input, textarea, select, [contenteditable]')) return;
          event.preventDefault();
          slider.flexAnimate(slider.getTarget(event.key === 'ArrowLeft' ? 'prev' : 'next'));
        });
        element.addEventListener('mouseenter', () => { hovered = true; updatePlayback(); });
        element.addEventListener('mouseleave', () => { hovered = false; updatePlayback(); });
        element.addEventListener('focusin', () => { focused = true; updatePlayback(); });
        element.addEventListener('focusout', (event) => {
          focused = element.contains(event.relatedTarget);
          updatePlayback();
        });
        reducedMotion.addEventListener('change', (event) => {
          slider.vars.animationSpeed = event.matches ? 0 : 650;
          if (event.matches) paused = true;
          updatePlayback();
        });
      });
    },
  };

  Drupal.behaviors.obSectionNavigation = {
    attach(context) {
      once('ob-section-nav-toggle', '[data-section-nav-toggle]', context).forEach((button) => {
        const panel = document.getElementById(button.getAttribute('aria-controls'));
        if (!panel) {
          return;
        }

        const item = button.closest('.section-nav__item');
        const setExpanded = (expanded) => {
          button.setAttribute('aria-expanded', expanded ? 'true' : 'false');
          panel.hidden = !expanded;
          item?.classList.toggle('is-open', expanded);
        };

        setExpanded(button.getAttribute('aria-expanded') === 'true');
        button.addEventListener('click', () => {
          setExpanded(button.getAttribute('aria-expanded') !== 'true');
        });
      });
    },
  };
})(Drupal, once);
