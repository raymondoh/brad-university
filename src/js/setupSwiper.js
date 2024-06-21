// setupSwiper.js
const setupSwiper = (selector, swiperConfig) => {
  const container = document.querySelector(selector);

  if (!container) {
    console.warn(`Swiper container not found for selector: ${selector}`);
    return; // Exit the function if the container doesn't exist
  }

  const mySwiper = new Swiper(container, swiperConfig);

  const bindNavigationButtons = () => {
    const prevButton = container.querySelector(".carousel-prev");
    const nextButton = container.querySelector(".carousel-next");

    if (prevButton) {
      prevButton.addEventListener("click", () => mySwiper.slidePrev());
    }

    if (nextButton) {
      nextButton.addEventListener("click", () => mySwiper.slideNext());
    }
  };

  bindNavigationButtons(); // Call the function to bind buttons
};

export default setupSwiper;
