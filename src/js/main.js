// main.js
// Import your main SCSS file
import "../scss/main.scss";
import setupSwiper from "./setupSwiper";
import MobileMenu from "./MobileMenu";
import Search from "./Search";

document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu
  const mobileMenu = new MobileMenu();
  // Search
  const search = new Search();

  // Hero swiper
  if (document.querySelector(".hero-swiper") !== null) {
    setupSwiper(".hero-swiper", {
      direction: "horizontal",
      loop: true,
      slidesPerView: 1,
      spaceBetween: 30,
      autoplay: {
        delay: 5000,
        disableOnInteraction: false,
      },
      // breakpoints: {
      //   640: {
      //     slidesPerView: 1.3,
      //     spaceBetween: 30,
      //   },
      //   768: {
      //     slidesPerView: 2.5,
      //     spaceBetween: 30,
      //   },
      //   1024: {
      //     slidesPerView: 3.2,
      //     spaceBetween: 30,
      //   },
      // },
      // ... other options ...
    });
  }
});
