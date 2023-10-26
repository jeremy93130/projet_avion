function prix() {
  var selectBox = document.getElementById("vol_depart");
  var selectedValue = selectBox.options[selectBox.selectedIndex].id;
  // alert(selectedValue);
  // Recupere la div où placer le prix
  let div = document.getElementById("price");
  // creation balise p
  let createP = document.createElement("p");

  // on récupere le nombre de personne
  let personne = document.getElementById("passager").value;
  // Calcule prix en fonction du nombre de personne
  let newPrix = selectedValue * personne;

  if (personne <= 0) {
    newPrix = selectedValue;
  }
  createP.textContent = newPrix + "€";

  div.innerHTML = "";
  div.appendChild(createP);
}

let moins = document.getElementById("moins");
let passager = document.getElementById("passager");
let plus = document.getElementById("plus");

moins.addEventListener("click", () => {
  let passagerMoins = passager.value;
  if (passagerMoins > 1) {
    passager.value--;
  } else {
    passager.value = 1;
  }
  prix();
});
plus.addEventListener("click", () => {
  let passagerPlus = passager.value;
  if (passagerPlus > 0) {
    passager.value++;
  } else {
    passager.value = 1;
  }
  prix();
});

let suppress = document.getElementsByClassName("suppVol");
let vols = document.getElementsByClassName("vols");

for (let i = 0; index < suppress.length; index++) {
  suppress.addEventListener("click", (e) => {
    e.preventDefault();
  });
}
