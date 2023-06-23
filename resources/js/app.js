import "./bootstrap";

import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

let navbar = document.querySelector(".header .flex .navbar");

document.querySelector("#menu-btn").onclick = () => {
    navbar.classList.toggle("active");
};

window.onscroll = () => {
    navbar.classList.remove("active");
};

document.querySelectorAll('input[type="number"]').forEach((inputNumber) => {
    inputNumber.oninput = () => {
        if (inputNumber.value.length > inputNumber.maxLength)
            inputNumber.value = inputNumber.value.slice(
                0,
                inputNumber.maxLength
            );
    };
});

AOS.init({
    duration: 400,
    delay: 200,
});

document.querySelector("#search").addEventListener("input", function () {
    let searchQuery = this.value;

    // Hacer una solicitud AJAX a la API de eventos
    fetch(`/api/events/search?query=${searchQuery}`)
        .then((response) => response.text())
        .then((data) => {
            // Actualizar el div de resultados con los nuevos datos
            document.querySelector("#eventResults").innerHTML = data;
        });
});
