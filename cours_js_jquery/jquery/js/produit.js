$(function () {
  const $card = $(".card");
  const $btnDetails = $(".details-btn");
  const $details = $(".details");
  const $nombre = $("#quantite");
  const $add = $(".ajouter");
  const $info = $(".message");

  $btnDetails.click(() => {
    if ($details.is(":visible")) {
      $details.hide(500);
      $btnDetails.text($btnDetails.data("ferme"));
    } else {
      $details.show(500);
      $btnDetails.text($btnDetails.data("ouvert"));
    }
  });

  $add.click(() => {
    const quantite = $nombre.val();
    const nom = $card.data("nom");

    if (quantite < 1) {
      $info.text("Veuillez ajouter au moins 1 produit");
      $info.addClass("null");
    } else {
      $info.removeClass("null");
      const pluriel = quantite > 1 ? "s" : "";
      $info.text(quantite + " " + nom + " ajouté" + pluriel + " au panier !");
    }
  });
});
