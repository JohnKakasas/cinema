

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
