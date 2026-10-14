const bouge = document.querySelector(".tab");
const carrer = document.querySelector(".child");
let deplace = 0;
bouge.addEventListener("click", () => {
  deplace += 40;
  carrer.style.transform = `translateX(${deplace}px)`;
});
