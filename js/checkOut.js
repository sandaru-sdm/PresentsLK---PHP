var pm;

function paynowproduct() {

    var title = document.getElementById("ptitle").value;
    var amount = document.getElementById("unitPrice").value;
    var qty = document.getElementById("qty").value;

    var img = document.getElementById("pimg").value;

    var t = parseInt(amount);
    var q = parseInt(qty);

    var price = t * q;

    window.location = "checkout.php?item_name=" + title + "&price=" + price + "&image=" + img;

}