

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

