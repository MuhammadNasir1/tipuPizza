@extends('User.layout')


@section('title')
    Cart
@endsection

@section('content')

<div class=" min-h-[80vh] my-20">
    <div class="container mx-auto px-4 lg:px-8">
        <!-- Page Title -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Your Cart</h1>

        <!-- Cart Items Section -->
        <div class="bg-white shadow-md rounded-lg p-4">
            <table class="w-full table-auto">
                <thead>
                    <tr class="text-left text-gray-600 border-b">
                        <th class="py-2">Item</th>
                        <th class="py-2">Size</th>
                        <th class="py-2">Quantity</th>
                        <th class="py-2">Price</th>
                        <th class="py-2">Total</th>
                        <th class="py-2">Action</th>
                    </tr>
                </thead>
                <tbody id="cartItems">
                    <!-- Cart items will be dynamically rendered here -->
                </tbody>
            </table>
        </div>

        <!-- Delivery or Dining Option -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-4">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Choose Your Dining Option</h2>
            <div class="flex gap-6">
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="dining_option" value="dine_in" class="form-radio h-5 w-5 text-primary" />
                    <span class="ml-2 text-gray-700">Dine-In</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input type="radio" name="dining_option" value="delivery" class="form-radio h-5 w-5 text-primary" />
                    <span class="ml-2 text-gray-700">Delivery</span>
                </label>
            </div>
            <div id="deliveryAddress" class="mt-4 hidden">
                <label for="address" class="block text-sm text-gray-600 mb-2">Delivery Address</label>
                <input type="text" id="address" class="w-full border rounded-lg px-4 py-2 text-gray-800" placeholder="Enter your delivery address">
            </div>
        </div>

        <!-- Total and Checkout Section -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-4">
            <div class="flex justify-between items-center">
                <div class="text-lg font-semibold text-gray-700">
                    Total: <span id="cartTotal" class="text-primary">£0.00</span>
                </div>
                <button id="checkoutButton" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-dark transition">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
</div>




@endsection

@section('js')
<script>
$(document).ready(function () {
    // Toggle Delivery Address
    $('input[name="dining_option"]').on('change', function () {
        const deliveryAddress = $('#deliveryAddress');
        if ($(this).val() === 'delivery') {
            deliveryAddress.removeClass('hidden');
        } else {
            deliveryAddress.addClass('hidden');
        }
    });

    // Initialize cart from localStorage
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const $cartItemsContainer = $('#cartItems');
    const $cartTotalElement = $('#cartTotal');

    const renderCart = () => {
        $cartItemsContainer.empty();
        let total = 0;

        cartItems.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;

            $cartItemsContainer.append(`
                <tr class="border-b">
                    <td class="py-2">${item.name}</td>
                    <td class="py-2">${item.size}</td>
                    <td class="py-2">
                        <div class="flex items-center">
                            <button class="decrease-quantity px-2 bg-gray-300 rounded" data-index="${index}">-</button>
                            <span class="mx-2">${item.quantity}</span>
                            <button class="increase-quantity px-2 bg-gray-300 rounded" data-index="${index}">+</button>
                        </div>
                    </td>
                    <td class="py-2">£${item.price.toFixed(2)}</td>
                    <td class="py-2">£${itemTotal.toFixed(2)}</td>
                    <td class="py-2">
                        <button class="remove-item bg-red-500 text-white px-3 py-1 rounded" data-index="${index}">
                            Remove
                        </button>
                    </td>
                </tr>
            `);
        });

        $cartTotalElement.text(`£${total.toFixed(2)}`);
    };

    // Update cart on quantity change or item removal
    $cartItemsContainer.on('click', '.increase-quantity', function () {
        const index = $(this).data('index');
        cartItems[index].quantity += 1;

        localStorage.setItem('cart', JSON.stringify(cartItems));
        renderCart();
    });

    $cartItemsContainer.on('click', '.decrease-quantity', function () {
        const index = $(this).data('index');
        if (cartItems[index].quantity > 1) {
            cartItems[index].quantity -= 1;
        } else {
            cartItems.splice(index, 1);
        }

        localStorage.setItem('cart', JSON.stringify(cartItems));
        renderCart();
    });

    $cartItemsContainer.on('click', '.remove-item', function () {
        const index = $(this).data('index');
        cartItems.splice(index, 1);

        localStorage.setItem('cart', JSON.stringify(cartItems));
        renderCart();
    });

    // Initial rendering of cart
    renderCart();
});

</script>
@endsection