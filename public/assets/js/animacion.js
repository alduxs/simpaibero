//SLIDE
let isotipo = document.getElementById("isotipo");
let btnempresa = document.getElementById("btnempresa");
let hunoslide = document.getElementById("hunoslide");
let parrafoslide = document.getElementById("parrafoslide");

document.addEventListener("DOMContentLoaded", function () {
    if (isotipo && btnempresa && hunoslide && parrafoslide) {
        setTimeout(function () {
            isotipo.classList.remove("opacity-0");
            isotipo.classList.add("opacity-1");
            btnempresa.classList.remove("opacity-0");
            btnempresa.classList.add("opacity-1");
        }, 700);

        setTimeout(function () {
            hunoslide.classList.remove("move-opacity-0");
            hunoslide.classList.add("move-opacity-1");
            parrafoslide.classList.remove("move-opacity-0");
            parrafoslide.classList.add("move-opacity-1");
        }, 700);
    }
});
