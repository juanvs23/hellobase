const topHeader = document.querySelector("#site-header-top");
const triggers = document.querySelectorAll(".button-menu-trigger");
const menu = document.querySelector("#site-header .site-navigation");
document.addEventListener("scroll", () => {
  if (window.scrollY > 150 && topHeader.classList.contains("top-header")) {
    topHeader.style.top = "0";
  } else {
    topHeader.style.top = "-100px";
  }
});

triggers.forEach((trigger) => {
  trigger.addEventListener("click", () => {
    triggers.forEach((trigger) => {
      if (!trigger.classList.contains("actived")) {
        trigger.classList.add("actived");
      } else {
        trigger.classList.remove("actived");
      }
    });
    menu.classList.toggle("opened");
  });
});
