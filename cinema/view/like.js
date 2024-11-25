

//  like  /////////////////////////////////////////////////////////


document.addEventListener("DOMContentLoaded", function () {
  const likeButtons = document.querySelectorAll(".like-btn");

  likeButtons.forEach(button => {
      button.addEventListener("click", function () {
          const movieId = this.dataset.movieId; // Get the movie ID from the button
          
          fetch("like_movie.php", {
              method: "POST",
              headers: {
                  "Content-Type": "application/x-www-form-urlencoded"
              },
              body: `movie_id=${movieId}`
          })
          .then(response => response.text())
          .then(result => {
              if (result === "liked") {
                  alert("Movie liked!");
                  this.textContent = "Liked"; // Update button text
                  this.disabled = true; // Disable the button to prevent re-liking
              } else if (result === "already_liked") {
                  alert("You already liked this movie.");
              } else {
                  alert("An error occurred. Please try again.");
              }
          })
          .catch(error => {
              console.error("Error:", error);
          });
      });
  });
});



document.addEventListener("DOMContentLoaded", function () {
  const unlikeButtons = document.querySelectorAll(".unlike-btn");

  unlikeButtons.forEach(button => {
      button.addEventListener("click", function () {
          const movieId = this.dataset.movieId; // Get the movie ID from the button

          fetch("unlike_movie.php", {
              method: "POST",
              headers: {
                  "Content-Type": "application/x-www-form-urlencoded"
              },
              body: `movie_id=${movieId}`
          })
          .then(response => response.text())
          .then(result => {
              if (result === "unliked") {
                  alert("Movie unliked!");
                  // Optionally, remove the movie card from the DOM
                  this.closest(".video-card").remove();
              } else {
                  alert("An error occurred. Please try again.");
              }
          })
          .catch(error => {
              console.error("Error:", error);
          });
      });
  });
});


