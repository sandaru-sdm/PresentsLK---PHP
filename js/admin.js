function ok() {
    alertify.set('notifier', 'position', 'top-right');
    alertify.success("Admin Added Successfully.");
}

function changeStatus(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Status Cheanged Successfully.");

                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);

            }

        }
    }

    r.open("GET", "adminStatusChangeProcess.php?id=" + id, true);
    r.send();

}