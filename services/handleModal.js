// Cuộn lên đầu trang
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: "smooth" });
}
const scrollTopBtn = document.getElementById("scrollTopBtn");

window.addEventListener("scroll", function () {
  if (window.scrollY > 100) {
    scrollTopBtn.classList.remove("d-none");
  } else {
    scrollTopBtn.classList.add("d-none");
  }
});

// JavaScript để tự động hiển thị modal sau 3 giây và tự ẩn hoặc khi người dùng đóng modal

// Khi trang web tải xong
window.addEventListener("load", function () {
  // Hiển thị modal sau 1 giây
  setTimeout(function () {
    var myModal = new bootstrap.Modal(
      document.getElementById("doctorHubModal"),
      {
        keyboard: true, // Modal  bị đóng bằng phím ESC
      }
    );
    myModal.show(); // Hiển thị modal

    setTimeout(function () {
      myModal.hide();
    }, 3000);
  }, 1000);
});

// Thêm sự kiện để đóng modal khi người dùng nhấn nút đóng hoặc sau khi modal tự ẩn
var myModalElement = document.getElementById("doctorHubModal");
myModalElement.addEventListener("hidden.bs.modal", function () {
  // Bạn có thể thực hiện các hành động khác tại đây nếu cần
  console.log("Modal đã bị ẩn");
});
