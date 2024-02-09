function addToCart(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Product Added To Cart.");
                // window.location.reload();

            } else if (t == "updated") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Product QTY Updated Successfully.");
                // window.location.reload();

            } else if (t == "reload") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Something Went Wrong.");
                window.location.reload();

            } else if (t == "redirect") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Please Sign-in First.");
                window.location = "index.php";

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
                // window.location.reload();

            }

        }
    }
    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();
}

function removeFromCart(id) {
    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Product Removed From Cart Successfully..");
                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
                window.location.reload();

            }

        }
    }
    r.open("GET", "removeFromCartProcess.php?id=" + id, true);
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

function updateqty(pid) {
    var qty = document.getElementById("qtyInput");

    var r = new XMLHttpRequest();

    var f = new FormData();

    f.append("qty", qty.value);
    f.append("pid", pid);

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                // alert(t);
                window.location.reload();

            } else if (t == "redirect") {
                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "updateQTY.php", true);
    r.send(f);

}

function check_value(qty) {

    var input = document.getElementById("qtyInput");

    if (input.value <= 0) {

        alertify.set('notifier', 'position', 'top-right');
        alertify.error("Quantity must be greater than 1.");
        // alert("Quantity must be greater than 1.");
        input.value = "1";

    } else if (input.value > qty) {

        alertify.set('notifier', 'position', 'top-right');
        alertify.error("Insufficient Quantity.");
        // alert("Insufficient Quantity.");
        input.value = qty;

    }

}

function qty_inc(qty) {

    var input = document.getElementById("qtyInput");

    if (input.value < qty) {
        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();
    } else {
        alertify.set('notifier', 'position', 'top-right');
        alertify.error("Maximum Quantity has Achieved.");
        // alert("Maximum Quantity has Achieved.");
    }

}

function qty_dec() {

    var input = document.getElementById("qtyInput");

    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();
    } else {
        alertify.set('notifier', 'position', 'top-right');
        alertify.error("Minimum Quantity has Achieved.");
        // alert("Minimum Quantity has Achieved.");
    }

}

function checkOut() {

    var shipping = document.getElementById("shipping");
    var total = document.getElementById("total");

    var f = new FormData();

    f.append("shipping", shipping.value);
    f.append("total", total.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            // alert(t);

            window.location = "checkout.php?order_id=" + t;

        }
    }

    r.open("POST", "checkOutCartProcess.php", true);
    r.send(f);


}