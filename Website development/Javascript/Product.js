var headphoneField = document.querySelector('.headphone');
var keyboardField = document.querySelector('.keyboard');
var laptopField = document.querySelector('.laptop');
var iphoneField = document.querySelector('.iphone');
var selections = document.querySelectorAll('.selectionButton');

document.getElementById('headphone').addEventListener('click', headphone, false)
document.getElementById('keyboard').addEventListener('click', keyboard, false)
document.getElementById('laptop').addEventListener('click', laptop, false)
document.getElementById('iphone').addEventListener('click', iphone, false)

for(var i=0; i < selections.length; i++){
    selections[i].addEventListener('click', cart, false)
}

function headphone(){
    headphoneField.style.display = 'block';
    keyboardField.style.display = 'none';
    laptopField.style.display = 'none';
    iphoneField.style.display = 'none';
}
function keyboard(){
    headphoneField.style.display = 'none';
    keyboardField.style.display = 'block'
    laptopField.style.display = 'none';
    iphoneField.style.display = 'none';
}
function laptop(){
    headphoneField.style.display = 'none';
    keyboardField.style.display = 'none';
    laptopField.style.display = 'block';
    iphoneField.style.display = 'none';
}
function iphone(){
    headphoneField.style.display = 'none';
    keyboardField.style.display = 'none'
    laptopField.style.display = 'none';
    iphoneField.style.display = 'block';
}
function cart(event){
    console.log(event);
}