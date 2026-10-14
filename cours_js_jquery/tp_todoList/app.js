const input = document.querySelector("#input-tache");
const btnAdd = document.querySelector("#btn-add");
let compteur = document.querySelector("#nombre");
const lists = document.querySelector("#liste");
const ul = document.querySelector("#content-lists");

function verifierInput() {
  btnAdd.disabled = input.value.trim() === "";
}

verifierInput();

input.addEventListener("input", verifierInput);

btnAdd.addEventListener("click", () => {
  const li = document.createElement("li");
  const btnDelete = document.createElement("button");
  const span = document.createElement("span");

  span.textContent = input.value;
  li.className = "li";
  li.classList.add("taches");

  btnDelete.textContent = "Supprimer";
  btnDelete.className = "btn-delete";

  li.append(span, btnDelete);
  ul.prepend(li);

  input.value = "";
  verifierInput();

  compteur.textContent = ul.querySelectorAll("li").length;

  btnDelete.addEventListener("click", (event) => {
    li.remove();
    event.stopPropagation();
    compteur.textContent = ul.querySelectorAll("li").length;
  });

  span.addEventListener("click", () => {
    span.classList.toggle("line-th");
  });
});
