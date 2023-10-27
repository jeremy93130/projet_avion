function prix() {
  var selectBox = document.getElementById("vol_depart");
  var selectedValue = selectBox.options[selectBox.selectedIndex].id;
  // alert(selectedValue);
  // Recupere la div où placer le prix
  let div = document.getElementById("price");
  // creation balise p
  let createP = document.createElement("p");

  createP.textContent = selectedValue + "€";

  div.innerHTML = "";
  div.appendChild(createP);
}
