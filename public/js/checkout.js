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

//Receipt
// function getCookie(name) {
//     const value = `; ${document.cookie}`;
//     const parts = value.split(`; ${name}=`);
//     if (parts.length === 2) return parts.pop().split(';').shift();
//   }
// var drinklist=getCookie('drink');
// var res = drinklist.split("-");
// res.forEach(receiptDetail);
// function receiptDetail(drink) {
//     var elements = drink.split(" ");
//     <?php echo CheckoutController::drinkimg(elements[1]);?>

//     var pic = {{ CheckoutController::drinkimg(elements[1]); }};
//     console.log(pic);
    

//     var message = `<tr class="row1">
//             <td class="td-img">
//                 <img class="img-item" src="${orderImg.src}" alt="logo item">
//             </td>
//             <td colspan="2">${orderName} ( ${sizeDetail} )<br><span style="font-size: 12px">${toppingDetails}</span></td>
//             <td>${quantity.innerHTML}</td>
//             <td class="cost2">${totalCost.innerHTML}</td>
//         </tr>
//         `;
//     document.querySelector('.cart-detail').insertAdjacentHTML('afterbegin',message);
// }

