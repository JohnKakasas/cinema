

//  GRID - LIST  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

document.addEventListener('DOMContentLoaded', () => {
  const categoryButtons = document.querySelectorAll('.category');
  const videoCards = document.querySelectorAll('.video-card');
  const listViewButton = document.getElementById('list-view');
  const gridViewButton = document.getElementById('grid-view');

  // Check if category buttons exist before adding event listeners
  if (categoryButtons.length > 0 && videoCards.length > 0) {
      categoryButtons.forEach(button => {
          button.addEventListener('click', () => {
              // Remove active class from all buttons
              categoryButtons.forEach(btn => btn.classList.remove('active'));

              // Add active class to the clicked button
              button.classList.add('active');

              const category = button.getAttribute('data-category');

              videoCards.forEach(card => {
                  if (category === 'all' || card.getAttribute('data-category') === category) {
                      card.style.display = 'block'; // Show the card
                  } else {
                      card.style.display = 'none'; // Hide the card
                  }
              });
          });
      });
  }

  // Check if list view and grid view buttons exist before adding event listeners
  if (listViewButton && gridViewButton) {
      listViewButton.addEventListener('click', () => {
          videoCards.forEach(card => {
              card.classList.add('list-view'); // Add list view class
          });
      });

      gridViewButton.addEventListener('click', () => {
          videoCards.forEach(card => {
              card.classList.remove('list-view'); // Remove list view class
          });
      });
  }
});
