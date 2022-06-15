const socialTrigger = document.getElementById("button-trigger");
const socialMenu = document.querySelector(".social-network-widget");
socialTrigger.addEventListener("click", function () {
  const socialwidget = document.getElementById("social-widget");

  if (!this.classList.contains("active")) {
    this.classList.add("active");
    socialwidget.classList.add("opened");
    this.innerHTML = '<i class="fas fa-times"></i>';
    this.classList.add("rotateButton");
    setTimeout(
      function () {
        this.classList.remove("rotateButton");
      }.bind(this),
      1000
    );
  } else {
    this.classList.add("rotateButton");
    socialwidget.classList.remove("opened");
    setTimeout(
      function () {
        this.classList.remove("active");
        this.innerHTML = '<i class="fa-solid fa-comments"></i>';
      }.bind(this),
      400
    );
    setTimeout(
      function () {
        this.classList.remove("rotateButton");
      }.bind(this),
      1000
    );
  }
});
document.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    socialMenu.style.right = "25px";
  } else {
    socialMenu.style.right = "-100px";
  }
  if (window.scrollY > 330 && !socialTrigger.classList.contains("viber")) {
    setInterval(() => {
      socialTrigger.classList.add("viber");
      setTimeout(() => {
        socialTrigger.classList.remove("viber");
      }, 2000);
    }, 35000);
  }
});
