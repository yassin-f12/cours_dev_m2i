let prixProduit = 49.9;
let prixHt = prixProduit * 3;
let tva = 20;
let remises;
let htRemise = prixHt;

if (prixHt >= 200) {
  remises = prixHt * (10 / 100);
  htRemise = prixHt - remises;
  console.log(htRemise, remises);
}
if (htRemise < 100) {
  htRemise = htRemise + 8;
  console.log(htRemise);
}

let prixTva = htRemise * (tva / 100);
console.log(htRemise + prixTva);
