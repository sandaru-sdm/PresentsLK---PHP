function addModel() {

    var model = document.getElementById("model");
    var brand = document.getElementById("brand");

    var f = new FormData();

    f.append("model", model.value);
    f.append("brand", brand.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Model Added Successfully.");

                window.location = "admin-model.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addModelProcess.php", true);
    r.send(f);

}