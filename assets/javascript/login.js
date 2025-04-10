function handleCredentialResponse(response) {
  fetch("/auth/google", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ token: response.credential }),
  })
    .then((res) => res.json())
    .then((data) => {
      if (data.success) {
        window.location.href = "/index.php";
      } else {
        alert("Đăng nhập thất bại");
      }
    });
}
