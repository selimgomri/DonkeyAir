function oneWayReturn() {
    if (document.getElementById('oneWay').checked) {
        document.getElementById('ifChecked').style.visibility = 'visible';
    }
    else document.getElementById('ifChecked').style.visibility = 'hidden';
}