function selectModel(value) {

    var brand = value;

    var f = new FormData();

    f.append("brand", brand);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("model").innerHTML = "<option value='0'>Select Model</option>";
            document.getElementById("model").innerHTML = t;

        }
    }

    r.open("POST", "getModel.php", true);
    r.send(f);

}

function Search(x) {

    var searchText = document.getElementById("searchText");
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var model = document.getElementById("model");
    var priceFrom = document.getElementById("priceFrom");
    var priceTo = document.getElementById("priceTo");
    var sort = document.getElementById("sort");

    var f = new FormData();

    f.append("text", searchText.value);
    f.append("category", category.value);
    f.append("brand", brand.value);
    f.append("model", model.value);
    f.append("priceFrom", priceFrom.value);
    f.append("priceTo", priceTo.value);
    f.append("sort", sort.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            document.getElementById("searchResult").innerHTML = t;
        }
    }

    r.open("POST", "advancedSearchProcess.php", true);
    r.send(f);

}