
// ARROWS
document.addEventListener('DOMContentLoaded', () => {
  const categoriesContainer = document.querySelector('.categories');
  const prevArrow = document.getElementById('prev-arrow');
  const nextArrow = document.getElementById('next-arrow');

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
});
// DRAGING
document.addEventListener('DOMContentLoaded', () => {
  const categories = document.querySelector('.categories');
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
    const walk = (x - startX) * 2; // Adjust the scrolling speed if needed
    categories.scrollLeft = scrollLeft - walk;
});
});

// GRID - LIST

document.addEventListener('DOMContentLoaded', () => {
    const categoryButtons = document.querySelectorAll('.category');
    const videoCards = document.querySelectorAll('.video-card');
    const listViewButton = document.getElementById('list-view');
    const gridViewButton = document.getElementById('grid-view');
  
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
  
    // Toggle between list view and grid view
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
  });


// IFRAME TRAILER
document.addEventListener('DOMContentLoaded', () => {
    const thumbnails = document.querySelectorAll('.video-thumbnail');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', () => {
            const trailerContainer = thumbnail.closest('.video-card').querySelector('.trailer-container');
            const videoIframe = trailerContainer.querySelector('.video-iframe');
            videoIframe.src = thumbnail.dataset.videoUrl; // Set the video URL from data attribute
            trailerContainer.style.display = 'flex';
        });
    });

    const closeButtons = document.querySelectorAll('.close-button');

    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const trailerContainer = button.closest('.trailer-container');
            const videoIframe = trailerContainer.querySelector('.video-iframe');
            videoIframe.src = ''; // Clear the video source
            trailerContainer.style.display = 'none';
        });
    });
});


// ACTIVE CATEGORY RED
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


// SIDEBAR TEXT HIDE
        // Select the toggle button and the sidebar text elements
        const toggleButton = document.getElementById("toggle-button");
        const sidebarText = document.querySelectorAll(".sidebar-text");

        // Add a click event listener to the toggle button
        toggleButton.addEventListener("click", function() {
            // Toggle the visibility of the sidebar text elements
            sidebarText.forEach(function(textElement) {
                if (textElement.style.display === "none" || textElement.style.display === "") {
                    textElement.style.display = "inline"; // Show the text
                } else {
                    textElement.style.display = "none"; // Hide the text
                }
            });
        });


        // CATEGORY HIDE ACTIVES

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

// BUY TICKET
document.getElementById('buy-ticket').addEventListener('click', function() {
    var url = this.getAttribute('data-trailer-url');
    if (url) {
        window.location.href = url;
    }
});