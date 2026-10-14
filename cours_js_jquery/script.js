// const nom = prompt("votre nom :");
// const note = prompt("votre note :");

// if (note >= 16) {
//   console.log(note + ", very good", nom);
// } else if (note >= 14) {
//   console.log(note + ", good", nom);
// } else if (note >= 10) {
//   console.log(note + ", yeah", nom);
// } else {
//   console.log(note + ", no good", nom);
// }

// version switch ----------------------------------------------------------------

// switch (true) {
//   case note >= 16:
//     console.log(note + ", very good", nom);
//     break;
//   case note >= 14:
//     console.log(note + ", good", nom);
//     break;
//   case note >= 10:
//     console.log(note + ", yeah", nom);
//     break;

//   default:
//     console.log(note + ", not good", nom);
//     break;
// }

// Boucle ------------------------------------------------------------------------

for (let i = 0; i <= 10; i++) {
  console.log(i);
}

let compteur = 1;
while (compteur <= 5) {
  console.log(compteur);
  compteur++;
}

for (let i = 0; i <= 10; i++) {
  if (i % 2 === 0) {
    console.log(i);
  }
}

// cours mercredi javascript - jquery

const h2 = document.querySelector("h2");
h2.classList.add("classJs");

const div = document.createElement("div");
const ul = document.createElement("ul");
const li = document.createElement("li");
const li2 = document.createElement("li");

div.className = "content";
ul.textContent = "Ma liste de courses";
li.textContent = "carotte";
li.className = "li";
li2.textContent = "lait";

ul.appendChild(li);
ul.append(li2);
div.appendChild(ul);
document.body.appendChild(div);

const btn = document.querySelector("#btn");

btn.addEventListener("click", () => {
  h2.classList.toggle("autre-couleur");
});

div.addEventListener("mouseenter", () => {
  li.style.fontSize = "24px";
  li2.style.fontSize = "24px";
});
div.addEventListener("mouseleave", () => {
  li.style.fontSize = "16px";
  li2.style.fontSize = "16px";
});
