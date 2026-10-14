const input = document.querySelector("#input-tache");
const btnAdd = document.querySelector("#btn-add");
const compteur = document.querySelector("#nombre");
const ul = document.querySelector("#content-lists");

function verifierInput() {
  btnAdd.disabled = input.value.trim() === "";
}

verifierInput();

input.addEventListener("input", verifierInput);

function todo() {
  const li = document.createElement("li");
  const btnDelete = document.createElement("button");
  const span = document.createElement("span");

  span.textContent = input.value;
  li.classList.add("li", "taches");

  btnDelete.textContent = "Supprimer";
  btnDelete.className = "btn-delete";

  li.append(span, btnDelete);
  ul.prepend(li);

  input.value = "";
  verifierInput();

  compteur.textContent = ul.querySelectorAll("li").length;

  btnDelete.addEventListener("click", () => {
    li.remove();
    compteur.textContent = ul.querySelectorAll("li").length;
  });

  span.addEventListener("click", () => {
    span.classList.toggle("line-th");
  });
}

btnAdd.addEventListener("click", () => {
  todo();
});

document.addEventListener("keydown", (event) => {
  if (event.key === "Enter") {
    todo();
  }
});
