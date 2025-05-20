<?php
// Include initialization file
require_once '../../config/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/images/Logo/DoctorHub.png" type="image/x-icon">
    <!-- *Fontawesome* -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <!-- *Liên kết RemixIcon* -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
    <!-- *Liên kết Bootstrap CSS* -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/animation.css" />
    <link rel="stylesheet" href="../../assets/css/login.css" />
    <title>SignUp | DoctorHub</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
 
        :root {
            --primary: #0b5ada;
            --primary-light: #3a8ffe;
            --secondary: #00c6fb;
            --text-dark: #2d3748;
            --text-light: #7f8c8d;
            --white: #ffffff;
            --bg-light: #f7f9fc;
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 5px 15px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            --shadow-primary: 0 4px 12px rgba(11, 90, 218, 0.3);
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
            --transition: all 0.35s ease;
        }
        
        body {
            background: linear-gradient(135deg, #eef2f5 0%, #dbe4ed 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            margin: 0;
        padding: 20px;
            overflow-x: hidden;
            position: relative;
            color: var(--text-dark);
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../../assets/images/medical-pattern.svg');
            background-size: cover;
            opacity: 0.025;
            z-index: -1;
        }
        
        .container-login {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
            max-width: 1200px;
            perspective: 1000px;
            position: relative;
            z-index: 1;
            padding: 0px;
        }
        
        .form-container {
            background: var(--white);
            padding: 50px 40px;
            width: 450px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
            animation: fadeIn 0.8s ease-out;
            position: relative;
            overflow: hidden;
            z-index: 1;
            backdrop-filter: blur(10px);
        }
        
        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 350px;
            height: 350px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: 50%;
            transform: translate(150px, -200px);
            opacity: 0.8;
            z-index: -1;
        }
        
        .form-container::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 250px;
            height: 250px;
            background: linear-gradient(135deg, var(--secondary) 0%, var(--primary-light) 100%);
            border-radius: 50%;
            transform: translate(-100px, 120px);
            opacity: 0.8;
            z-index: -1;
        }
        
        h1 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 35px !important;
            font-size: 36px;
            text-transform: none !important;
            position: relative;
            display: inline-block;
        text-align: center;
            width: 100%;
            letter-spacing: -0.5px;
        }
        
        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 2px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 28px;
            background: var(--bg-light);
            border-radius: var(--radius-md);
            padding: 8px 20px;
            transition: var(--transition);
            border: 2px solid transparent;
            box-shadow: var(--shadow-sm);
        }
        
        .input-group:focus-within {
            border-color: var(--primary);
            box-shadow: 0 0 0 5px rgba(11, 90, 218, 0.1);
            transform: translateY(-3px);
        }
        
        .input-group label {
            color: var(--primary);
            font-size: 20px;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .input-group input {
            border: none;
            background: transparent;
            padding: 12px 5px;
            font-size: 16px;
            width: 100%;
            outline: none;
            color: var(--text-dark);
            font-weight: 500;
        }
        
        .input-group input::placeholder {
            color: #aab2bd;
            font-weight: 400;
        }
        
        .btn.signUp {
            background: linear-gradient(90deg, var(--primary-light), var(--primary));
            border: none;
            color: var(--white);
            padding: 14px;
            font-size: 18px;
            font-weight: 600;
            border-radius: var(--radius-md);
            width: 100%;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: var(--shadow-primary);
            margin-top: 15px;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        
        .btn.signUp::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0%;
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--primary-light));
            transition: var(--transition);
            z-index: -1;
        }
        
        .btn.signUp:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(11, 90, 218, 0.4);
        }
        
        .btn.signUp:hover::before {
            width: 100%;
        }
        
        .btn.signUp:active {
            transform: translateY(1px);
        }
        
        .alert {
            border-radius: var(--radius-md);
            padding: 18px;
            margin-bottom: 30px;
            position: relative;
            animation: slideIn 0.5s ease-out;
            font-weight: 500;
            box-shadow: var(--shadow-sm);
        }
        
        .alert-danger {
            background-color: rgba(255, 107, 107, 0.12);
            border-left: 5px solid #ff6b6b;
            color: #d63031;
        }
        
        .alert-success {
            background-color: rgba(46, 213, 115, 0.12);
            border-left: 5px solid #2ed573;
            color: #20bf6b;
        }
        
        p {
            color: var(--text-light);
            font-size: 16px;
            margin-top: 30px;
        }
        
        a.form__desc {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            position: relative;
        }
        
        a.form__desc::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary);
            transition: var(--transition);
        }
        
        a.form__desc:hover {
            color: var(--primary-light);
        }
        
        a.form__desc:hover::after {
            width: 100%;
        }
        
        .welcome-side {
        display: none;
        }
        
        .logo-container {
            position: absolute;
            top: 30px;
            left: 30px;
            z-index: 10;
        }
        
        .logo-container img {
            height: 50px;
            filter: drop-shadow(0 2px 5px rgba(0,0,0,0.2));
        }
        
        @media (min-width: 992px) {
            .container-login {
                justify-content: space-between;
                gap: 30px;
            }
            
            .welcome-side {
                display: flex;
                align-items: center;
                justify-content: flex-end;
                width: 45%;
                position: relative;
                animation: fadeIn 1s ease-out;
                margin-left: 27px;
            }
            
            .welcome-side img {
                max-width: 100%;
                height: auto;
                filter: drop-shadow(0 15px 30px rgba(0,0,0,0.15));
                border-radius: var(--radius-lg);
                transform: perspective(1000px) rotateY(-5deg);
                transition: var(--transition);
            }
            
            .welcome-side img:hover {
                transform: perspective(1000px) rotateY(0deg);
            }
            
            .form-container {
                width: 480px;
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .floating-shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 50%;
            z-index: -1;
            box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5);
        }
        
        .shape-1 {
            width: 120px;
            height: 120px;
            top: 10%;
            left: 10%;
            animation: float 8s infinite ease-in-out;
        }
        
        .shape-2 {
            width: 180px;
            height: 180px;
            top: 60%;
            right: 15%;
            animation: float 10s infinite ease-in-out reverse;
        }
        
        .shape-3 {
            width: 90px;
            height: 90px;
            bottom: 20%;
            left: 20%;
            animation: float 7s infinite ease-in-out 1s;
        }
        
        .shape-4 {
            width: 60px;
            height: 60px;
            top: 35%;
            right: 25%;
            animation: float 9s infinite ease-in-out 2s;
        }
        
        .shape-5 {
            width: 150px;
            height: 150px;
            bottom: 10%;
            right: 10%;
            opacity: 0.7;
            animation: float 15s infinite ease-in-out 0.5s;
        }
        
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-30px) rotate(10deg);
            }
        }
        
        .focused {
            border-color: var(--primary);
            box-shadow: 0 0 0 5px rgba(11, 90, 218, 0.1);
        }
        
        .input-group.focused label {
            color: var(--primary-light);
        }
        
        .input-group.error {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 5px rgba(255, 107, 107, 0.1);
        }
        
        .input-group.success {
            border-color: #2ed573;
            box-shadow: 0 0 0 5px rgba(46, 213, 115, 0.1);
        }
        
        .form-header {
        text-align: center;
            margin-bottom: 30px;
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(11, 90, 218, 0.4);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(11, 90, 218, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(11, 90, 218, 0);
            }
        }

        .highlight {
            position: relative;
            z-index: 1;
        }

        .highlight::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30%;
            background-color: rgba(11, 90, 218, 0.2);
            z-index: -1;
            border-radius: 4px;
        }
        
        .bg-circles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            overflow: hidden;
        }
        
        .bg-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.15;
        }
        
        .bg-circle-1 {
            top: -150px;
            left: -100px;
            width: 500px;
            height: 500px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
        }
        
        .bg-circle-2 {
            bottom: -200px;
            right: -150px;
            width: 600px;
            height: 600px;
            background: linear-gradient(135deg, var(--secondary), var(--primary-light));
        }
        
        /* Để hình ảnh profile tròn như signUp hiện tại */
        #profile img {
        border-radius: 50%;
        width: 80px;
        height: 80px;
            object-fit: cover;
            box-shadow: var(--shadow-md);
            border: 3px solid var(--white);
        }
        
        #profile {
            background: var(--white);
            border-radius: var(--radius-md);
            padding: 20px;
            margin-top: 20px;
            box-shadow: var(--shadow-md);
            text-align: center;
        }
        
        #profile h3 {
            color: var(--primary);
            margin-bottom: 15px;
        }
        
        #profile .btn-danger {
            background: linear-gradient(90deg, #ff6b6b, #d63031);
            border: none;
            padding: 10px 20px;
            border-radius: var(--radius-sm);
            font-weight: 600;
            margin-top: 15px;
            box-shadow: 0 4px 10px rgba(214, 48, 49, 0.3);
            transition: var(--transition);
        }
        
        #profile .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(214, 48, 49, 0.4);
    }
    </style>
