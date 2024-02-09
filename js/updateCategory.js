function updateCategory(id) {

    var category = document.getElementById("name");

    var f = new FormData();

    f.append("name", category.value);
    f.append("id", id);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Category Updated Successfully.");

                window.location = "admin-category.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "updateCategoryProcess.php", true);
    r.send(f);

}