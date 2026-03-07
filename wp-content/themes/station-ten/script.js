document.addEventListener('DOMContentLoaded', () => {
    const tabGroups = document.querySelectorAll('[data-tab-group]');

    tabGroups.forEach((group) => {
        const buttons = group.querySelectorAll('[data-tab-button]');
        const panels = group.querySelectorAll('[data-tab-panel]');

        const activate = (name) => {
            buttons.forEach((button) => {
                const isActive = button.dataset.tabButton === name;
                button.classList.toggle('station-tab-active', isActive);
                button.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });

            panels.forEach((panel) => {
                const isActive = panel.dataset.tabPanel === name;
                panel.hidden = !isActive;
            });
        };

        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                activate(button.dataset.tabButton);
            });
        });

        const defaultButton = group.querySelector('[data-tab-button].station-tab-active') || buttons[0];

        if (defaultButton) {
            activate(defaultButton.dataset.tabButton);
        }
    });
});
