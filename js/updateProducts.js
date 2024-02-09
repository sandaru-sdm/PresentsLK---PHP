function updateProduct(id) {

    var title = document.getElementById("title");
    var description = document.getElementById("description");
    var price = document.getElementById("price");
    var qty = document.getElementById("qty");
    var dfc = document.getElementById("dfc");
    var dfoc = document.getElementById("dfoc");

    var f = new FormData();

    f.append("title", title.value);
    f.append("description", description.value);
    f.append("price", price.value);
    f.append("qty", qty.value);
    f.append("dfc", dfc.value);
    f.append("dfoc", dfoc.value);
    f.append("id", id);

    var r = new XMLHttpRequest();


    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            // alert(t);
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

    r.open("POST", "updateProductProcess.php", true);
    r.send(f);

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