function showCategory(category) {
    const items = document.querySelectorAll('.movie-item');
    items.forEach(item => {
        if (item.classList.contains(category)) {
            item.style.display = 'block';
        } else {
            item.style.display = 'none';
        }
    });

    // Update active category
    const categoryItems = document.querySelectorAll('.categories li');
    categoryItems.forEach(li => {
        li.classList.remove('active');
    });
    document.querySelector(`.categories li[onclick*="${category}"]`).classList.add('active');
}

// Initial display
document.addEventListener('DOMContentLoaded', () => {
    showCategory('action'); // Show the default category
});