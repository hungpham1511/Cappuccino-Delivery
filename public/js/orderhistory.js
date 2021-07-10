function showDetailReceipt(
    detail,
    menu,
    topping,
    detailTopping,
    detailWeekly,
    idReceipt,
    idWeekly
) {
    const detailObj = JSON.parse(detail);
    const menuObj = JSON.parse(menu);
    const toppingObj = JSON.parse(topping);
    const detailToppingObj = JSON.parse(detailTopping);
    const detailWeeklyObj = JSON.parse(detailWeekly);
    var idDrink;
    for (let i = 0; i < detailObj.length; i++) {
        if (idReceipt == detailObj[i].idReceipt) {
            for (let j = 0; j < menuObj.length; j++) {
                if (detailObj[i].idDrink == menuObj[j].idDrink) {
                    idDrink = j;
                    break;
                }
            }
            var displayTopping = "";
            for (let j = 0; j < detailToppingObj.length; j++) {
                if (
                    detailObj[i].idDetailReceipt ==
                    detailToppingObj[j].idDetailReceipt
                ) {
                    for (let k = 0; k < toppingObj.length; k++) {
                        if (
                            detailToppingObj[j].idTopping ==
                            toppingObj[k].idTopping
                        ) {
                            if (displayTopping == "")
                                displayTopping += toppingObj[k].name;
                            else displayTopping += "/" + toppingObj[k].name;
                        }
                    }
                }
            }

            var message = ` <div class="m-body">
                                <p><span>Drink: </span>${menuObj[idDrink].name}</p>
                                <p><span>Size: </span>${detailObj[i].size}</p>
                                <p><span>Price: </span>${detailObj[i].price/detailObj[i].amount}</p>
                                <p><span>Amount: </span>${detailObj[i].amount}</p>
                                <p><span>Topping: </span>${displayTopping}</p>
                                <p><span> ------------- </span></p>

                            </div>
            `;
            document
                .querySelector(".modal-body")
                .insertAdjacentHTML("afterbegin", message);
        }
    }
    var weeklybook = "";
        for (let j = 0; j < detailWeeklyObj.length; j++) {
            if (idWeekly == detailWeeklyObj[j].idDetailWeeklyBook) {
                weeklybook +=
                    " at " +
                    detailWeeklyObj[j].deliveryTime +
                    " from " +
                    detailWeeklyObj[j].startDay +
                    " to " +
                    detailWeeklyObj[j].finishDay +
                    " on ";
                if (detailWeeklyObj[j].mon == 1) weeklybook += "Monday/";
                if (detailWeeklyObj[j].tue == 1) weeklybook += "Tuesday/";
                if (detailWeeklyObj[j].wed == 1) weeklybook += "Wednesday/";
                if (detailWeeklyObj[j].thu == 1) weeklybook += "Thursday/";
                if (detailWeeklyObj[j].fri == 1) weeklybook += "Friday/";
                if (detailWeeklyObj[j].sat == 1) weeklybook += "Saturday/";
                if (detailWeeklyObj[j].sun == 1) weeklybook += "Sunday/";
            }
        }
        weeklybook = weeklybook.slice(0, weeklybook.length - 1);
        if (weeklybook != "") {
        var message = ` <div class="m-body">
                                <p><span>Weeklybook service: Your drink will delivery</span>${weeklybook}</p>
                            </div>
            `;
        }
        document
            .querySelector(".modal-body")
            .insertAdjacentHTML("afterbegin", message);
}

function clearDetail() {
    var details = document.querySelectorAll(".m-body");
    details.forEach(detailRemove);
    function detailRemove(detail) {
        detail.remove();
    }
}
