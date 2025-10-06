import "./bootstrap";
import 'flowbite'

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Toggle Mobile Nav
document.addEventListener("DOMContentLoaded", () => {
    const header = document.querySelector("header");
    if (!header) return;

    const toggleBtn = header.querySelector("[data-nav-toggle]");
    const mobilePanel = document.querySelector("[data-nav-panel]");

    if (!toggleBtn || !mobilePanel) return;

    const openClass = "block";
    const closedClass = "hidden";

    mobilePanel.classList.add(closedClass);
    toggleBtn.setAttribute("aria-expanded", "false");

    function toggleMenu() {
        const isHidden = mobilePanel.classList.contains(closedClass);
        mobilePanel.classList.toggle(closedClass, !isHidden);
        mobilePanel.classList.toggle(openClass, isHidden);
        toggleBtn.setAttribute("aria-expanded", String(isHidden));
    }

    toggleBtn.addEventListener("click", toggleMenu);

    document.addEventListener("click", (e) => {
        if (!mobilePanel.classList.contains("block")) return;
        const isClickInside =
            header.contains(e.target) || mobilePanel.contains(e.target);
        if (!isClickInside) {
            mobilePanel.classList.remove(openClass);
            mobilePanel.classList.add(closedClass);
            toggleBtn.setAttribute("aria-expanded", "false");
        }
    });

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape" && mobilePanel.classList.contains("block")) {
            mobilePanel.classList.remove(openClass);
            mobilePanel.classList.add(closedClass);
            toggleBtn.setAttribute("aria-expanded", "false");
            toggleBtn.focus();
        }
    });
});
