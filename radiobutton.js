

const oneWayReturn = () => {
  if (document.getElementById("oneWay").checked) {
    document.getElementById("ifChecked").style.visibility = "visible";
  } else document.getElementById("ifChecked").style.visibility = "hidden";
};

/* let toggle = document.getElementById("togglePackageButton");
let result = document.getElementById("packageResult");
toggle.addEventListener("click", () => {
  if(getComputedStyle(result).display != "none"){
    result.style.display = "none";
  } else {
    result.style.display = "block";
  }
}) */

$( document ).click(function() {
  $( "#packageResult" ).toggle( "blind" );
});