
//  ARROWS  //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
const categoriesContainer = document.querySelector('.categories');
const prevArrow = document.getElementById('prev-arrow');
const nextArrow = document.getElementById('next-arrow');

if (categoriesContainer && prevArrow && nextArrow) {
    function getSlideAmount() {
        return categoriesContainer.offsetWidth / 3;
    }

    function slideCategories(direction) {
        const slideAmount = getSlideAmount();
        if (direction === 'left') {
            categoriesContainer.scrollBy({ left: -slideAmount, behavior: 'smooth' });
        } else if (direction === 'right') {
            categoriesContainer.scrollBy({ left: slideAmount, behavior: 'smooth' });
        }
    }

    prevArrow.addEventListener('click', () => slideCategories('left'));
    nextArrow.addEventListener('click', () => slideCategories('right'));
}
