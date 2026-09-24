const block = document.querySelector(".block");
const body = document.querySelector("body");
let mouvX = 0;
let mouvY = 0;

function colorier() {
  const trace = document.createElement("div");

  trace.style.position = "fixed";
  trace.style.left = block.getBoundingClientRect().left + "px";
  trace.style.top = block.getBoundingClientRect().top + "px";
  trace.style.width = block.offsetWidth + "px";
  trace.style.height = block.offsetHeight + "px";
  trace.style.backgroundColor = "black";
  trace.style.pointerEvents = "none";
  trace.style.zIndex = "1";

  body.appendChild(trace);
}

block.style.zIndex = "2";

body.addEventListener("keydown", (e) => {
  if (e.key === "ArrowRight") {
    mouvX += 10;
    mouvY += 0;
    block.style.transform = `translate(${mouvX}px,${mouvY}px)`;
  } else if (e.key === "ArrowLeft") {
    if (mouvX > 1) {
      mouvX -= 10;
    }
    mouvY += 0;
    block.style.transform = `translate(${mouvX}px,${mouvY}px)`;
  } else if (e.key === "ArrowUp") {
    mouvX += 0;
    if (mouvY > 1) {
      mouvY -= 10;
    }
    mouvY -= 10;
    block.style.transform = `translate(${mouvX}px, ${mouvY}px)`;
  } else if (e.key === "ArrowDown") {
    mouvX += 0;
    mouvY += 10;
    block.style.transform = `translate(${mouvX}px, ${mouvY}px)`;
  }

  colorier();
});
