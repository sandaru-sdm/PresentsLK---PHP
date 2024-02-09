function updateBrand(id) {

    var brand = document.getElementById("name");

    var f = new FormData();

    f.append("name", brand.value);
    f.append("id", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Brand Updated Successfully.");

                window.location = "admin-brand.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateBrandProcess.php", true);
    r.send(f);

}