document.addEventListener("DOMContentLoaded", function () {
    eventListerners();
});

function eventListerners() {
    document.addEventListener("click", navegacionResponsiva);
}

function navegacionResponsiva() {
    const navegacion = document.querySelector(".navegacion");

    if (navegacion.classList.contains("mostrar")) {
        navegacion.classList.remove("mostrar");
    } else {
        navegacion.classList.add("mostrar");
    }
}