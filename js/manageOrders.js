function changeInvoiceId(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {

            var responce = r.responseText;

            if (responce == "success") {
                window.location.reload();
            } else {
                alert(responce);
            }

        }
    }
    r.open("GET", "changeInvoiceIdProcess.php?id=" + id, true);
    r.send();
}