// Created by Hung Pham on 29/06/2021

//Weekly book hide
function weeklybook() {
    var checkBox = document.getElementById("isWeeklyBook");
    var detailBook = document.getElementById("weekday");
    if (checkBox.checked == true) {
        detailBook.style.display = "block";
    } else {
        detailBook.style.display = "none";
    }
}

//Validation form
(function () {
    "use strict";
    var forms = document.querySelectorAll(".needs-validation");
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add("was-validated");
            },
            false
        );
    });
})();
