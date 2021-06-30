var totalCost = document.getElementById('totalCost');
var cost = 0;
var itemCost = 50000 // Set 50000 to the initial cost of the selected item

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

var sizes = document.querySelectorAll('.size');
sizes.forEach(function(size) {
    size.addEventListener('click', function(e) {
        const currSize = e.currentTarget.parentNode.classList;
        const currValue = parseInt(e.currentTarget.value);
        if (currSize.contains('large')) {
            cost = itemCost + currValue;
        } else if (currSize.contains('medium')) {
            cost = itemCost;
        } else if (currSize.contains('small')) {
            cost = itemCost - currValue;
        }
        totalCost.innerHTML = cost + ' VND';
    })
})

// Choose topping
var toppings = document.querySelectorAll('.topping-item')
toppings.forEach(function(topping) {
    topping.addEventListener('click', function(e) {
        var currValue = parseInt(e.target.value);
        cost += currValue;

        if (e.ctrlKey == true) {
            cost -= currValue * 2;
        }
        console.log(cost);
        totalCost.innerHTML = cost + ' VND';
    })
})

// Counter
var count = 1;
const result = document.querySelector('#count-value');
const minusBtn = document.querySelector('.minus-btn');
const plusBtn = document.querySelector('.plus-btn');
minusBtn.addEventListener('click',()=>{
    count--;
    if (count < 0) { count = 0; }
    result.innerHTML = count;
    if (cost === 0) {
        totalCost.innerHTML = itemCost * count + ' VND';
    } else {
        totalCost.innerHTML = cost * count + ' VND';
    }
})
plusBtn.addEventListener('click',()=>{
    count++;
    result.innerHTML = count;
    if (cost === 0) {
        totalCost.innerHTML = itemCost * count + ' VND';
    } else {
        totalCost.innerHTML = cost * count + ' VND';
    }
})

// Add to cart button
var sumValue = 0;
var addToCartBtn = document.querySelector('.add')
addToCartBtn.addEventListener('click', function(){
    var orderImg = document.querySelector('.order-img');
    var orderName = document.querySelector('.p-model > b').innerHTML;
    document.querySelector('.order-info').innerHTML +=
    `
    <div class="list-group-item">
        <div class="row">
            <span id="span-img-item"></span>
            <img id="img-item" src="${orderImg.getAttribute('src')}" alt="...">
            <span id="span-item-name"></span>
            <p>${orderName}</p>
            <span id="span-amount2"></span>
            <p>${count}</p>
            <span id="span-price"></span>
            <p>${totalCost.innerHTML}</p>
        </div>
    </div>
    `
    // Sum
    sumValue += cost * count;
    var sum = document.querySelector('#sum');
    sum.innerHTML = `${sumValue} VND`

    // Total
    var total = document.querySelector('#total');
    total.innerHTML = `${sumValue} VND`

    // Exit
    model.classList.add('hidden');
})
// Close
var model = document.querySelector('.model');
var closeBtn = document.querySelector('.close-btn');
closeBtn.onclick = function() {
    model.classList.add('hidden');
}

var exit = document.querySelector('.model-overlay')
exit.addEventListener('click', function() {
    model.classList.add('hidden');
})

// Open order form
var orderBtn = document.querySelectorAll('.button-order')
orderBtn.forEach(function(btn) {
    btn.addEventListener('click', function() {
        document.querySelector('.model').classList.remove('hidden');
    })
})