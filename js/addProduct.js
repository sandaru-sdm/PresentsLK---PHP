var img_count = 0;

function preview(event) {
    var img = document.getElementById("product");
    img_count = img.files.length;

    for (var x = 0; x < img_count; x++) {

        var image = URL.createObjectURL(event.target.files[x]);

        document.getElementById("preview" + x).src = image;

    }

}

var count = 0;

function addProduct() {

    if (count == '0') {
        count = 1;
        // alert("ok");

        var title = document.getElementById("title");
        var description = document.getElementById("description");
        var price = document.getElementById("price");
        var qty = document.getElementById("qty");
        var color = document.getElementById("color");
        var dfc = document.getElementById("dfc");
        var dfoc = document.getElementById("dfoc");
        var condition = document.getElementById("condition");
        var category = document.getElementById("category");
        var brand = document.getElementById("brand");
        var model = document.getElementById("model");
        var image = document.getElementById("product");

        var img = document.getElementById("product");
        img_count = img.files.length;

        if (img_count >= 1) {

            var f = new FormData();

            f.append("title", title.value);
            f.append("description", description.value);
            f.append("price", price.value);
            f.append("qty", qty.value);
            f.append("color", color.value);
            f.append("dfc", dfc.value);
            f.append("dfoc", dfoc.value);
            f.append("condition", condition.value);
            f.append("category", category.value);
            f.append("brand", brand.value);
            f.append("model", model.value);
            f.append("img0", image.files[0]);
            f.append("img1", image.files[1]);
            f.append("img2", image.files[2]);
            f.append("img3", image.files[3]);
            f.append("img4", image.files[4]);

            f.append("count", img_count);

            var r = new XMLHttpRequest();

            r.onreadystatechange = function() {
                if (r.readyState == 4) {
                    var t = r.responseText;
                    if (t == "success") {

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success("Product Added Successfully.");

                        window.location = "admin-products.php";

                    } else {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.error(t);
                    }
                }
            }

            r.open("POST", "addProductProcess.php", true);
            r.send(f);

        } else {
            alertify.set('notifier', 'position', 'top-right');
            alertify.error("Please Select Images First");
        }
    }
}


// alert(title.value);
// alert(description.value);
// alert(price.value);
// alert(qty.value);
// alert(color.value);
// alert(dfc.value);
// alert(dfoc.value);
// alert(condition.value);
// alert(category.value);
// alert(brand.value);
// alert(model.value);

// alert(img_count);
// alert(image.files[0].name);
// alert(image.files[1].name);
// alert(image.files[2].name);
// alert(image.files[3].name);
// alert(image.files[4].name);