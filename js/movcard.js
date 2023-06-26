addEventListener("DOMContentLoaded", () => {
    const left = document.querySelector(".left");
    const right = document.querySelector(".right");
    const card = document.querySelector(".card");

    var contador = 0;

    left.addEventListener("click", () => {
        if(contador != 0) {
            contador = contador + 80;
            card.style.marginLeft = contador + "vw";
            card.style.transition = "all 0.9s";
        }
    })
    right.addEventListener("click", () => {
        if (contador > -100) {
            contador = contador + -80;
            card.style.marginLeft = contador + "vw";
            card.style.transition = "all 0.9s";
        }
    })
});