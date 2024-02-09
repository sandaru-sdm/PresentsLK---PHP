function updateColor(id) {

    var color = document.getElementById("name");

    var f = new FormData();

    f.append("name", color.value);
    f.append("id", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Color Updated Successfully.");

                window.location = "admin-color.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateColorProcess.php", true);
    r.send(f);

}