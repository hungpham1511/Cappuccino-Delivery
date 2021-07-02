
// Uncheck buttons
var radios = document.getElementsByTagName('input');
for (i = 0; i < radios.length; i++) {
    radios[i].onclick = function(e) {
        if (e.ctrlKey || e.metaKey) {
            this.checked = false;
        }
    }
}

// Choose size
function custom(p) { 
    var price = parseFloat(p);
    var cost = price;
    // Choose size
    var sizes = document.querySelectorAll('.size');
    sizes.forEach(function(size) {
    size.addEventListener('click', function(e) {
        const currSize = e.currentTarget.parentNode.classList;
        const currValue = parseInt(e.currentTarget.value);
        if (currSize.contains('large')) {
            price =  (cost + currValue);
            cost = price;
        } else if(currSize.contains('medium')){
            price = parseFloat(p);
            cost =  price;
        }
        else if (currSize.contains('small')) {
            price =  (cost - currValue);
            cost = price;
        }
        totalCost.innerHTML = price + ' VND';
    })
})
    //Choose topping
    var toppings = document.querySelectorAll('.topping-item')
    toppings.forEach(function(topping) {
        topping.addEventListener('click', function(e) {
            var currValue = parseInt(e.target.value);
            cost+= currValue;
    
            if (e.ctrlKey == true) {
                cost-= (currValue * 2);
            }
            totalCost.innerHTML = cost + ' VND';
        })
    })

    // Counter
    var count = 1;
    const result = document.querySelector('#count-value');
    result.innerHTML = count;
    const minusBtn = document.querySelector('.minus-btn');
    const plusBtn = document.querySelector('.plus-btn');
    minusBtn.addEventListener('click',()=>{
        if(count>1){
            count--;
            result.innerHTML = count;
        };
        totalCost.innerHTML = cost * count + ' VND';
    })
    plusBtn.addEventListener('click',()=>{
        count++;
        result.innerHTML = count;
        totalCost.innerHTML = cost * count + ' VND';
    }) 


    var sumValue = 0;
    var addToCartBtn = document.querySelector('.add')
    addToCartBtn.addEventListener('click', function(){
        var orderImg = document.querySelector('.order-img');
        var orderName = document.querySelector('.p-model>b').innerHTML;
        var quantity = document.querySelector('#count-value');
        const size = document.querySelectorAll('.size');
        var sizeDetail = "";
        for(var i=0;i<size.length;i++){
            if(size[i].checked == true){
                if(size[i].parentNode.classList.contains('small')){
                    sizeDetail ="S";
                }
                if(size[i].parentNode.classList.contains('medium')){
                    sizeDetail ="M";
                }
                if(size[i].parentNode.classList.contains('large')){
                    sizeDetail ="L";
                }
            };
        }
        console.log(sizeDetail);

        const toppingCheck = document.querySelectorAll('.topping')
        var toppingDetails = "";
        for(var i=0;i<toppingCheck.length;i++){
            if(toppingCheck[i].checked==true){
                toppingDetails +=toppingCheck[i].nextElementSibling.innerHTML+" ";
            }
        }

        var message = `<tr class="row1">
            <td class="td-img">
                <img class="img-item" src="${orderImg.src}" alt="logo item">
            </td>
            <td colspan="2">${orderName} ( ${sizeDetail} )<br><span style="font-size: 12px">${toppingDetails}</span></td>
            <td>${quantity.innerHTML}</td>
            <td class="cost2">${totalCost.innerHTML}</td>
        </tr>
        `;

        document.querySelector('.cart-detail').insertAdjacentHTML('afterbegin',message);

        
        // Sum
        sumValue += cost * count;
        // var sum = document.querySelector('.cost3');
        // sum.innerHTML = `${sumValue} VND`
    
        // Total
        var total = document.querySelector('.total');

        total.innerHTML = `${sumValue} VND`
    
        // Exit
        close();
    })
}

// Add to cart button
// Close
var closeBtn = document.querySelector('.close-btn');
closeBtn.addEventListener('click',()=>close())

var exit = document.querySelector('.model-overlay')
exit.addEventListener('click',()=>close())


// Open order form
function openOrderForm(name,img,des,price) {
    document.querySelector('.model').classList.remove('hidden');//Show model
    // Insert order name into order detail
    const orderDetail = document.querySelector('.order-detail');
    const orderName = 
    ` 
    <div class="order-name">
        <img src="${img}" class="order-img" alt="Frappe">
        <div>
            <p class="p-model" style="padding-top: 5px"><b style="font-size:16px">${name}</b></p>
            <p class="p-model">${des}</p>
            <p class="p-model" id="order-size"></p>
        </div>
        <i class="close-btn fas fa-times"></i>
    </div>
    `
    orderDetail.insertAdjacentHTML('afterbegin',orderName);

    // Insert price
    const orderAdd = document.querySelector('.add');
    const productPrice = `<p class="p-model" id="totalCost">${Math.floor(price)} VND</p>`

    orderAdd.insertAdjacentHTML('beforeend',productPrice);
    //Get price
    var totalCost = document.getElementById('totalCost');

    // Autocheck medium size
    const medium = document.querySelector('.medium');
    medium.childNodes[1].checked = true;
    // Get price data

    // Customize
    custom(price);
}

function getId(id) {
    console.log(id);
}

// Close order form
function close(){
    document.querySelector('.model').classList.add('hidden'); //Hidden model
    // Remove inserted order name from order detail
    const orderDetail = document.querySelector('.order-detail');
    const orderName = document.querySelector('.order-name');
    orderDetail.removeChild(orderName);

    // Remove price
    const orderAdd = document.querySelector('.add');
    const productPrice = document.querySelector('#totalCost');
    orderAdd.removeChild(productPrice);

    // Clear all checked button
    const size = document.querySelectorAll('.size');
    for(var i=0;i<size.length;i++){
        size[i].checked = false;
    }

    const topping = document.querySelectorAll('.topping');
    for(var i=0;i<topping.length;i++){
        topping[i].checked = false;
    }

    // Counter
    var counter = document.querySelector('#count-value')
    counter.innerHTML = 1;
}