function signIn() {
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    var f = new FormData();

    f.append("username", username.value);
    f.append("password", password.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');

                window.location = "admin-dashboard.php";

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }

    }

    r.open("POST", "adminLoginProcess.php", true);
    r.send(f);

}

function signout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "admin-login.php";
            }
        }
    }

    r.open("GET", "admin-logOut.php", true);
    r.send();
}