var inv_pid = 0;
var modal;

function feedback(id) {
    inv_pid = id;
    var m = document.getElementById("exampleModal");
    modal = new bootstrap.Modal(m);
    modal.show();
}

function saveFeedback() {
    var feedback = document.getElementById("fbk").value;

    var type = 0;

    if (document.getElementById("rad1").checked) {
        type = 1;
    } else if (document.getElementById("rad2").checked) {
        type = 2;
    } else if (document.getElementById("rad3").checked) {
        type = 3;
    }

    var f = new FormData();
    f.append("id", inv_pid);
    f.append("f", feedback);
    f.append("t", type);

    var r = new XMLHttpRequest();
    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                alertify.set('notifier', 'position', 'top-right');
                alertify.success("Thank you for your valuable feedback.");

                window.location.reload();

            } else {
                alertify.set('notifier', 'position', 'top-right');
                alertify.error(t);
            }
        }
    };

    r.open("POST", "feedbackProcess.php", true);
    r.send(f);
}