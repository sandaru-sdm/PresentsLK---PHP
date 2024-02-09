function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";
            }
        }
    }

    r.open("GET", "signoutProcess.php", true);
    r.send();
}