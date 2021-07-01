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
