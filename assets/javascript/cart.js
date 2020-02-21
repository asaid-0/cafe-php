document.querySelectorAll('.add-to-cart').forEach(function (item) {

    item.addEventListener('click', function () {

        this.setAttribute('disabled', true);

        const itemPrice = this.parentElement.querySelector('.item-price').innerText;
        const itemName = this.parentElement.querySelector('.item-name').innerText;

        const cartItem = document.querySelector('.hidden-item').cloneNode(true);

        cartItem.classList.remove('hidden-item');
        cartItem.querySelector('.name').innerText = itemName;
        cartItem.querySelector('.price').innerText = itemPrice;
        cartItem.querySelector('.quantity').innerText = 1;

        document.querySelector('.drinks-list').appendChild(cartItem)
        document.querySelector('.drinks-list').appendChild(document.createElement('hr'));

        updateTotal();


        cartItem.querySelector('.fa-plus').addEventListener('click', function () {

            const quantityNode = this.parentElement.querySelector(".quantity");
            const priceNode = this.parentElement.querySelector(".price");
            const quantity = parseInt(quantityNode.innerText);
            quantityNode.innerText = quantity + 1;
            priceNode.innerText = getInt(priceNode.innerText) + getInt(itemPrice) + " EGP";
            updateTotal();

        });


        cartItem.querySelector('.fa-minus').addEventListener('click', function () {
            const quantityNode = this.parentElement.querySelector(".quantity");
            const priceNode = this.parentElement.querySelector(".price");
            const quantity = parseInt(quantityNode.innerText)
            if (quantity > 1) {
                quantityNode.innerText = quantity - 1;
                priceNode.innerText = getInt(priceNode.innerText) - getInt(itemPrice) + " EGP";
                updateTotal();
            }
        });

        cartItem.querySelector('.fa-close').addEventListener('click', function () {
            const itemName = this.parentElement.querySelector('.name').innerText;
            document.getElementById(itemName).querySelector('.add-to-cart').removeAttribute('disabled')
            this.parentElement.nextSibling.remove();
            this.parentElement.remove();
            updateTotal();
        });

    });
});


function calculateTotal() {
    const items = document.querySelectorAll('.drinks-list li');
    let totalPrice = 0;
    [].slice.call(items).forEach(item => {
        totalPrice += getInt(item.querySelector(".price").innerText);
    });

    return totalPrice + " EGP";
}

function getInt(currency) {
    return parseInt(currency.replace(/[^\w\s]/gi, ''), 10);
}

function updateTotal() {
    document.querySelector('.cart .total-price').innerText = calculateTotal();
}