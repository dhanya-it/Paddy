// script.js

// Initialize the cart array and cart count
let cartItems = [];
let cartCount = 0;

// Open modal and populate form
const orderButtons = document.querySelectorAll('.addtocartBtn');
const modal = document.getElementById('orderModal');
const closeBtn = document.querySelector('.closeBtn');
const orderForm = document.getElementById('orderForm');
const paddyTypeInput = document.getElementById('paddyType');
const pricePerKgInput = document.getElementById('pricePerKg');
const quantityInput = document.getElementById('quantity');
const totalPriceInput = document.getElementById('totalPrice');
const cartBtn = document.getElementById('cartBtn');
const cartModal = document.getElementById('cartModal');
const closeCartBtn = document.querySelector('.closeCartBtn');
const cartItemsContainer = document.getElementById('cartItems');
const cartTotal = document.getElementById('cartTotal');

// Show modal with order form populated
orderButtons.forEach(button => {
    button.addEventListener('click', function() {
        const paddyType = this.getAttribute('data-paddy');
        const pricePerKg = this.getAttribute('data-price');

        paddyTypeInput.value = paddyType;
        pricePerKgInput.value = pricePerKg;
        totalPriceInput.value = ''; // Reset total price
        quantityInput.value = ''; // Reset quantity

        modal.style.display = 'flex';
    });
});

// Close order modal
closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Calculate total price when quantity is entered
quantityInput.addEventListener('input', () => {
    const pricePerKg = parseFloat(pricePerKgInput.value);
    const quantity = parseFloat(quantityInput.value);

    if (quantity > 0) {
        const totalPrice = (pricePerKg * quantity).toFixed(2);
        totalPriceInput.value = totalPrice;
    } else {
        totalPriceInput.value = '';
    }
});

// Add item to cart when form is submitted
orderForm.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    const paddyType = paddyTypeInput.value;
    const quantity = parseInt(quantityInput.value);
    const pricePerKg = parseFloat(pricePerKgInput.value);
    const totalPrice = (pricePerKg * quantity).toFixed(2);

    // Check if item already exists in the cart
    const existingItemIndex = cartItems.findIndex(item => item.type === paddyType);

    if (existingItemIndex > -1) {
        // If item exists, update the quantity and total price
        cartItems[existingItemIndex].quantity += quantity;
        cartItems[existingItemIndex].totalPrice = (pricePerKg * cartItems[existingItemIndex].quantity).toFixed(2);
    } else {
        // If item does not exist, add it to the cart
        cartItems.push({ type: paddyType, quantity: quantity, totalPrice: totalPrice });
    }

    // Update cart count
    cartCount += quantity; // Add the quantity to the cart count
    cartBtn.textContent = `Cart (${cartCount})`; // Update the cart button text

    // Close the modal
    modal.style.display = 'none';
});

// Show cart contents when cart button is clicked
cartBtn.addEventListener('click', function() {
    displayCart();
    cartModal.style.display = 'flex'; // Show cart modal
});

// Close cart modal
closeCartBtn.addEventListener('click', () => {
    cartModal.style.display = 'none';
});

// Function to display cart items
function displayCart() {
    cartItemsContainer.innerHTML = ''; // Clear previous items
    let total = 0;

    // Loop through cart items and display them
    cartItems.forEach((item, index) => {
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('cart-item'); // Add a class for styling
        itemDiv.innerHTML = `
            <div>${item.type}: ${item.quantity} kg - Rs. ${item.totalPrice}</div>
            <div class="cart-item-buttons">
                <button class="editBtn">Edit</button>
                <button class="removeBtn">Remove</button>
            </div>
        `;
        
        // Add event listeners for Edit and Remove buttons
        itemDiv.querySelector('.editBtn').addEventListener('click', () => editCartItem(index));
        itemDiv.querySelector('.removeBtn').addEventListener('click', () => removeCartItem(index));
        
        cartItemsContainer.appendChild(itemDiv);
        total += parseFloat(item.totalPrice); // Calculate total price
    });

    // Update total price in cart modal
    cartTotal.textContent = `Total: Rs: ${total.toFixed(2)}`;
}

// Edit cart item function
//function editCartItem(index) {
   // const item = cartItems[index];
   // const newQuantity = prompt(`Edit quantity for ${item.type}`, item.quantity);
    
   // if (newQuantity !== null) {
   //     const quantity = parseInt(newQuantity);
    //    if (quantity > 0) {
    //        const pricePerKg = parseFloat(item.totalPrice / item.quantity); // Calculate price per kg
     //       item.quantity = quantity;
    //        item.totalPrice = (pricePerKg * quantity).toFixed(2);
      //      displayCart(); // Update cart display
      //  } else {
       //     alert("Quantity must be greater than 0");
       // }
   // }
//}

// Remove cart item function
//function removeCartItem(index) {
   // const item = cartItems[index];
    //cartCount -= item.quantity; // Update cart count
    //cartBtn.textContent = `Cart (${cartCount})`; // Update cart button text
   // cartItems.splice(index, 1); // Remove item from cart
    //displayCart(); // Update cart display
//}

// Close modal when clicking outside of it
window.addEventListener('click', function(event) {
    if (event.target === modal) {
        modal.style.display = 'none';
    }
    if (event.target === cartModal) {
        cartModal.style.display = 'none';
    }
});





