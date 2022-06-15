import Swiper, { Navigation, Keyboard, Autoplay, EffectCube } from "swiper";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/keyboard";
import "swiper/css/effect-cube";

document.addEventListener("DOMContentLoaded", () => {
  //single
  if (document.getElementById("single-aside-carousel")) {
    const singleAsideCarousel = new Swiper("#single-aside-carousel", {
      modules: [Navigation, Autoplay],
      loop: true,
      autoplay: {
        delay: 5000,
      },
      slidesPerView: 2,
      breakpoints: {
        0: {
          slidesPerView: 1,
        },
        767: {
          slidesPerView: 2,
        },
      },
      navigation: {
        nextEl: ".thinkus-button-next",
        prevEl: ".thinkus-button-prev",
      },
    });
  }

  //blog
  if (document.getElementById("swipper-archive")) {
    const blogSwiper = new Swiper("#swipper-archive", {
      modules: [Navigation, Keyboard, Autoplay],
      loop: true,
      /*   autoplay: {
        delay: 5000,
      }, */
      effect: "cube",
      cubeEffect: {
        slideShadows: false,
      },
      keyboard: {
        enabled: true,
        onlyInViewport: false,
      },
      navigation: {
        nextEl: ".thinkus-button-next",
        prevEl: ".thinkus-button-prev",
      },
    });
  }
});
