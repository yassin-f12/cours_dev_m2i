$(function () {
  // equivalent de ready (le juste function en haut)
  $("button").on("click", function () {
    // data en js
    let button = document.querySelector("#local");
    alert(button.dataset.ville);

    // data en jquery
    let region = $("#globale").data("region");
    alert(region);
  });
});
