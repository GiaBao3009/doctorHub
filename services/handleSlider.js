// Khởi tạo Splide slider
document.addEventListener("DOMContentLoaded", function () {
  new Splide("#blog-slider", {
    type: "loop",
    perPage: 4,
    perMove: 1,
    gap: "20px",
    // autoplay: true,
    interval: 2000,
    pagination: false,
    arrows: true,
    breakpoints: {
      1200: { perPage: 4 },
      992: { perPage: 2 },
      768: { perPage: 2 },
      576: { perPage: 1 },
    },
  }).mount();
});


// Khởi tạo Splide slider
document.addEventListener("DOMContentLoaded", function () {
  new Splide(".home-splide-deals", {
    type: "loop",
    perPage: 5,
    perMove: 1,
    gap: "20px",
    autoplay: true,
    interval: 2000,
    pagination: false,
    arrows: false,
    breakpoints: {
      1200: { perPage: 4 },
      992: { perPage: 2 },
      768: { perPage: 2 },
      576: { perPage: 1 },
    },
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".home-splide-cotor", {
    type: "loop",
    perPage: 4,
    perMove: 1,
    gap: "20px",
    autoplay: true,
    interval: 4000,
    pagination: false,
    arrows: true,
    breakpoints: {
      1200: { perPage: 4 },
      992: { perPage: 2 },
      768: { perPage: 2 },
      576: { perPage: 1 },
    },
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".health-slider", {
    type: "loop",
    perPage: 3,
    gap: "1rem",
    pagination: false,
    arrows: true,
    breakpoints: {
      1024: { perPage: 2 },
      768: { perPage: 1 },
    },
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".health-guide-slider", {
    type: "slide",
    perPage: 4,
    gap: "1rem",
    pagination: false,
    arrows: true,
    breakpoints: {
      1024: { perPage: 3 },
      768: { perPage: 2 },
      576: { perPage: 1 },
    },
  }).mount();
});


document.addEventListener("DOMContentLoaded", function () {
  new Splide(".splide-shop", {
    type: "loop",
    // autoplay: true,
    interval: 3000,
    speed: 1000,
    perPage: 1,
    focus: "center",
    pagination: false,
    arrows: true,
    breakpoints: {
      768: { perPage: 1 },
    },
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".splide-medical", {
    type: "loop",
    perPage: 5,
    gap: "1rem",
    // autoplay: true,
    // padding

    interval: 2000,
    pagination: false,
    arrows: true,
    breakpoints: {
      1200: { perPage: 4 },
      992: { perPage: 2 },
      768: { perPage: 2 },
      576: { perPage: 1 },
    },
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".splide-deals", {
    type: "loop",
    perPage: 5,
    perMove: 1,
    gap: "1rem",
    padding: "0rem",
    autoplay: true,
    interval: 3000,
    pagination: false,
    arrows: true,
    breakpoints: {
      1200: { perPage: 4 },
      992: { perPage: 2 },
      768: { perPage: 2 },
      576: { perPage: 1 },
    },
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".splide-family", {
    type: "loop",
    perPage: 5,
    perMove: 1,
    gap: "1rem",
    autoplay: true,
    interval: 3000,
    pagination: false,
    arrows: true,
    breakpoints: {
      1200: { perPage: 4 },
      992: { perPage: 2 },
      768: { perPage: 2 },
      576: { perPage: 1 },
    },
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".splide-newMedicines", {
    type: "loop",
    perPage: 5,
    gap: "1rem",
    autoplay: true,
    interval: 3000,
    pagination: false,
    arrows: true,
    breakpoints: {
      1200: { perPage: 4 },
      992: { perPage: 2 },
      768: { perPage: 2 },
      576: { perPage: 1 },
    },
  }).mount();
});


document.addEventListener("DOMContentLoaded", function () {
  new Splide("#testimonial-slider", {
    type: "loop",
    perPage: 1,
    autoplay: true,
    interval: 4000,
    pauseOnHover: true,
    arrows: true,
    pagination: true,
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide("#splide-testimonials", {
    type: "loop",
    perPage: 1,
    autoplay: true,
    interval: 4000,
    pauseOnHover: true,
    arrows: false,
    pagination: true,
    speed: 600,
  }).mount();
});

const tooltipTriggerList = document.querySelectorAll(
  '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
  (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

document.addEventListener("DOMContentLoaded", function () {
  new Splide(".banner-slider", {
    type: "loop",
    autoplay: true,
    interval: 4000,
    pauseOnHover: false,
    arrows: true,
    pagination: true,
    speed: 800,
  }).mount();
});

document.addEventListener("DOMContentLoaded", function () {
  new Splide("#splide-doctors", {
    type: "loop",
    perPage: 3,
    gap: "1rem",
    autoplay: true,
    breakpoints: {
      768: { perPage: 1 },
      992: { perPage: 2 },
    },
  }).mount();

  new Splide("#splide-testimonials", {
    type: "fade",
    autoplay: true,
    interval: 4000,
    pauseOnHover: true,
  }).mount();
});