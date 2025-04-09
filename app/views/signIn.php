<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images//Logo/DoctorHub.png" type="image/x-icon">
    <!-- *Fontawesome* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- *Liên kết RemixIcon* -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <!-- *Liên kết Bootstrap CSS* -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/animation.css" />
    <link rel="stylesheet" href="../../assets/css/login.css" />
    <title>SignIn | DoctorHub</title>
</head>

<body>

    <div class="container container-login" id="container">
        <div class="form-container sign-up">
            <form action="" method="post" id="form">
                <h1 class="text-capitalize">Đăng Ký</h1>
                <p id="error-message" class="small mb-0"></p>

                <div class="input-group d-flex align-items-center flex-nowrap form-group" id="incorrect">
                    <label for="input__name"><i class="fa-regular fa-user"></i></label>
                    <input type="text" placeholder="FirstName" class="input__name" id="input__name" name="firstName" />
                </div>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__mail"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" placeholder="Email" class="input__mail" id="input__mail" name="email" />
                </div>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__pass"><i class="ri-lock-line"></i></label>
                    <input type="password" placeholder="Password" class="input__pass" id="input__pass"
                        name="password" />
                </div>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__cfPass"><i class="ri-lock-line"></i></label>
                    <input type="password" placeholder="Password" class="input__cfPass" id="input__cfPass"
                        name="password" />
                </div>
                <button type="submit " class="btn signUp mb-3">Đăng Ký</button>

                <div class="line">
                    <span>hoặc đăng ký bằng</span>
                </div>
                <div class="d-flex mb-3" style="gap: 6px">
                    <div class="form-group control__group control__group--google" id="g_id_onload"
                        data-client_id="60552469035-27c42t2tcr98qbmp27b6r2tti6b8vvql.apps.googleusercontent.com"
                        data-context="signin" data-ux_mode="popup" data-callback="handleCredentialResponse"
                        data-auto_prompt="false">
                        <a href="#" class="icon text-white fw-bolder"><svg width="36" height="36" viewBox="0 0 36 36"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.96 16.5599V20.0159H18.648C18.432 21.5279 16.92 24.3359 12.96 24.3359C9.504 24.3359 6.69601 21.4559 6.69601 17.9999C6.69601 14.5439 9.504 11.6639 12.96 11.6639C14.904 11.6639 16.2 12.5279 16.992 13.2479L19.728 10.5839C17.928 8.92792 15.696 7.91992 12.96 7.91992C7.41601 7.91992 2.88 12.4559 2.88 17.9999C2.88 23.5439 7.41601 28.0799 12.96 28.0799C18.792 28.0799 22.608 23.9759 22.608 18.2159C22.608 17.5679 22.536 17.0639 22.464 16.5599H12.96ZM34.56 16.5599H31.68V13.6799H28.8V16.5599H25.92V19.4399H28.8V22.3199H31.68V19.4399H34.56V16.5599Z"
                                    fill="white"></path>
                            </svg>
                            Google</a>
                    </div>
                    <div class="g_id_signin" data-type="standard"></div>
                    <div class="form-group control__group control__group--facebook">
                        <a href="#" class="icon text-white fw-bolder"><svg width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.198 21.5H13.198V13.49H16.802L17.198 9.51H13.198V7.5C13.198 7.23478 13.3034 6.98043 13.4909 6.79289C13.6784 6.60536 13.9328 6.5 14.198 6.5H17.198V2.5H14.198C12.8719 2.5 11.6002 3.02678 10.6625 3.96447C9.72479 4.90215 9.198 6.17392 9.198 7.5V9.51H7.198L6.802 13.49H9.198V21.5Z"
                                    fill="white"></path>
                            </svg>
                            Faceboob</a>
                    </div>
                </div>

                <p>
                    Bạn đã có tài khoản?
                    <a href="./signIn.php" class="form__desc" id="login">Đăng nhập</a>
                </p>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="" method="post" id="form">
                <h1 class="text-capitalize mb-3">Đăng Nhập</h1>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__mail"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" placeholder="Email" class="input__mail" id="input__mail" name="email" />
                </div>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__pass"><i class="ri-lock-line"></i></label>
                    <input type="password" placeholder="Password" class="input__pass" id="input__pass"
                        name="password" />
                </div>

                <button type="submit " class="btn signUp">Đăng Nhập</button>
                <div class="line">
                    <span>hoặc đăng nhập bằng</span>
                </div>

                <div class="d-flex mb-3" style="gap: 6px">
                    <div class="form-group control__group control__group--google">
                        <a href="#" class="icon text-white fw-bolder"><svg width="36" height="36" viewBox="0 0 36 36"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.96 16.5599V20.0159H18.648C18.432 21.5279 16.92 24.3359 12.96 24.3359C9.504 24.3359 6.69601 21.4559 6.69601 17.9999C6.69601 14.5439 9.504 11.6639 12.96 11.6639C14.904 11.6639 16.2 12.5279 16.992 13.2479L19.728 10.5839C17.928 8.92792 15.696 7.91992 12.96 7.91992C7.41601 7.91992 2.88 12.4559 2.88 17.9999C2.88 23.5439 7.41601 28.0799 12.96 28.0799C18.792 28.0799 22.608 23.9759 22.608 18.2159C22.608 17.5679 22.536 17.0639 22.464 16.5599H12.96ZM34.56 16.5599H31.68V13.6799H28.8V16.5599H25.92V19.4399H28.8V22.3199H31.68V19.4399H34.56V16.5599Z"
                                    fill="white"></path>
                            </svg>
                            Google</a>
                    </div>
                    <div class="form-group control__group control__group--facebook">
                        <a href="#" class="icon text-white fw-bolder"><svg width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M9.198 21.5H13.198V13.49H16.802L17.198 9.51H13.198V7.5C13.198 7.23478 13.3034 6.98043 13.4909 6.79289C13.6784 6.60536 13.9328 6.5 14.198 6.5H17.198V2.5H14.198C12.8719 2.5 11.6002 3.02678 10.6625 3.96447C9.72479 4.90215 9.198 6.17392 9.198 7.5V9.51H7.198L6.802 13.49H9.198V21.5Z"
                                    fill="white"></path>
                            </svg>
                            Facebook</a>
                    </div>
                </div>
                <p class="mt-0 text-center">
                    Tạo mới?
                    <a href="./signUp.php" class="form__desc" id="createAccount">Tạo mới tài khoản?</a>
                </p>
            </form>
            <!-- Hiển thị thông tin user sau khi đăng nhập -->
            <div id="profile">
                <h3>Chào, <span id="userName"></span>!</h3>
                <img id="userImage" src="" alt="User Image" />
                <p>Email: <span id="userEmail"></span></p>
                <button onclick="logout()" class="btn btn-danger">Đăng Xuất</button>
            </div>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <!-- <h1>Welcome Back!</h1>
            <p>Manchester City</p> -->
                    <button class="hidden" id="login">Đăng Nhập</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <!-- <h1>Hello, Friend!</h1>
            <p>Hello The Cityzen</p> -->
                    <button class="hidden" id="register">Đăng Ký</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

<!-- *Bootstrap* -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="../..//services/handleLogin.js"></script>
<script src="./test/test.js"></script>

</html>