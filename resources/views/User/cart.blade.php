@extends('User.layout')


@section('title')
    Cart
@endsection

@section('content')
    <div class="min-h-full bg-gray-100 pb-10 pt-28">
        <div class="container mx-auto px-4 lg:px-8">
            <!-- Page Title -->
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Order Details</h1>

            <!-- Cart Items Section -->
            <div class="bg-white shadow-md rounded-lg p-4 overflow-x-auto">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Cart Summary</h2>
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-left text-gray-600 border-b">
                            <th class="p-2">Item</th>
                            <th class="p-2">Size</th>
                            <th class="p-2">Quantity</th>
                            <th class="p-2">Price</th>
                            <th class="p-2">Total</th>
                        </tr>
                    </thead>
                    <tbody id="cartItems">
                        <!-- Cart items will be dynamically rendered here -->
                    </tbody>
                </table>
            </div>
            <div class="mt-6 bg-white shadow-md rounded-lg p-4">
                <div class="flex justify-between items-center">
                    <div class="text-lg font-semibold text-gray-700">
                        Total: <span id="cartTotal" class="text-primary">£0.00</span>
                    </div>

                </div>
            </div>
            <!-- Delivery or Dining Option -->
            <div class="mt-6 bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-bold text-gray-800 mb-4">Choose Your Dining Option</h2>
                <div class="flex gap-6">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="dining_option" value="collection"
                            class="form-radio h-5 w-5 text-primary" />
                        <span class="ml-2 text-gray-700">Collection</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="dining_option" value="delivery"
                            class="form-radio h-5 w-5 text-primary" />
                        <span class="ml-2 text-gray-700">Delivery</span>
                    </label>
             
                    {{-- <label class="flex items-center cursor-pointer">
                        <input type="radio" name="dining_option" value="dine_in"
                            class="form-radio h-5 w-5 text-primary" />
                        <span class="ml-2 text-gray-700">Dine-In</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="dining_option" value="delivery"
                            class="form-radio h-5 w-5 text-primary" />
                        <span class="ml-2 text-gray-700">Delivery</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="dining_option" value="take-away"
                            class="form-radio h-5 w-5 text-primary" />
                        <span class="ml-2 text-gray-700">Take-Away</span>
                    </label> --}}
                </div>
                <div class="mt-4">
                    <label for="datetime"
                        class="block text-sm text-gray-600 mb-2  focus:outline-none outline-none focus:border-primary">Order
                        Date & Time</label>
                    <input type="datetime-local" id="datetime" name="datetime"
                        class="md:w-56 border w-full rounded-lg px-4 py-2 text-gray-800" required />
                </div>
            </div>
                <!-- Hidden Inputs for Cart Data -->
                <form id="orderForm" method="POST">
                    @csrf
            <!-- User Information -->
            <div id="userDetails" class="mt-4  bg-white shadow-md rounded-lg p-4">
                <h2 class="text-lg font-bold text-gray-800 mb-4">User Information</h2>
                <div class="grid md:grid-cols-2 grid-cols-1 lg:grid-cols-3 gap-4">
                    <div>
                        <label for="name"
                            class="block text-sm text-gray-600 mb-2 focus:outline-none outline-none focus:border-primary">Name</label>
                        <input type="text" id="name" name="name" required
                            class="w-full border rounded-lg px-4 py-2 text-gray-800" required />
                    </div>
                    <div>
                        <label for="phone" required
                            class="block text-sm text-gray-600 mb-2 focus:outline-none outline-none focus:border-primary">Phone
                            Number</label>
                        <input type="tel" id="phone" name="phone"
                            class="w-full border rounded-lg px-4 py-2 text-gray-800" required />
                    </div>
                    <div>
                        <label for="email"
                            class="block text-sm text-gray-600 mb-2 focus:outline-none outline-none focus:border-primary">Email
                            (Optional)</label>
                        <input type="email" id="email" name="email"
                            class="w-full border rounded-lg px-4 py-2 text-gray-800" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <label for="address" required
                            class="block text-sm text-gray-600 mb-2 focus:outline-none outline-none focus:border-primary">Delivery
                            Address</label>
                        <textarea id="address" name="address" class="w-full border h-[110px] rounded-lg px-4 py-2 text-gray-800"></textarea>
                    </div>
                    <div>
                        <label for="note"
                            class="block text-sm text-gray-600 mb-2 focus:outline-none outline-none focus:border-primary">Note
                            (optional)</label>
                        <textarea id="note" name="note" class="w-full border h-[110px] rounded-lg px-4 py-2 text-gray-800"></textarea>
                    </div>
                </div>
            </div>



      
                <input type="hidden" id="cartData" name="cart_data" />
                <input type="hidden" id="diningOption" name="dining_option" />
                <input type="hidden" id="totalAmount" name="total_amount" />

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-primary-dark transition">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let now = new Date();
        let localDatetime = now.getFullYear() + '-' +
            String(now.getMonth() + 1).padStart(2, '0') + '-' +
            String(now.getDate()).padStart(2, '0') + 'T' +
            String(now.getHours()).padStart(2, '0') + ':' +
            String(now.getMinutes()).padStart(2, '0');
        document.getElementById('datetime').value = localDatetime;

        $(document).ready(function() {
            // // Toggle Delivery Address visibility
            // $('input[name="dining_option"]').on('change', function() {
            //     const deliveryAddress = $('#userDetails'); // Ensure the correct selector
            //     if ($(this).val() === 'delivery') {
            //         deliveryAddress.removeClass('hidden');
            //     } else {
            //         deliveryAddress.addClass('hidden');
            //     }
            // });

            // Initialize cart from localStorage
            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const $cartItemsContainer = $('#cartItems');
            const $cartTotalElement = $('#cartTotal');
            console.log(cartItems);

            // Render Cart items dynamically
            const renderCart = () => {
                $cartItemsContainer.empty();
                let total = 0;

                cartItems.forEach((item, index) => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;

                    $cartItemsContainer.append(`
                <tr class="border-b">
                    <td class="p-2">${item.name}</td>
                    <td class="p-2">${item.size}</td>
                    <td class="p-2">
                        <div class="flex items-center">
                            <button class="decrease-quantity px-2 bg-gray-300 rounded" data-index="${index}">-</button>
                            <span class="mx-2">${item.quantity}</span>
                            <button class="increase-quantity px-2 bg-gray-300 rounded" data-index="${index}">+</button>
                        </div>
                    </td>
                    <td class="p-2">£${item.price.toFixed(2)}</td>
                    <td class="p-2">£${itemTotal.toFixed(2)}</td>
                    <td class="p-2">
                        <button class="remove-item bg-red-500 text-white px-3 py-1 rounded" data-index="${index}">
                            Remove
                        </button>
                    </td>
                </tr>
            `);
                });

                $cartTotalElement.text(`£${total.toFixed(2)}`);
            };

            // Handle increase in quantity
            $cartItemsContainer.on('click', '.increase-quantity', function() {
                const index = $(this).data('index');
                cartItems[index].quantity += 1;

                localStorage.setItem('cart', JSON.stringify(cartItems));
                renderCart();
            });

            // Handle decrease in quantity
            $cartItemsContainer.on('click', '.decrease-quantity', function() {
                const index = $(this).data('index');
                if (cartItems[index].quantity > 1) {
                    cartItems[index].quantity -= 1;
                } else {
                    cartItems.splice(index, 1);
                }

                localStorage.setItem('cart', JSON.stringify(cartItems));
                renderCart();
            });

            // Handle item removal from cart
            $cartItemsContainer.on('click', '.remove-item', function() {
                const index = $(this).data('index');
                cartItems.splice(index, 1);

                localStorage.setItem('cart', JSON.stringify(cartItems));
                renderCart();
            });

            // Initial rendering of cart
            renderCart();

            function orderDataFun() {
                // Form submission logic for placing the order
                $('#orderForm').on('submit', function(event) {
                    event.preventDefault();

                    // Collect form values
                    const name = $('#name').val().trim();
                    const phone = $('#phone').val().trim();
                    const email = $('#email').val().trim();
                    const address = $('#address').val().trim();
                    const note = $('#note').val().trim();
                    const diningOption = $('input[name="dining_option"]:checked').val();
                    const datetime = $('#datetime').val();

                    // Validate fields based on selected dining option
                    if (!diningOption) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select a dining option!',
                        });
                        return;
                    }

                    // Validate datetime field
                    if (!datetime) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please select a preferred date and time!',
                        });
                        return;
                    }

                    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content');
                    // Prepare the order data
                    const orderData = {
                        name: name,
                        phone: phone,
                        email: email,
                        address: address,
                        dining_option: diningOption,
                        datetime: datetime,
                        cart_data: cartItems,
                        note: note,
                        total_amount: parseFloat($cartTotalElement.text().replace('£', '').trim())
                            .toFixed(2),

                    };
                    console.log(orderData);

                    // Send data to the server via AJAX
                    $.ajax({
                        url: '/order', // Replace with the actual server URL to process the order
                        method: 'POST',
                        data: JSON.stringify(orderData), // Ensure the data is in JSON format
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        success: function(response) {
                            console.log(response);

                            Swal.fire({
                                icon: 'success',
                                title: 'Order Placed!',
                                text: 'Your order has been placed successfully!',
                                confirmButtonColor: '#EC1223',
                            }).then(function() {
                                window.location.href =
                                '../'; // Redirect to the home page
                            });

                            // Clear cart after successful order
                            localStorage.removeItem('cart');
                            renderCart();

                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'There was an issue placing your order. Please try again!',
                            });
                        },
                    });
                });
            }

            // Call orderDataFun only once
            orderDataFun();
        });
    </script>
@endsection
