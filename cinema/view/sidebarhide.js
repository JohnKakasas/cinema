
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

