$(function () {
  const $btnCharger = $("#charger");
  const $loader = $("#loader");
  const $evenements = $("#evenements");
  const $info = $("#info");
  const url = "https://jsonplaceholder.typicode.com/posts?_limit=6";

  $btnCharger.on("click", () => {
    $loader.removeAttr("hidden"); // affiche le loader
    $evenements.empty(); // vide la section pour eviter que sa les compile

    $.ajax({
      url: url,
      method: "GET",
      dataType: "json",
    })

      .done(async function (donnees) {
        for (let i = 0; i < donnees.length; i++) {
          const event = donnees[i];

          const div = $("<div>").addClass("card").hide(); // on la cache avec hide
          const h2 = $("<h2>").text(event.title);
          const p = $("<p>").text(event.body);

          div.append(h2, p);
          $evenements.append(div);

          // une promise, programme sa resolution après 500ms, puis attend sa résolution avant de passer à fadeIn
          await new Promise((resolve) => setTimeout(resolve, 500));
          div.fadeIn(800);
        }
      })

      .fail(function (xhr) {
        console.error("erreur HTTP : ", xhr.status);
        $info.text("impossible de charger les données");
      })

      // always se lance dans tout les cas
      .always(() => {
        $loader.attr("hidden", true);
      });
  });
});
