import Waves from 'node-waves';

window.Waves = Waves;

(function () {
    "use strict";

    function initComponents() {
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        var popoverTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="popover"]')
        );
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }

    function initSettings() {
        var body = document.getElementsByTagName("body")[0];
        var lightDarkBtn = document.querySelectorAll(".light-dark-mode");
        if (lightDarkBtn && lightDarkBtn.length) {
            lightDarkBtn.forEach(function (item) {
                item.addEventListener("click", function (event) {
                    if (
                        body.hasAttribute("data-bs-theme") &&
                        body.getAttribute("data-bs-theme") == "dark"
                    ) {
                        document.body.setAttribute("data-bs-theme", "light");
                    } else {
                        document.body.setAttribute("data-bs-theme", "dark");
                    }
                });
            });
        }
    }

    function init() {
        initComponents();
        initSettings();
        Waves.init();
    }

    init();
})();
