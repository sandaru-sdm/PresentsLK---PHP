function addAdmin() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var username = document.getElementById("username");
    var password = document.getElementById("password");
    var confirm = document.getElementById("confirmPassword");
    var image = document.getElementById("profile");

    if (img_count >= 1) {

        var f = new FormData();

        f.append("fname", fname.value);
        f.append("lname", lname.value);
        f.append("username", username.value);
        f.append("password", password.value);
        f.append("confirm", confirm.value);
        f.append("img", image.files[0]);

        var r = new XMLHttpRequest();

        r.onreadystatechange = function() {
            if (r.readyState == 4) {
                var t = r.responseText;
                if (t == "success") {

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success("Admin Added Successfully.");

                    window.location = "admin-Admin.php";

                } else {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error(t);
                }
            }
        }

        r.open("POST", "addAdminProcess.php", true);
        r.send(f);


    } else {

        alertify.set('notifier', 'position', 'top-right');
        alertify.error("Please Select Image");

    }

}

var img_count = 0;

function preview(event) {
    var img = document.getElementById("profile");
    img_count = img.files.length;

    var image = URL.createObjectURL(event.target.files[0]);

    document.getElementById("preview").src = image;



}