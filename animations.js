

// JS FUNCTION TO HIDE RETURN DATE WHEN ONE WAY SELECTED

const oneWayReturn = () => {
  if (document.getElementById("oneWay").checked) {
    document.getElementById("ifChecked").style.visibility = "visible";
  } else document.getElementById("ifChecked").style.visibility = "hidden";
  };


// JQUERY FUNCTION FOR PACKAGE RESULTS

$( document ).ready(function() {
  $( "#togglePackageButton").click(function() {
    $( ".packageResults1" ).toggle( "blind" );
  });
});



