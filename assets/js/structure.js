function prix(prix) {
  console.log("test");
  // Recupere la div où placer le prix
  let div = document.getElementById("price");
  // creation balise p
  let createP = document.createElement("p");

  // on récupere le nombre de personne
  let personne = document.getElementById("nb_person").value;
  // Calcule prix en fonction du nombre de personne
  let newPrix = prix * personne;

  createP.textContent = newPrix;

  div.innerHTML = "";
  div.appendChild(createP);
}