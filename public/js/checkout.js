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

document.querySelectorAll(".form-control.require").forEach((input) => {
    input.addEventListener("input", () => {
        if (input.checkValidity()) {
            input.classList.remove("is-invalid");
            input.classList.add("is-valid");
        } else {
            input.classList.remove("is-valid");
            input.classList.add("is-invalid");
        }
        var is_valid =
            $(".form-control.require").length ===
            $(".form-control.is-valid.require").length;
        $("#modalbtn").attr("disabled", !is_valid);
    });
});

// Receipt
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  }
var drinkList = getCookie('drink');
var drinks = drinkList.split("-");
var i = -1;
var j = 0;
var img = getCookie('image');
var imgList = img.split(" ");
var price = getCookie('price');
var priceList = price.split("-");
var drinkName = getCookie('name');
var nameList = drinkName.split("-");
var topping = getCookie('topping');
var toppingList = topping.split(" ");
console.log(toppingList);
drinks.pop();
drinks.forEach(receiptDetail);
function receiptDetail(drink) {
    i++;
    if (parseInt(toppingList[j]) == i) {
        var toppingDetails = toppingList[j+1];
        if (j < toppingList.length) j+=2;
    }
    else
        var toppingDetails = "";
    var elements = drink.split(" "); 
    var message = `<tr class="row1">
            <td class="td-img">
                <img class="img-item" src="${imgList[i]}" alt="logo item">
            </td>
            <td colspan="2">${nameList[i]} ( ${elements[1]} )<br><span style="font-size: 12px">${toppingDetails}</span></td>
            <td>${elements[elements.length-1]}</td>
            <td class="cost2">${priceList[i]}</td>
        </tr>
        `;
    document.querySelector('.cart-detail').insertAdjacentHTML('afterbegin',message);
}
var sumMoney = parseInt(priceList[priceList.length-1]);
var sum = document.querySelector('.sum');
sum.innerHTML = `${sumMoney} VND`
var shipping = document.querySelector('.shipping');
shipping.innerHTML = `5000 VND`
var total = document.querySelector('.total');
total.innerHTML = `${sumMoney + 5000} VND`

function submitPromo(promo) {
    const promoObj = JSON.parse(promo);
    for (let i = 0; i < promoObj.length; i++) {
        console.log(promoObj[i].promotionCode);
        console.log(document.getElementById('promotion').value);
        if (document.getElementById('promotion').value == promoObj[i].promotionCode) {
            console.log(1);
            var total = document.querySelector('.total');
            if ( promoObj[i].promotionType == 0) 
                total.innerHTML = `${(sumMoney *  promoObj[i].percentPromo/100) + 5000} VND`
            else 
                total.innerHTML = `${sumMoney -  promoObj[i].moneyPromo + 5000} VND`
        }
    };
}
