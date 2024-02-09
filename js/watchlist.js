function addToWatchList(id) {
    var id = id;
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);

            if (t == "Added") {

                // document.getElementById("heart" + id).style.color = "red"
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Product Added to WishList");
                window.location.reload();

            } else if (t == "Removed") {

                // document.getElementById("heart" + id).style.color = "white"
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Product Removed From WishList");
                window.location.reload();

            } else if (t == "redirect") {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Please Sign-In First");
                window.location = "index.php";

            } else if (t == "reload") {

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();
}

function removeFromWatchlist(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;

            if (text == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Product Removed From Watchlist.");
                window.location.reload();

            } else if (text == "reload") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Something Went Wrong.");
                window.location.reload();

            } else {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error(text);
                window.location.reload();

            }
        }
    }

    request.open("GET", "removeWatchlistProcess.php?id=" + id, true);
    request.send();

}