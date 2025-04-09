document.addEventListener("DOMContentLoaded", function () {
  const provinceSelect = document.getElementById("province");
  const districtSelect = document.getElementById("district");
  const wardSelect = document.getElementById("ward");

  // Lấy danh sách tỉnh/thành phố
  fetch("https://provinces.open-api.vn/api/p/")
    .then((response) => response.json())
    .then((data) => {
      data.forEach((province) => {
        let option = document.createElement("option");
        option.value = province.code;
        option.textContent = province.name;
        provinceSelect.appendChild(option);
      });
    });

  // Khi chọn tỉnh/thành phố -> lấy danh sách quận/huyện
  provinceSelect.addEventListener("change", function () {
    districtSelect.innerHTML = "<option selected>Chọn Quận/Huyện *</option>";
    wardSelect.innerHTML = "<option selected>Chọn Phường/Xã *</option>";

    fetch(`https://provinces.open-api.vn/api/p/${this.value}?depth=2`)
      .then((response) => response.json())
      .then((data) => {
        data.districts.forEach((district) => {
          let option = document.createElement("option");
          option.value = district.code;
          option.textContent = district.name;
          districtSelect.appendChild(option);
        });
      });
  });

  // Khi chọn quận/huyện -> lấy danh sách phường/xã
  districtSelect.addEventListener("change", function () {
    wardSelect.innerHTML = "<option selected>Chọn Phường/Xã *</option>";

    fetch(`https://provinces.open-api.vn/api/d/${this.value}?depth=2`)
      .then((response) => response.json())
      .then((data) => {
        data.wards.forEach((ward) => {
          let option = document.createElement("option");
          option.value = ward.code;
          option.textContent = ward.name;
          wardSelect.appendChild(option);
        });
      });
  });
});
