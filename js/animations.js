// JS FUNCTION TO HIDE RETURN DATE WHEN ONE WAY SELECTED

const oneWayReturn = () => {
  if (document.getElementById("oneWay").checked) {
    document.getElementById("ifChecked").style.visibility = "visible";
  } else document.getElementById("ifChecked").style.visibility = "hidden";
  };

// JS TRY nextSibling FUNCTION

function togglePackageResults(event) {
  const clickedButtonElement = event.target;
  const flexResultsElement = clickedButtonElement.parentElement;
  const packageResultsContainerElement = flexResultsElement.nextElementSibling;
    if (packageResultsContainerElement.classList.contains("hidden")) {
      packageResultsContainerElement.classList.remove("hidden");
    } else {
      packageResultsContainerElement.classList.add("hidden");
    }
}





