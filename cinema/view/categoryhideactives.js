

///  CATEGORY HIDE ACTIVES  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// JavaScript to filter video cards based on category
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.category');
    const videoCards = document.querySelectorAll('.video-card');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Remove active class from all buttons
            buttons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Show or hide video cards based on category
            videoCards.forEach(card => {
                if (category === 'all' || card.getAttribute('data-category') === category) {
                    card.style.display = 'block';  // Show the video card
                } else {
                    card.style.display = 'none';  // Hide the video card
                }
            });
        });
    });
});
