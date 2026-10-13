//-------------------FUNCTION-------------------
const open = document.querySelector("#open").addEventListener("click", () => {
  //window.open("https://www.adeir.fr/", "Adeir");

  window.open("https://adeir.fr", "Adeir", "width=600,height=400");

  let nom = prompt("votre blaze ?");

  function saluer() {
    return `Bonjour ${nom}`;
  }
  console.log(saluer());
});

//-------------------TAB-------------------
const classCda = ["angele", "andre", "jean", "medhi", "rivo"];
classCda.forEach((cda) => {
  console.log(`hey -> ${cda}`);
});

const notes = [8, 12, 15, 6, 18];

const doubles = notes.map((n) => n * 2);
const admis = notes.filter((n) => n >= 10);
const premiere = notes.find((n) => n >= 14);
const total = notes.reduce((acc, n) => acc + n, 0);

console.log(doubles);

//-------------------OBJECT-------------------
const produit = {
  nom: "Clavier",
  prix: 49.9,
  stock: 12,
};
console.log(produit.nom);

const produits = [
  { id: 1, nom: "Clavier", prix: 49.9, stock: 5 },
  { id: 2, nom: "Souris", prix: 15, stock: 22 },
  { id: 3, nom: "Écran", prix: 423, stock: 2 },
];

const { nom, stock } = produits[0];
console.log(`${nom} -> dispo : ${stock}`);

const jean = { blaz: "jean", prix: 2.99 };
const { blaz, prix } = jean;
console.log(jean.blaz);

const a = [1, 2, 3];
const b = [...a, 4, 5];
console.log(b);

const promo = { ...jean, prix: 1.99 }; // prix passe de 2.99 a 1.99
console.log(promo);
