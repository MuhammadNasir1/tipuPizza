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
                            <th class="p-2">Sub Total</th>
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
                        <span class="ml-2 text-gray-700 flex gap-2 items-center"><svg class="h-5 w-5 text-gray-700"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path fill="currentColor"
                                    d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64l0 48-128 0 0-48zm-48 48l-64 0c-26.5 0-48 21.5-48 48L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-208c0-26.5-21.5-48-48-48l-64 0 0-48C336 50.1 285.9 0 224 0S112 50.1 112 112l0 48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                            </svg> Collection</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" name="dining_option" value="delivery"
                            class="form-radio h-5 w-5 text-primary" />
                        <span class="ml-2 text-gray-700 flex items-center gap-2"><svg class="h-6 w-6 text-gray-700 "
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M312 32c-13.3 0-24 10.7-24 24s10.7 24 24 24l25.7 0 34.6 64-149.4 0-27.4-38C191 99.7 183.7 96 176 96l-56 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l43.7 0 22.1 30.7-26.6 53.1c-10-2.5-20.5-3.8-31.2-3.8C57.3 224 0 281.3 0 352s57.3 128 128 128c65.3 0 119.1-48.9 127-112l49 0c8.5 0 16.3-4.5 20.7-11.8l84.8-143.5 21.7 40.1C402.4 276.3 384 312 384 352c0 70.7 57.3 128 128 128s128-57.3 128-128s-57.3-128-128-128c-13.5 0-26.5 2.1-38.7 6L375.4 48.8C369.8 38.4 359 32 347.2 32L312 32zM458.6 303.7l32.3 59.7c6.3 11.7 20.9 16 32.5 9.7s16-20.9 9.7-32.5l-32.3-59.7c3.6-.6 7.4-.9 11.2-.9c39.8 0 72 32.2 72 72s-32.2 72-72 72s-72-32.2-72-72c0-18.6 7-35.5 18.6-48.3zM133.2 368l65 0c-7.3 32.1-36 56-70.2 56c-39.8 0-72-32.2-72-72s32.2-72 72-72c1.7 0 3.4 .1 5.1 .2l-24.2 48.5c-9 18.1 4.1 39.4 24.3 39.4zm33.7-48l50.7-101.3 72.9 101.2-.1 .1-123.5 0zm90.6-128l108.5 0L317 274.8 257.4 192z" />
                            </svg>Delivery</span>
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
                <p class="font-semibold text-sm text-primary mt-2 hidden " id="diningOptionWarning">Select dining option</p>
                <div class="mt-4">
                    <label for="datetime"
                        class="block text-sm mb-2 font-semibold   focus:outline-none outline-none focus:border-primary">Order
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
                                class="block text-sm text-gray-600 mb-2 focus:outline-none outline-none focus:border-primary">Address</label>
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
                    <button type="submit" class="bg-primary text-white px-12 py-3 rounded-lg font-semibold">
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
            $('input[name="dining_option"]').on('change', function() {
                if ($('input[name="dining_option"]:checked').length > 0) {
                    // If a dining option is selected, add the class
                    $('#diningOptionWarning').addClass('hidden');
                }
            });


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
                        // Swal.fire({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: 'Please select a dining option!',
                        // });
                        // return;
                        $('#diningOptionWarning').removeClass('hidden')
                    } else {
                        $('#diningOptionWarning').addClass('hidden')

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
                                customClass: {
                                    icon: 'text-primary',
                                },
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
                                showConfirmButton: false,
                                timer: 100,
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
