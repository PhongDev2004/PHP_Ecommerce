// Toast function
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
  const main = document.getElementById("toast");
  if (main) {
    const toast = document.createElement("div");

    // Tự động xóa toast
    const autoRemoveID = setTimeout(function () {
      main.removeChild(toast);
    }, duration + 1000);

    //Xóa toast khi nhấp vào
    toast.onclick = function (e) {
      if (e.target.closest(".toast__close")) {
        main.removeChild(toast);
        clearTimeout(autoRemoveID);
      }
    };

    const icons = {
      success: "fas fa-check-circle",
      error: "fas fa-exclamation-circle",
    };
    const icon = icons[type];
    const delay = (duration / 1000).toFixed(2);

    toast.classList.add("toast", `toast--${type}`);
    toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;
    toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fa-solid fa-xmark"></i>
                      </div>
                      `;
    main.appendChild(toast);
  }
}
function showSuccessToast() {
  toast({
    title: "LƯƠNG BÁ PHONG",
    message: "CHÀO MỪNG BẠN ĐẾN VỚI CỦA HÀNG QUẦN ÁO IT",
    type: "success",
    duration: 1500,
  });
}

function showErrorToast() {
  toast({
    title: "LƯƠNG BÁ PHONG",
    message: "HIỆN TẠI CHỨC NĂNG VẪN CHƯA ĐƯỢC UPDATE !",
    type: "error",
    duration: 1500,
  });
}
