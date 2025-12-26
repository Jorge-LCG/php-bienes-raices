document.addEventListener("DOMContentLoaded", function () {
    eventListerners();
    darkMode();
    alertas();
});

function darkMode() {
    const darkModeBoton = document.querySelector(".dark-mode-boton");
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    const isDarkMode = localStorage.getItem("darkMode");

    if (isDarkMode === "enabled") {
        document.body.classList.add("dark-mode");
    } else if (isDarkMode === "disabled") {
        document.body.classList.remove("dark-mode");
    }
    else if (prefiereDarkMode.matches) {
        document.body.classList.add("dark-mode");
    }

    darkModeBoton.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");

        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
        } else {
            localStorage.setItem("darkMode", "disabled");
        }
    });
}

function eventListerners() {
    const mobileBoton = document.querySelector(".mobile-menu");
    mobileBoton.addEventListener("click", navegacionResponsiva);

    const metodoContacto = document.querySelectorAll("input[name='contacto[contacto]']");
    metodoContacto.forEach(input => input.addEventListener("click", mostrarMetodosContacto));
}

function navegacionResponsiva() {
    const navegacion = document.querySelector(".navegacion");

    if (navegacion.classList.contains("mostrar")) {
        navegacion.classList.remove("mostrar");
    } else {
        navegacion.classList.add("mostrar");
    }
}

function alertas() {
    const alerta = document.getElementById("alerta");

    setTimeout(() => {
        alerta.style.display = "none";
    }, 3000);
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector("#contacto");

    if (e.target.value === "telefono") {
        contactoDiv.innerHTML = `
            <label for="telefono">Teléfono</label>
            <input 
                type="tel" 
                id="telefono" 
                name="contacto[telefono]" 
                placeholder="Tu telefono"
            >

            <p>Seleccione la fecha y hora</p>

            <label for="fecha">Fecha</label>
            <input 
                type="date" 
                id="fecha" 
                name="contacto[fecha]"
            >
            
            <label for="hora">Hora</label>
            <input 
                type="time" 
                id="hora" 
                min="09:00" 
                max="18:00" 
                name="contacto[hora]"
            >
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input 
                type="email" 
                id="email" 
                name="contacto[email]" 
                placeholder="Tu email"
            >
        `;
    }
}