((Drupal, once) => {
  Drupal.behaviors.obOfficialBoard = {
    attach(context) {
      once('ob-official-board', '[data-official-board]', context).forEach((board) => {
        const panels = Array.from(board.querySelectorAll('[data-board-panel]'));
        const buttons = Array.from(board.querySelectorAll('[data-board-select]'));
        if (!panels.length || panels.length !== buttons.length) return;
        const status = board.querySelector('[data-board-status]');
        const current = board.querySelector('[data-board-current]');
        let selected = 0;
        const select = (index, announce = true) => {
          selected = (index + panels.length) % panels.length;
          panels.forEach((panel, position) => { panel.hidden = position !== selected; });
          buttons.forEach((button, position) => {
            button.hidden = false;
            button.setAttribute('aria-pressed', String(position === selected));
          });
          current.textContent = String(selected + 1);
          if (announce) {
            status.textContent = status.dataset.statusTemplate
              .replace('@current', String(selected + 1))
              .replace('@total', String(panels.length))
              .replace('@title', panels[selected].querySelector('h3').textContent);
          }
        };
        buttons.forEach((button, index) => {
          button.addEventListener('click', () => select(index));
          button.addEventListener('keydown', (event) => {
            let indexToSelect;
            if (event.key === 'ArrowDown' || event.key === 'ArrowRight') indexToSelect = (index + 1) % buttons.length;
            if (event.key === 'ArrowUp' || event.key === 'ArrowLeft') indexToSelect = (index + buttons.length - 1) % buttons.length;
            if (event.key === 'Home') indexToSelect = 0;
            if (event.key === 'End') indexToSelect = buttons.length - 1;
            if (indexToSelect === undefined) return;
            event.preventDefault();
            select(indexToSelect);
            buttons[indexToSelect].focus();
          });
        });
        board.querySelector('[data-board-prev]').addEventListener('click', () => select(selected - 1));
        board.querySelector('[data-board-next]').addEventListener('click', () => select(selected + 1));
        board.querySelector('[data-board-controls]').hidden = panels.length < 2;
        board.querySelectorAll('[data-board-fallback]').forEach((link) => { link.hidden = true; });
        select(0, false);
      });
    },
  };
})(Drupal, once);
