var a = [0, 120, 3, 64, 23];
var aux = 0;

console.log("MAsiv:", a);

for (var i = 0; i < a.length; i++) {
  for (var j = i; j < a.length; j++) {
    if (a[i] > a[j]) {
      aux = a[i];
      a[i] = a[j];
      a[j] = aux;
    }
  }
}

console.log("Sortat:", a);
