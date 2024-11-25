
//  DRAGING  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const categories = document.querySelector('.categories');
if (categories) {
    let isDragging = false;
    let startX;
    let scrollLeft;

    categories.addEventListener('mousedown', (e) => {
        isDragging = true;
        categories.classList.add('dragging');
        startX = e.pageX - categories.offsetLeft;
        scrollLeft = categories.scrollLeft;
    });

    categories.addEventListener('mouseleave', () => {
        isDragging = false;
        categories.classList.remove('dragging');
    });

    categories.addEventListener('mouseup', () => {
        isDragging = false;
        categories.classList.remove('dragging');
    });

    categories.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
        const x = e.pageX - categories.offsetLeft;
        const walk = (x - startX) * 2;
        categories.scrollLeft = scrollLeft - walk;
    });
}
