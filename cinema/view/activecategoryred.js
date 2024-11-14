

//  ACTIVE CATEGORY RED  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', () => {
  const categoryButtons = document.querySelectorAll('.category');
  const videoCards = document.querySelectorAll('.video-card');

  categoryButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Remove active class from all buttons
      categoryButtons.forEach(btn => btn.classList.remove('active'));
      
      // Add active class to the clicked button
      button.classList.add('active');
 
      const category = button.getAttribute('data-category');
  
      videoCards.forEach(card => {
        if (card.getAttribute('data-category') === category) {
          card.style.display = 'block'; // Show the card
        } else {
          card.style.display = 'none'; // Hide the card
        }
      });
    });
  });
});

