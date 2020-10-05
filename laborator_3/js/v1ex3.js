var numere = [];

function adauga_numere(e) {
  var t = e.value;

  while (t != 0) {
    numere.push(t % 10);
    t = Math.floor(t / 10);
  }

  numere.reverse();
  console.log(numere);
}

function afiseaza_numere(e) {
  document.getElementById("numere_container").innerHTML = "";
  numere.forEach(function (i, key) {
    if (key >= e.value - 1 || e.value > numere.length) {
      document.getElementById("numere_container").innerHTML += i;
    }
  });
}
