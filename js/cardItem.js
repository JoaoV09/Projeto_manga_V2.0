addEventListener("DOMContentLoaded", () => {
var cards = document.querySelectorAll('.card-itens');

cards.forEach(function(card) {
    var mangasContainer = card.querySelector('.container-item');
    var isDragging = false;
    var startPosition = 0;
    var currentTranslate = 0;
    var prevTranslate = 0;
    var minTranslate = 0;
    var maxTranslate = 0;

    mangasContainer.addEventListener('mousedown', dragStart);
    mangasContainer.addEventListener('mousemove', drag);
    mangasContainer.addEventListener('mouseup', dragEnd);
    mangasContainer.addEventListener('mouseleave', dragEnd);
    mangasContainer.addEventListener('touchstart', dragStart);
    mangasContainer.addEventListener('touchmove', drag);
    mangasContainer.addEventListener('touchend', dragEnd);
    mangasContainer.addEventListener('touchcancel', dragEnd);

    function dragStart(e) {
        if (e.type === 'touchstart') {
            startPosition = e.touches[0].clientX;
        } else {
            startPosition = e.clientX;
            e.preventDefault();
        }
        isDragging = true;
        requestAnimationFrame(updatePosition);
        var containerWidth = mangasContainer.offsetWidth;
        var contentWidth = mangasContainer.scrollWidth;
        maxTranslate = containerWidth - contentWidth;
    }

    function drag(e) {
        if (isDragging) {
            var currentPosition = e.type === 'touchmove' ? e.touches[0].clientX : e.clientX;
            currentTranslate = prevTranslate + currentPosition - startPosition;
            if (currentTranslate > 0) {
                currentTranslate = 0;
            }
            if (currentTranslate < maxTranslate) {
                currentTranslate = maxTranslate;
            }
        }
    }

    function dragEnd() {
        isDragging = false;
        prevTranslate = currentTranslate;
    }

    function updatePosition() {
        mangasContainer.style.transform = `translateX(${currentTranslate}px)`;
        if (isDragging) {
            requestAnimationFrame(updatePosition);
        }
    }
});

});