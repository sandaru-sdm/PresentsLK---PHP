function getDistrict(id) {

    var f = new FormData();

    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("district").innerHTML = t;
        }
    }

    r.open("POST", "getDistricts.php", true);
    r.send(f);

}

function getCity(id) {

    var f = new FormData();

    f.append("id", id);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("city").innerHTML = t;

        }
    }

    r.open("POST", "getCity.php", true);
    r.send(f);

}

function preview(event) {
    var img = document.getElementById("profile");
    img_count = img.files.length;

    var image = URL.createObjectURL(event.target.files[0]);

    document.getElementById("preview").src = image;

}

function updateProfile() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var postalCode = document.getElementById("postal_code");
    var image = document.getElementById("profile");

    var f = new FormData();

    f.append("fname", fname.value);
    f.append("lname", lname.value);
    f.append("mobile", mobile.value);
    f.append("line1", line1.value);
    f.append("line2", line2.value);
    f.append("province", province.value);
    f.append("district", district.value);
    f.append("city", city.value);
    f.append("postalCode", postalCode.value);
    f.append("img", image.files[0]);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.success("User Profile Updated Successfully.");

                window.location.reload();

            } else if (t == "redirect") {

                alertify.set('notifier', 'position', 'top-right');
                alertify.error("Please Login to your Account First.");

                window.location = "index.php";

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }

        }
    }

    r.open("POST", "userProfileUpdateProcess.php", true);
    r.send(f);
}