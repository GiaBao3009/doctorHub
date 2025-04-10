<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images//Logo/DoctorHub.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/animation.css" />
    <link rel="stylesheet" href="../../assets/css/login.css" />
    <title>SignIn | DoctorHub</title>
    <style>
    .container.container-login {
        width: 500px;
    }

    .form-container {
        width: 100%;
        position: unset;
    }

    .control__group {
        color: #fff;
        height: 42px;
        border: none;
        outline: none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: 600;
        font-size: 14px;
    }

    .container .form-container .social-login .control__group--google {
        background-color: #db4437;
    }

    .container .form-container .social-login .control__group--facebook {
        background-color: #1877f2;
    }
    </style>
</head>

<body>
    <div class="container container-login" id="container">
        <div class="form-container">
            <form action="" method="post" id="form">
                <h1 class="text-capitalize mb-3 text-center">Đăng Nhập</h1>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__mail"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" placeholder="Email" class="input__mail" id="input__mail" name="email" />
                </div>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__pass"><i class="ri-lock-line"></i></label>
                    <input type="password" placeholder="Password" class="input__pass" id="input__pass"
                        name="password" />
                </div>

                <button type="submit" class="btn signUp">Đăng Nhập</button>

                <div class="line"><span>hoặc đăng nhập bằng</span></div>

                <div class="social-login mb-3 row gx-2">
                    <!-- Google -->
                    <div class="col-6">
                        <button id="googleBtn" type="button"
                            class="btn d-flex align-items-center justify-content-center gap-2 w-100 control__group control__group--google">
                            <i class="fab fa-google"></i>
                            <span>Google</span>
                        </button>

                    </div>

                    <!-- Facebook -->
                    <div class="col-6">
                        <button id="facebookBtn" type="button"
                            class="btn d-flex align-items-center justify-content-center gap-2 w-100 control__group control__group--facebook">
                            <i class="fab fa-facebook-f"></i>
                            <span>Facebook</span>
                        </button>
                    </div>
                </div>

                <p class="mt-0 text-center">
                    Tạo mới?
                    <a href="./signUp.php" class="form__desc" id="createAccount">Tạo mới tài khoản?</a>
                </p>
            </form>

            <div id="profile" style="display:none;">
                <h3>Chào, <span id="userName"></span>!</h3>
                <img id="userImage" src="" alt="User Image" />
                <p>Email: <span id="userEmail"></span></p>
                <button onclick="logout()" class="btn btn-danger">Đăng Xuất</button>
            </div>
        </div>
    </div>

    <!-- SDK Google -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>

    <!-- SDK Facebook -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>

    <script>
    // Google Login
    window.onload = function() {
        google.accounts.id.initialize({
            client_id: "16769569373-33ss6o0l2c3s75urp2trlq4nbahdvapf.apps.googleusercontent.com", // 🔁 THAY bằng Client ID thực của bạn
            callback: handleGoogleResponse,
        });

        document.getElementById("googleBtn").addEventListener("click", function() {
            const clientId = "16769569373-33ss6o0l2c3s75urp2trlq4nbahdvapf.apps.googleusercontent.com";
            const redirectUri =
                "http://localhost:3000/auth/google/callback"; // 🔁 sửa thành URL backend của bạn

            const authUrl = `https://accounts.google.com/o/oauth2/v2/auth?` +
                `client_id=${clientId}&` +
                `redirect_uri=${redirectUri}&` +
                `response_type=token&` +
                `scope=email%20profile`;

            window.location.href = authUrl;
        });




        document.getElementById("facebookBtn").addEventListener("click", function() {
            FB.login(function(response) {
                if (response.status === 'connected') {
                    const token = response.authResponse.accessToken;
                    fetch("/auth/facebook", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                token: token
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                window.location.href = "/index";
                            } else {
                                alert("Đăng nhập Facebook thất bại");
                            }
                        });
                }
            }, {
                scope: 'public_profile,email'
            });
        });
    };

    function handleGoogleResponse(response) {
        fetch("/auth/google", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    token: response.credential
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = "/index";
                } else {
                    alert("Đăng nhập Google thất bại");
                }
            });
    }

    // Facebook SDK init
    window.fbAsyncInit = function() {
        FB.init({
            appId: '1728886988022684',
            cookie: true,
            xfbml: true,
            version: 'v18.0'
        });
    };
    </script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>