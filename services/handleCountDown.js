
const startCountdown = () => {
  const endTime = new Date();
  // đặt mốc hết ngày
  endTime.setHours(23, 59, 59);

  const updateCountdown = () => {
    const now = new Date();

    // khoảng cách thời gian còn lại
    const distance = endTime - now;

    // kiểm tra điều kiện
    if (distance < 0) {
      document.getElementById("hours").textContent = "00";
      document.getElementById("minutes").textContent = "00";
      document.getElementById("seconds").textContent = "00";
      return;
    }

    // tính toán thời gian còn lại theo miliseconds  không vượt quá 24 giờ
    const hours = Math.floor((distance / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((distance / (1000 * 60)) % 60);
    const seconds = Math.floor((distance / 1000) % 60);

    // gán dữ liệu vào DOM - Nếu chuỗi chỉ có 1 chữ số, thêm số 0 vào trước để đủ 2 chữ số.
    document.getElementById("hours").textContent = String(hours).padStart(
      2,
      "0"
    );
    document.getElementById("minutes").textContent = String(minutes).padStart(
      2,
      "0"
    );
    document.getElementById("seconds").textContent = String(seconds).padStart(
      2,
      "0"
    );
  };
  // chạy lần đâu tiên
  updateCountdown();
  setInterval(updateCountdown, 1000);
};
startCountdown();

