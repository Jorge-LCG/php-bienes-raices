document.addEventListener("DOMContentLoaded", function () {
    eventListerners();
    darkMode();
});

function darkMode() {
    const darkModeBoton = document.querySelector(".dark-mode-boton");
    const isDarkMode = localStorage.getItem("darkMode");
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if (prefiereDarkMode.matches) {
        document.body.classList.add("dark-mode");
    } else {
        document.body.classList.remove("dark-mode");
    }

    prefiereDarkMode.addEventListener("change", function () {
        if (prefiereDarkMode.matches) {
            document.body.classList.add("dark-mode");
        } else {
            document.body.classList.remove("dark-mode");
        }
    });

    if (isDarkMode === "enabled") {
        document.body.classList.add('dark-mode');
    }

    darkModeBoton.addEventListener("click", function () {
        document.body.classList.toggle('dark-mode');
 
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('darkMode', 'enabled');
        } else {
            localStorage.setItem('darkMode', 'disabled');
        }
    });
}

function eventListerners() {
    const mobileBoton = document.querySelector(".mobile-menu");
    mobileBoton.addEventListener("click", navegacionResponsiva);
}

function navegacionResponsiva() {
    const navegacion = document.querySelector(".navegacion");

    if (navegacion.classList.contains("mostrar")) {
        navegacion.classList.remove("mostrar");
    } else {
        navegacion.classList.add("mostrar");
    }
}