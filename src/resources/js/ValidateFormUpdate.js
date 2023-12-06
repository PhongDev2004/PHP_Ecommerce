document.addEventListener("DOMContentLoaded", function () {
  function validateForm() {
    document.getElementById("username-error").textContent = "";
    document.getElementById("email-error").textContent = "";
    document.getElementById("pass-error").textContent = "";
    document.getElementById("phone-error").textContent = "";
    document.getElementById("address-error").textContent = "";

    // Lấy dữ liệu values
    var username = document.getElementById("username").value.trim();
    var email = document.getElementById("email").value.trim();
    var pass = document.getElementById("password").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var address = document.getElementById("address").value.trim();

    // Đặt lá cờ VN trên đỉnh Phanxipang để theo dõi tình trạng xác thực
    var isValid = true;

    // Validation for username
    if (!username) {
      document.getElementById("username-error").textContent =
        "*Please enter your Username";
      isValid = false;
    } else if (!/^[a-zA-Z ]+$/.test(username)) {
      document.getElementById("username-error").textContent =
        "*Only letters and spaces are allowed.";
      isValid = false;
    }

    // Validation for email
    if (!email) {
      document.getElementById("email-error").textContent =
        "*Please enter your email";
      isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      document.getElementById("email-error").textContent =
        "*Please enter correct email address format!";
      isValid = false;
    }

    // Validation for pass
    if (!pass) {
      document.getElementById("pass-error").textContent =
        "*Please enter your pass";
      isValid = false;
    } else if (
      !/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*]).{6,}$/.test(pass)
    ) {
      document.getElementById("pass-error").textContent =
        "*Please enter correct pass format!";
      isValid = false;
    }

    // Validation for phone
    if (!phone) {
      document.getElementById("phone-error").textContent =
        "*Please enter your phone";
      isValid = false;
    } else if (
      !/^(0|\+84)(3[2-9]|5[2689]|7[06789]|8[1-689]|9[0-9])[0-9]{7}$/.test(phone)
    ) {
      document.getElementById("phone-error").textContent =
        "*Please enter correct phone format!";
      isValid = false;
    }

    // Validation for address
    if (!address) {
      document.getElementById("address-error").textContent =
        "*Please enter your address";
      isValid = false;
    }

    // Nếu validate thất bại thì sẽ ngăn chặn việc gửi form
    if (!isValid) {
      return false;
    }
    return true;
  }
  document
    .getElementById("updateButton")
    .addEventListener("click", function (event) {
      if (!validateForm()) {
        event.preventDefault();
      }
    });
});
