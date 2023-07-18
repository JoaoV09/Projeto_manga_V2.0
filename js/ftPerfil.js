addEventListener("DOMContentLoaded", () => {
var alvo = document.getElementById("perfil");
var alvo2 = document.getElementById("alvo");

alvo.addEventListener("click", function() {
    alvo2.style.display = "block";
})

document.addEventListener("click", function(event) {

    if (!alvo.contains(event.target) && !alvo2.contains(event.target)) {

        alvo2.style.display = "none";
    }
});
});