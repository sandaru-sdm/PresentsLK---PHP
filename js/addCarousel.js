function addCarousel() {

    var image = document.getElementById("profile");

    var f = new FormData();

    f.append("img", image.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Carousel Image Added Successfully.");

                window.location = "admin-carousel.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    }

    r.open("POST", "addCarouselProcess.php", true);
    r.send(f);

}


var img_count = 0;

function preview(event) {
    var img = document.getElementById("profile");
    img_count = img.files.length;

    var image = URL.createObjectURL(event.target.files[0]);

    document.getElementById("preview").src = image;

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

    r.open("GET", "carouselStatusChangeProcess.php?id=" + id, true);
    r.send();

}