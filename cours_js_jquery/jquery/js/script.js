$(document).ready(function () {
  $("#hide").click(function () {
    $("p").hide(500);
  });
  $("#show").click(function () {
    $("p").show(900);
  });

  $("#boite").animate(
    {
      left: "200px",
      opacity: 0.5,
      width: "200px",
    },
    800,
  );

  $("#item1").mouseenter(() => {
    $(".point1").css("background-color", "red");

    $("#title-ville").text("J'habite ici");

    $(".point1").animate(
      {
        width: "25px",
        height: "25px",
      },
      400,
    );
  });
  $("#item1").mouseleave(() => {
    $(".point1").css("background-color", "black");

    $("#title-ville").text("Survolez une région");

    $(".point1").animate(
      {
        width: "20px",
        height: "20px",
      },
      400,
    );
  });

  $("#item2").mouseenter(() => {
    $(".point2").css("background-color", "red");

    $("#title-ville").text("L'ile de France");

    $(".point2").animate(
      {
        width: "25px",
        height: "25px",
      },
      400,
    );
  });
  $("#item2").mouseleave(() => {
    $(".point2").css("background-color", "black");

    $("#title-ville").text("Survolez une région");

    $(".point2").animate(
      {
        width: "20px",
        height: "20px",
      },
      400,
    );
  });

  $("#item1").click(() => {
    $("#card").css("display", "flex");
  });
  $("#item2").click(() => {
    $("#card2").css("display", "flex");
  });

  $(".fermer").click(function () {
    $(this).parent().css("display", "none");
  });
});
