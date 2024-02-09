function addCategory() {

    var category = document.getElementById("category");

    var f = new FormData();

    f.append("category", category.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Category Added Successfully.");

                window.location = "admin-category.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addCategoryProcess.php", true);
    r.send(f);

}