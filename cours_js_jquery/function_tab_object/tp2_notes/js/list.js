const stagiaires = [
  {
    prenom: "Léa",
    note: 14,
  },
  {
    prenom: "Karim",
    note: 8,
  },
  {
    prenom: "Sophie",
    note: 17,
  },
  {
    prenom: "Thomas",
    note: 11,
  },
  {
    prenom: "Nora",
    note: 6,
  },
];

/*
1. Afficher le nombre de stagiaires -> ok
2. Afficher tous les stagiaires -> ok
3. Trouver les admis -> ok
4. Calculer la moyenne
5. Recherche par prénom
*/

// mes variables
let nombre = document.querySelector("#nombre");
let admis = document.querySelector("#admis");
let moyenne = document.querySelector("#moyenne");
const tousBtn = document.querySelector("#tous");
const admisBtn = document.querySelector("#admisSeulement");
const searchBtn = document.querySelector("#recherche");
let inputPrenom = document.querySelector("#prenom");
let resultSearch = document.querySelector("#resultatRecherche");
let liste = document.querySelector("#liste");

// nombre  total stagiaires
nombre.textContent = stagiaires.length;

// calcule de la moyenne

const somme = stagiaires.reduce((acc, obj) => acc + obj.note, 0);
const CalcMoyenne = somme / stagiaires.length;
moyenne.textContent = CalcMoyenne;

function affLists(prenom, note) {
  const div = document.createElement("div");
  div.className = "stagiaire";

  const p = document.createElement("p");
  const pNotes = document.createElement("p");
  p.textContent = prenom;
  pNotes.textContent = note;

  if (note >= 10) {
    p.className = "admis";
    pNotes.className = "admis";
  } else {
    p.className = "non-admis";
    pNotes.className = "non-admis";
  }

  div.append(p, pNotes);
  return div;
}

// boucle affichage liste + les admis
for (let i = 0; i < stagiaires.length; i++) {
  const noms = stagiaires[i].prenom;
  const notes = stagiaires[i].note;

  const nvDiv = affLists(noms, notes);
  liste.appendChild(nvDiv);

  if (notes >= 10) {
    admis.textContent = i;
  }
}

// event  sur mon btn afficher tous
tousBtn.addEventListener("click", () => {
  liste.innerHTML = "";

  for (let i = 0; i < stagiaires.length; i++) {
    const noms = stagiaires[i].prenom;
    const notes = stagiaires[i].note;

    const nvDiv = affLists(noms, notes);
    liste.appendChild(nvDiv);
  }
});

// event  sur mon btn afficher tous les admis uniquement
admisBtn.addEventListener("click", () => {
  liste.innerHTML = "";

  for (let i = 0; i < stagiaires.length; i++) {
    const noms = stagiaires[i].prenom;
    const notes = stagiaires[i].note;

    if (notes >= 10) {
      const nvDiv = affLists(noms, notes);
      liste.appendChild(nvDiv);
    }
  }
});

// event  sur mon btn rechercher
searchBtn.addEventListener("click", () => {
  const search = inputPrenom.value.toLowerCase();

  if (search === "") {
    resultSearch.textContent = "Tape un prénom déja";
    return;
  }

  resultSearch.textContent = "";
  let trouve = false;

  stagiaires.forEach((stagiaire) => {
    if (stagiaire.prenom.toLowerCase().includes(search)) {
      resultSearch.textContent = `${stagiaire.prenom} à obtenu une note de : ${stagiaire.note}`;
      trouve = true;
    }
  });

  if (trouve === false) {
    resultSearch.textContent = "la personne rechercher n'existe pas";
  }
});
