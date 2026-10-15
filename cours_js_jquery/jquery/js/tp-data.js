$(function () {
  // mes sélecteurs
  const $modale = $(".modale");
  const $texte = $(".texte");
  const $titre = $(".titre");
  const $image = $(".image");

  // action de clique sur les cards
  $(".card").click(function () {
    // mes variables
    const desc = $(this).data("description");
    const title = $(this).data("title");
    const img = $(this).data("image");

    // le contenu de la modale mise a jour
    $texte.text(desc);
    $titre.text(title);
    $image.attr("src", img);

    // animation pour apparaître la modale
    $modale.css({
      display: "flex",
      opacity: 0,
    });

    $modale.animate(
      {
        opacity: 1,
      },
      400,
    );
  });

  // action de clique pour la fermeture de la modale
  $(".fermer").click(function () {
    $modale.animate(
      {
        opacity: 0,
      },
      400,
      function () {
        $(this).css("display", "none");
      },
    );
  });
});
