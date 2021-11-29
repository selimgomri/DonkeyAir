// set minimum date to today in onway date
let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1; //January is 0!
let yyyy = today.getFullYear();

if (dd < 10) {
  dd = "0" + dd;
}

if (mm < 10) {
  mm = "0" + mm;
}

today = yyyy + "-" + mm + "-" + dd;
console.log(today);
document.getElementById("departure-date").setAttribute("min", today);

let onewayDate = document.getElementById("departure-date").value;

document.getElementById("return-date").setAttribute("min", onewayDate);
console.log(onewayDate.value);
