document.querySelector("#calculer").addEventListener("click", function () {
  let quantite = Number(document.querySelector("#quantite").value);

  let tarifReduit = document.querySelector("#tarifReduit").value;

  let assurance = document.querySelector("#assurance").value;

  // prix du billet 25€
  // reduction: 10%
  // assurance 2 euros par billet
  // frais 5 euros si totalTTC < 100
  // promo si code bon on reduit de 10%

  let affSousTotal = document.querySelector("#sousTotal");
  let affReduc = document.querySelector("#reduction");
  let affAssurance = document.querySelector("#prixAssurance");
  let affFrais = document.querySelector("#frais");
  let afficherTotal = document.querySelector("#total");
  let messageFrais = document.querySelector("#message");
  let affpromo = document.querySelector("#promoApp");
  let promo = document.querySelector("#promo").value;
  let code = document.querySelector("#code");

  let prixBillet = 25;
  let sousTotal = prixBillet * quantite;
  let montantReduc = 0;
  let prixAssurance = 0;
  let frais = 0;
  let montantPromo;

  if (tarifReduit === "oui") {
    montantReduc = sousTotal * 0.1;
    affReduc.textContent = montantReduc.toFixed(2) + " €";
  } else {
    affReduc.textContent = "0 €";
  }

  if (assurance === "oui") {
    prixAssurance = 2 * quantite;
    affAssurance.textContent = prixAssurance.toFixed(2) + " €";
  } else {
    affAssurance.textContent = "0 €";
  }

  let totalTTC = sousTotal - montantReduc + prixAssurance;

  if (promo !== "") {
    code.textContent = "";
    if (promo === "12345") {
      code.textContent = "bon code";
      montantPromo = totalTTC * 0.1;
      affpromo.textContent = "- " + montantPromo.toFixed(2) + " €";
      totalTTC = totalTTC - montantPromo;
    } else {
      code.textContent = "mauvais code, essayer avec 12345";
      affpromo.textContent = "0 €";
    }
  }

  if (totalTTC < 100) {
    frais = 5;
    messageFrais.textContent = "frais supp de 5 €";
  } else {
    messageFrais.textContent = "";
  }

  totalTTC = totalTTC + frais;

  affSousTotal.textContent = sousTotal.toFixed(2) + " €";
  affFrais.textContent = frais + " €";
  afficherTotal.textContent = totalTTC.toFixed(2) + " €";
});
