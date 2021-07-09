function showDetailReceipt(detail, menu, topping, detailTopping, detailWeekly, idReceipt, idWeekly) {
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
            var weeklybook = "Your drink will delivery on ";
            for (let j = 0; j < detailWeeklyObj.length; j++) {
                if (idWeekly == detailWeeklyObj[j].idDetailWeeklyBook) {
                    if (detailWeeklyObj[j].mon == 1) weeklybook += 'monday ';
                    if (detailWeeklyObj[j].tue == 1) weeklybook += 'tuesday ';
                    if (detailWeeklyObj[j].wed == 1) weeklybook += 'wednesday ';
                    if (detailWeeklyObj[j].thu == 1) weeklybook += 'thursday ';
                    if (detailWeeklyObj[j].fri == 1) weeklybook += 'friday ';
                    if (detailWeeklyObj[j].sat == 1) weeklybook += 'saturday ';
                    if (detailWeeklyObj[j].sun == 1) weeklybook += 'sunday ';
                    weeklybook += "at " + detailWeeklyObj[j].deliveryTime + " from " + detailWeeklyObj[j].startDay +" to " + detailWeeklyObj[j].finishDay;
                }
            }

            var message = ` <div class="m-body">
                                <p><span>Amount: </span>${detailObj[i].amount}</p>
                                <p><span>Drink: </span>${menuObj[idDrink].name}</p>
                                <p><span>Topping: </span>${displayTopping}</p>
                                <p><span>Weeklybook: </span>${weeklybook}</p>
                            </div>
            `;

            document
                .querySelector(".modal-body")
                .insertAdjacentHTML("afterbegin", message);
        }
    }
    // console.log(detailObj[3].idDrink);
}

function clearDetail() {
    var details = document.querySelectorAll(".m-body");
    details.forEach(detailRemove);
    function detailRemove(detail) {
        detail.remove();
    }
}
