
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


//  IFRAME TRAILER  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', () => {
  // Select all video thumbnails
  const thumbnails = document.querySelectorAll('.video-thumbnail');

  // Loop through each thumbnail to add click event
  thumbnails.forEach(thumbnail => {
      thumbnail.addEventListener('click', () => {
          // Find the nearest video card and trailer container
          const trailerContainer = thumbnail.closest('.video-card').querySelector('.trailer-container');
          const videoIframe = trailerContainer.querySelector('.video-iframe');

          // Set the video URL from the thumbnail's data attribute
          videoIframe.src = thumbnail.dataset.videoUrl;
          trailerContainer.style.display = 'flex'; // Show the trailer container
      });
  });

  // Select all close buttons for closing the trailer
  const closeButtons = document.querySelectorAll('.close-button');

  // Loop through each close button to add click event
  closeButtons.forEach(button => {
      button.addEventListener('click', () => {
          // Find the closest trailer container
          const trailerContainer = button.closest('.trailer-container');
          const videoIframe = trailerContainer.querySelector('.video-iframe');

          // Clear the video source to stop playback
          videoIframe.src = '';
          trailerContainer.style.display = 'none'; // Hide the trailer container
      });
  });
});



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


//  SIDEBAR TEXT HIDE  ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
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

//  BUY TICKET  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
document.addEventListener('DOMContentLoaded', () => {
  const buyTicketButton = document.getElementById('buy-ticket');
  if (buyTicketButton) {
      buyTicketButton.addEventListener('click', function() {
          var url = this.getAttribute('data-trailer-url');
          if (url) {
              window.location.href = url;
          }
      });
  }
});
//  ENTER NULL  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

console.log(document.getElementById('buy-ticket')); // Should log the element or null

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


//LOGIN-REGISTER  /////////////////////////////////////////////////////////

// JavaScript to toggle between Login and Register forms
document.getElementById("login-btn").addEventListener("click", function() {
    toggleForms("login");
  });
  
  document.getElementById("register-btn").addEventListener("click", function() {
    toggleForms("register");
  });
  
  document.getElementById("switch-to-register").addEventListener("click", function() {
    toggleForms("register");
  });
  
  document.getElementById("switch-to-login").addEventListener("click", function() {
    toggleForms("login");
  });
  
  function toggleForms(form) {
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const loginBtn = document.getElementById("login-btn");
    const registerBtn = document.getElementById("register-btn");
  
    if (form === "login") {
      loginForm.classList.add("active");
      registerForm.classList.remove("active");
      loginBtn.classList.add("active");
      registerBtn.classList.remove("active");
    } else {
      loginForm.classList.remove("active");
      registerForm.classList.add("active");
      loginBtn.classList.remove("active");
      registerBtn.classList.add("active");
    }
  }
  