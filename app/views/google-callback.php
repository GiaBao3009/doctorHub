<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Google Callback</title>
</head>

<body>
    <h3>Đang xử lý đăng nhập Google...</h3>

    <script>
    const hash = window.location.hash.substring(1);
    const params = new URLSearchParams(hash);
    const accessToken = params.get('access_token');

    if (accessToken) {
        console.log("Google Access Token:", accessToken);
        alert("Đăng nhập Google thành công!\nAccess Token:\n" + accessToken);
        // fetch('/auth/google', { method: 'POST', body: JSON.stringify({ token: accessToken }) })
        window.location.href = "../../index.php";
    } else {
        alert("Đăng nhập Google thất bại!");
    }
    </script>
</body>

</html>