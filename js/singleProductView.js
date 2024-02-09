function singleProductView(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                alert(t);

            }

        }
    }

    r.open("GET", "categoryStatusChangeProcess.php?id=" + id, true);
    r.send();

}

function checkQty(pid) {

    var qty = document.getElementById("qty");

    var r = new XMLHttpRequest();

    var f = new FormData();

    f.append("qty", qty.value);
    f.append("pid", pid);

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "notEnough") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Available Quantity is Not Enough.");
                document.getElementById("qty").innerHTML = "1";

            } else if (t == "zero") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Quantity Must Be grater than '0'.");
                document.getElementById("qty").innerHTML = "1";

            }

        }
    }

    r.open("POST", "checkQty.php", true);
    r.send(f);
}

function buyNow(id) {
    var productID = id;
    var qty = document.getElementById("qty");

    var f = new FormData();

    f.append("pid", productID);
    f.append("qty", qty.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "index") {

                alert("Please Sign-In First...!");
                window.location = "index.php";

            } else if (t == "allproduct") {

                alert("Please Select a Product...!");
                window.location = "allProducts.php";

            } else if (t == "qtyMin") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Not Enough Quantityy.");

            } else if (t == "qty0") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Please Enter Product Quantity.");

            } else {

                window.location = "checkout.php?order_id=" + t;

            }

        }
    }

    r.open("POST", "buyNowProcess.php", true);
    r.send(f);

}