</head>

<body>
    <div class="bg-circles">
        <div class="bg-circle bg-circle-1"></div>
        <div class="bg-circle bg-circle-2"></div>
    </div>

    <div class="floating-shape shape-1"></div>
    <div class="floating-shape shape-2"></div>
    <div class="floating-shape shape-3"></div>
    <div class="floating-shape shape-4"></div>
    <div class="floating-shape shape-5"></div>

    <div class="container container-login" id="container">
        <div class="welcome-side d-none d-lg-block">
            <img src="../../assets/images/Logo/DoctorHub.png" alt="Healthcare professionals" class="img-fluid" style="max-width: 100%; height: auto; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1)); border-radius: 20px;">
        </div>
        
        <div class="form-container">
            <form action="" method="post" id="form">
                <h1 class="text-center">Đăng Ký</h1>

                <?php
                if (isset($_SESSION['error'])) {
                    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
                    unset($_SESSION['success']);
                }
                ?>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__mail"><i class="fa-solid fa-envelope"></i></label>
                    <input type="email" placeholder="Email" class="input__mail" id="input__mail" name="email" required />
                </div>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__pass"><i class="ri-lock-line"></i></label>
                    <input type="password" placeholder="Mật khẩu" class="input__pass" id="input__pass" name="password" required />
                </div>

                <div class="input-group d-flex align-items-center flex-nowrap form-group">
                    <label for="input__cfPass"><i class="ri-lock-line"></i></label>
                    <input type="password" placeholder="Xác nhận mật khẩu" class="input__cfPass" id="input__cfPass" name="confirm_password" required />
                </div>
                
                <button type="submit" class="btn signUp">Đăng ký</button>

                <p class="mt-4 text-center">
                    Bạn đã có tài khoản?
                    <a href="./signIn.php" class="form__desc">Đăng nhập</a>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
        // Hiệu ứng tương tác cho input
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if(this.value === '') {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
        
        // Form validation và xử lý đăng ký
document.getElementById('form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const password = document.getElementById('input__pass').value;
    const confirmPassword = document.getElementById('input__cfPass').value;
    
    if (password !== confirmPassword) {
        alert('Mật khẩu không khớp!');
                document.getElementById('input__cfPass').parentElement.classList.add('error');
        return;
    }
    
    const formData = new FormData(this);
    
    fetch('../controllers/auth/signup.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Đăng ký thành công!');
            window.location.href = '../../index.php';
        } else {
            alert(data.message || 'Đăng ký thất bại');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Đã xảy ra lỗi trong quá trình đăng ký');
    });
});
</script>
</body>

</html>