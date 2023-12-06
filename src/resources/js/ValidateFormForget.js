document.addEventListener("DOMContentLoaded", function () {
  var forgetPasswordForm = document.getElementById("forgot-password-form");

  forgetPasswordForm.addEventListener("submit", function (event) {
    event.preventDefault();

    var emailInput = document.getElementById("kh_mail");
    var email = emailInput.value;

    var idInput = document.getElementById("kh_id");
    var idkh = idInput.value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          var response = JSON.parse(xhr.responseText);
          console.log("Server Response:", response); // Add this line
          var notification = document.querySelector(
            "#forgot-password .form-message"
          );

          if (response.status === "success") {
            notification.innerHTML = "Your password is: " + response.password;
          } else {
            notification.innerHTML = response.message;
          }
          // console.log('3221', response);
        } else {
          console.error("Error in AJAX request. Status: " + xhr.status);
        }
      }
    };
    // Build the data string
    var data =
      "email=" +
      encodeURIComponent(email) +
      "&kh_id=" +
      encodeURIComponent(idkh) +
      "&kh_mail=" +
      encodeURIComponent(email) +
      "&forget-password=true";

    // Log the data being sent
    console.log("Sending data: " + data);

    xhr.open("POST", "ajax.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    // Use the data string in the send method
    xhr.send(data);
  });
});
