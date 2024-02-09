function addBrand() {

    var brand = document.getElementById("brand");

    var f = new FormData();

    f.append("brand", brand.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Brand Added Successfully.");

                window.location = "admin-brand.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addBrandProcess.php", true);
    r.send(f);

}