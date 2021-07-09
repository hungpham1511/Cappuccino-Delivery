function showDetailReceipt(detail, menu, topping, idReceipt) {
    const detailObj = JSON.parse(detail);
    const menuObj = JSON.parse(menu);
    const toppingObj = JSON.parse(topping);
    console.log(detailObj);
    console.log(menuObj);
    console.log(toppingObj);
    console.log(idReceipt);
    var idDrink;

    for (let i = 0; i < detailObj.length; i++) {
        if (
            idReceipt == detailObj[i].idReceipt
        ) {
            console.log(1);
            for (let j = 0; j < menuObj.length; j++) {
                if (
                    detailObj[i].idDrink == menuObj[j].idDrink
                ) {
                    idDrink = j;
                    break;
                }
            }

            var message = ` <div class="m-body">
                                <p><span>Amount: </span>${detailObj[i].amount}</p>
                                <p><span>Drink: </span>${menuObj[idDrink].name}</p>
                                <p><span>Topping: </span>${toppingObj[i].name}</p>
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
    console.log("clear");
    var details = document.querySelectorAll(".m-body")
    details.forEach(detailRemove);
    function detailRemove(detail) {
        detail.remove();
    }
}