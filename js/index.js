function signin() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("rm", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";
            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "signinProcess.php", true);
    r.send(form);
}

function signUp() {

    var f = document.getElementById("fname");
    var l = document.getElementById("lname");
    var e = document.getElementById("email");
    var p = document.getElementById("password");
    var m = document.getElementById("mobile");
    var g = document.getElementById("gender");

    var form = new FormData();
    form.append("f", f.value); //Name value pair
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "Successfully") {

                f.value = "";
                l.value = "";
                e.value = "";
                p.value = "";
                m.value = "";

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Your Account Created Successfully..!");
                changeView();

            } else {

                // document.getElementById("msg").innerHTML = text;

                alertify.set('notifier', 'position', 'top-right');
                // alertify.error(text + '..!');
                alertify.error(text);

            }

        }
    }

    r.open("POST", "signUpProcess.php", true);
    r.send(form);

}

var bm;

function forgotPassword() {
    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "Success") {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Verification code has sent to your email. Check your inbox.");

                var m = document.getElementById("forgotPasswordModel");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alertify.set('notifier', 'position', 'top-right');
                // alertify.error(t + '..!');
                alertify.error(t);
            }
        }
    }

    r.open("GET", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();
}

function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");

}

function resetPassword() {
    var email = document.getElementById("email2");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var form = new FormData();
    form.append("e", email.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Password reset successful.");
                bm.hide();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "resetPassword.php", true);
    r.send(form);
}

function showPassword1() {
    var np = document.getElementById("np");
    var npb = document.getElementById("npb");

    if (np.type == "password") {

        np.type = "text";

        npb.innerHTML = "<i class='bi bi-eye-fill'></i>";

    } else {
        np.type = "password";
        npb.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
    }
}

function showPassword2() {
    var rnp = document.getElementById("rnp");
    var rnpb = document.getElementById("rnpb");

    if (rnp.type == "password") {

        rnp.type = "text";

        rnpb.innerHTML = "<i class='bi bi-eye-fill'></i>";
    } else {
        rnp.type = "password";
        rnpb.innerHTML = "<i class='bi bi-eye-slash-fill'></i>";
    }
}