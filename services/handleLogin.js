const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});

loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});

const form = document.getElementById("form");
const firstname__input = document.getElementById("input__name");
const email__input = document.getElementById("input__mail");
const password__input = document.getElementById("input__pass");
const cfpassword__input = document.getElementById("input__cfPass");

form.addEventListener("submit", (e) => {
  const firstName = firstname__input?.value;
  const email = email__input.value;
  const password = password__input.value;
  const cfPassword = cfpassword__input?.value;

  let errors = [];

  clearErrors(); // Xóa lỗi cũ trước khi kiểm tra lại

  if (firstname__input) {
    errors = getSignUpFormErrors(firstName, email, password, cfPassword);
  } else {
    errors = getLoginFormErrors(email, password);
  }

  if (errors.length > 0) {
    e.preventDefault();
  }
});

function getSignUpFormErrors(firstName, email, pass, cfPass) {
  let errors = [];

  if (!firstName) {
    errors.push("Vui lòng nhập họ tên!");
    showError(firstname__input, "Vui lòng nhập họ tên!");
  }
  if (!email) {
    errors.push("Vui lòng nhập email!");
    showError(email__input, "Vui lòng nhập email!");
  }
  if (!pass) {
    errors.push("Vui lòng nhập mật khẩu!");
    showError(password__input, "Vui lòng nhập mật khẩu!");
  }
  if (!isValidPassword(pass)) {
    errors.push(
      "Mật khẩu phải có ít nhất 8 ký tự, gồm chữ hoa, chữ thường, số và ký tự đặc biệt!"
    );
    showError(
      password__input,
      "Mật khẩu yếu! Hãy dùng chữ hoa, số và ký tự đặc biệt."
    );
  }
  if (cfPass !== pass) {
    errors.push("Mật khẩu không trùng khớp!");
    showError(cfpassword__input, "Mật khẩu không trùng khớp!");
  }
  return errors;
}

function getLoginFormErrors(email, password) {
  let errors = [];

  if (!email) {
    errors.push("Vui lòng nhập email!");
    showError(email__input, "Vui lòng nhập email!");
  }
  if (!password) {
    errors.push("Vui lòng nhập mật khẩu!");
    showError(password__input, "Vui lòng nhập mật khẩu!");
  }

  return errors;
}

// 🛡 Kiểm tra độ mạnh của mật khẩu
function isValidPassword(password) {
  const strongPasswordRegex =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
  return strongPasswordRegex.test(password);
}

// 🛑 Hiển thị lỗi ngay dưới mỗi `div.input-group`
function showError(inputElement, message) {
  const errorElement = document.createElement("p");
  errorElement.className = "error-text";
  errorElement.style.color = "#f06272";
  errorElement.style.fontSize = "12px";
  errorElement.style.margin = "0px";
  errorElement.innerText = message;

  // Nếu đã có lỗi, xóa lỗi cũ trước khi thêm lỗi mới
  clearError(inputElement);

  // Thêm lỗi ngay sau `div.input-group`
  inputElement.parentElement.insertAdjacentElement("afterend", errorElement);
}

// 🔄 Xóa tất cả lỗi trước khi kiểm tra lại
function clearErrors() {
  document.querySelectorAll(".error-text").forEach((el) => el.remove());
}

// 🔄 Xóa lỗi của một input cụ thể
function clearError(inputElement) {
  const error = inputElement.parentElement.nextElementSibling;
  if (error && error.classList.contains("error-text")) {
    error.remove();
  }
}

// ⏳ Xóa lỗi khi người dùng nhập lại
const allInputs = [
  firstname__input,
  email__input,
  password__input,
  cfpassword__input,
].filter((input) => input != null);
allInputs.forEach((input) => {
  input.addEventListener("input", () => {
    clearError(input);
  });
});
