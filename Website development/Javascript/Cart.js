function removeItem(event) {
    var buttonClicked = event.target
    buttonClicked.parentElement.parentElement.remove()
    updateCartTotal()
}
function updateCartTotal() {
    var cartItemContainer = document.getElementsByClassName('cart-items')[0]
    var flexible = cartItemContainer.getElementsByClassName('flexible')
    var total = 0
    for (var i = 0; i < flexible.length; i++) {
        var cartRowIndividual = flexible[i]
        var priceElement = cartRowIndividual.querySelectorAll('.price')[0]
        var quantityElement = cartRowIndividual.querySelectorAll('.qtyInput')[0]
        var price = parseFloat(priceElement.innerText.replace('$', ''))
        var qty = quantityElement.value
        total = total + (qty * price)
    }
    total = Math.round(total * 100) / 100
    document.querySelectorAll('totalPrice')[0].innerText = '$' + total
}