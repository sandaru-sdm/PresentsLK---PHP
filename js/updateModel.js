function updateModel(id) {

    var model_id = id;
    var model = document.getElementById("mname");
    var brand = document.getElementById("bname");
    var brand_id = document.getElementById("bid");

    // alert(model.value);
    // alert(brand.value);
    // alert(model_id);
    // alert(brand_id.value);

    var f = new FormData();

    f.append("mname", model.value);
    f.append("bname", brand.value);
    f.append("mid", model_id);
    f.append("bid", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Model Updated Successfully.");

                window.location = "admin-model.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateModelProcess.php", true);
    r.send(f);

}