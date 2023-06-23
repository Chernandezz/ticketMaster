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
