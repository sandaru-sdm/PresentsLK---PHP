function updateAdmin(id) {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var image = document.getElementById("profile");
    var preview = document.getElementById("preview").src;
    var adminID = id;

    var f = new FormData();

    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("adminID", adminID);
    f.append("img", image.files[0]);
    f.append("preview", preview);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Admin Updated Successfully.");

                window.location = "admin-Admin.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addminUpdateProcess.php", true);
    r.send(f);


}

var img_count = 0;

function preview(event) {
    var img = document.getElementById("profile");
    img_count = img.files.length;

    var image = URL.createObjectURL(event.target.files[0]);

    document.getElementById("preview").src = image;

}