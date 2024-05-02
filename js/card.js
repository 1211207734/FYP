document.getElementById("payment-form").addEventListener("submit", function(event) {
  event.preventDefault();
  var cardNumber = document.getElementById("card-number").value;
  var expirationDate = document.getElementById("expiration-date").value;
  var cvv = document.getElementById("cvv").value;

  // Here you can add your payment processing logic, like sending data to a server
  // For demonstration purposes, let's just show a success message
  var message = document.getElementById("payment-message");
  message.innerText = "Payment Successful!";
  setTimeout(function() {
    message.innerText = "";
  }, 3000);
});
