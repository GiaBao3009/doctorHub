<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <!-- *SEO Meta Tags* -->
 <meta name="description"
  content="DoctorHub - Đặt lịch khám bệnh và tư vấn sức khỏe trực tuyến. Tiết kiệm thời gian, chăm sóc sức khỏe mọi lúc, mọi nơi." />
 <meta name="keywords"
  content="đặt lịch khám, tư vấn sức khỏe, khám bệnh trực tuyến, chăm sóc sức khỏe, đặt lịch bác sĩ" />
 <meta name="robots" content="index, follow" />
 <!-- *Open Graph Meta Tags for Social Media* -->
 <meta property="og:title" content="DoctorHub - Đặt lịch khám và tư vấn sức khỏe" />
 <meta property="og:description"
  content="DoctorHub giúp bạn dễ dàng đặt lịch khám bệnh và nhận tư vấn sức khỏe từ các bác sĩ uy tín." />
 <meta property="og:image" content="URL_of_image_for_social_sharing" />
 <meta property="og:url" content="https://www.doctorhub.com" />
 <meta property="og:type" content="website" />
 <!-- *Twitter Card Meta Tags* -->
 <meta name="twitter:card" content="summary_large_image" />
 <meta name="twitter:title" content="DoctorHub - Đặt lịch khám và tư vấn sức khỏe" />
 <meta name="twitter:description"
  content="Đặt lịch khám bệnh và tư vấn sức khỏe trực tuyến với DoctorHub, giúp bạn chăm sóc sức khỏe dễ dàng và hiệu quả." />
 <meta name="twitter:image" content="URL_of_image_for_twitter_card" />
 <meta name="60552469035-27c42t2tcr98qbmp27b6r2tti6b8vvql.apps.googleusercontent.com" content="YOUR_GOOGLE_CLIENT_ID" />

 <!-- *Title* -->
 <title>DoctorHub - Đặt Lịch Khám và Tư Vấn Sức Khỏe</title>
 <!-- *Favicon* -->
 <link rel="icon" href="./assets/images/Logo/DoctorHub.png" type="image/x-icon" />
 <!-- *Liên kết Bootstrap CSS* -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
 <!-- *Liên kết RemixIcon* -->
 <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet" />
 <!-- *Splide CSS* -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/splidejs/4.1.4/js/splide.min.js" />
 <!-- *Fontawesome* -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
 <!-- *LazySizes* -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" />

 <!-- *Stylesheets* -->
 <link rel="stylesheet" href="./assets/css/style.css" />
 <link rel="stylesheet" href="./assets/css/base.css" />
 <link rel="stylesheet" href="./assets/css/responsive.css" />
 <link rel="stylesheet" href="./assets/css/animation.css" />
 <!-- *Mobile Optimization* -->
 <meta name="mobile-web-app-capable" content="yes" />
 <meta name="theme-color" content="#0d6efd" />
 <style>
 .user-profile {
  display: flex;
  align-items: center;
  gap: 10px;
 }
 </style>
</head>

<body>
 <!-- *Sidebar* -->
 <div class="contact-sidebar">
  <a href="/pages/book.html" class="contact-btn text-decoration-none" title="Đặt lịch" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Đặt lịch">
   <i class="fa-solid fa-calendar-check"></i>
  </a>
  <a href="/pages/contact.html" class="contact-btn text-decoration-none" title="Gọi điện" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Gọi điện">
   <i class="fa-solid fa-phone"></i>
  </a>
  <a href="/pages/consultation.html" class="contact-btn text-decoration-none" title="Chat" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Chat với bác sĩ">
   <i class="fa-solid fa-comments"></i>
  </a>
  <a href="/pages/contact.html" class="contact-btn text-decoration-none" title="Email" data-bs-toggle="tooltip"
   data-bs-placement="left" title="Gửi email">
   <i class="fa-solid fa-envelope"></i>
  </a>
  <button id="scrollTopBtn" class="contact-btn d-none" data-bs-toggle="tooltip" data-bs-placement="left"
   title="Lên đầu trang" onclick="scrollToTop()">
   <i class="fa-solid fa-chevron-up"></i>
  </button>
 </div>
</body>
<!-- *SplideJS Scripts* -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/css/splide.min.css" />
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide/dist/js/splide.min.js"></script>
<!-- *Popper* -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
 integrity="sha384-JGLZOLoMCs5hQdIb2Rlp+vgbp7NjPR8tW3mv4TqRfj7sG04O1LYljX29lvH9acX7" crossorigin="anonymous"></script>
<!-- *Bootstrap* -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- *Javascript* -->
<script src="./assets/javascript/main.js" type="module"></script>
<script src="./services/handleModal.js"></script>
<script src="./services/handleSlider.js"></script>
<script src="./services/handleSlider.js"></script>
<!-- *Lazysizes* -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.2.0/lazysizes.min.js" async=""></script>
<!-- *Splide JS* -->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script><!-- * Google API* -->
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

</html>