// Hàm xử lý khi thẻ select thay đổi giá trị được chọn
// obj là tham số truyền vào và cũng chính là thẻ select
function typeChanged(obj)
{
    
    var percent = document.getElementById('percentPromo');
    var money = document.getElementById('moneyPromo');
    var value = document.getElementById("promotionType").value;
    if (value === '0'){
        money.innerHTML = "null";
        document.getElementById("createPromo").moneyPromo.disabled = true;
        document.getElementById("createPromo").percentPromo.disabled = false;
        
    }
    else if (value === '1'){
        percent.innerHTML = "null";
        document.getElementById("createPromo").percentPromo.disabled = true;
        document.getElementById("createPromo").moneyPromo.disabled = false;
        
    }
    
}

function editChanged(obj)
{
    var value = document.getElementById("promotionType").value;
    if (value === '0'){
        document.getElementById("moneyDis").style.display = 'none';
        document.getElementById("percentDis").style.display = 'block';
        //document.getElementById("editPromo").moneyPromo.disabled = true;
        //document.getElementById("editPromo").percentPromo.disabled = false;       
    }
    else if (value === '1'){
        document.getElementById("percentDis").style.display = 'none';
        document.getElementById("moneyDis").style.display = 'block';
        //document.getElementById("editPromo").percentPromo.disabled = true;
        //document.getElementById("editPromo").moneyPromo.disabled = false;
        
    }
    
}

function updateChanged(obj)
{
    var value = document.getElementById("promotionType").value;
    if (value === '0'){
        document.getElementById('moneyPromo').value = null;        
    }
    else if (value === '1'){
        document.getElementById('percentPromo').value = null;        
    }   
}