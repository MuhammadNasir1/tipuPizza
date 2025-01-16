@extends('User.layout')

@section('title')
    Check-Out
@endsection

@section('content')
    <div class="container mx-auto my-10">
        <form id="orderForm">

            <div class="flex flex-wrap lg:flex-nowrap gap-8 w-full">
                <!-- Left Section: Delivery Details -->
                <div class="w-full lg:w-[70%] bg-white p-6 shadow-md rounded-lg h-full">
                    <!-- Personal Details -->
                    <div class="mb-6">
                        <h2 class="font-semibold text-lg mb-4">Personal Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="block">
                                <span class="text-gray-700">Full Name</span>
                                <input required type="text"
                                    class="border p-3 rounded-md w-full focus:border-primary focus:outline-none"
                                    placeholder="Full Name">
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Email</span>
                                <input required type="email"
                                    class="border p-3 rounded-md w-full focus:border-primary focus:outline-none"
                                    placeholder="Email">
                            </label>
                            <label class="block">
                                <span class="text-gray-700">Mobile Number</span>
                                <input required type="text"
                                    class="border p-3 rounded-md w-full focus:border-primary focus:outline-none"
                                    placeholder="Mobile Number">
                            </label>
                            <div class="col-span-2 grid md:grid-cols-2 gap-4 ">
                                <label class="block ">
                                    <span class="text-gray-700">Note</span>
                                    <textarea class="w-full border p-3 rounded-md" rows="2" placeholder="Enter your Note"></textarea>
                                </label>
                                <label class="block ">
                                    <span class="text-gray-700">Address</span>
                                    <textarea class="w-full border p-3 rounded-md" rows="2" placeholder="Enter your address"></textarea>
                                </label>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Right Section: Order Summary and Payment -->
                <div class="w-full lg:w-[30%] bg-white p-6 shadow-md rounded-lg">
                    <!-- Order Summary -->
                    <div class="mb-6">
                        <h2 class="font-semibold text-lg">Your Order</h2>
                        <ul id="order-summary" class="mt-4 space-y-2">
                            <!-- Items will be dynamically injected here -->
                        </ul>
                        <hr class="my-4">
                        <div class="flex justify-between font-semibold text-lg">
                            <span>Delivery</span>
                            <span id="delivery-fee">£0.00</span>
                        </div>
                        <div class="flex justify-between font-semibold text-lg text-primary mt-2">
                            <span>Total</span>
                            <span id="total-price">£0.00</span>
                        </div>
                    </div>

                    <!-- Payment Options -->
                    <div class="mb-6">
                        <h2 class="font-semibold text-lg mb-4">Payment</h2>
                        <div class="space-y-3">
                            <label
                                class="flex items-center gap-3 cursor-pointer border p-3 bg-green-400 text-white rounded-lg">
                                <input type="radio" name="paymentOption" class="hidden">
                                <span class="bg-green-600 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 11c0-1.657-1.343-3-3-3s-3 1.343-3 3c0 1.657 1.343 3 3 3s3-1.343 3-3zM20.278 9.226a5.978 5.978 0 00-1.556-.723c.63-.724 1.083-1.673 1.276-2.771A1 1 0 0018.949 4h-2.615a1 1 0 00-.878.514c-.8 1.46-2.5 2.486-4.457 2.486S7.232 5.974 6.432 4.514A1 1 0 005.553 4H2.94a1 1 0 00-.975 1.254c.193 1.098.647 2.047 1.277 2.771a5.978 5.978 0 00-1.557.723A1 1 0 001 10.046v1.92a1 1 0 001 1h1v7a1 1 0 001 1h14a1 1 0 001-1v-7h1a1 1 0 001-1v-1.92a1 1 0 00-.722-.82z" />
                                    </svg>
                                </span>
                                <span class="font-medium">Cash on Delivery</span>
                            </label>
                            <label class="flex items-center gap-3 border p-3 rounded-lg cursor-not-allowed"
                                id="commingSoon">
                                <input type="radio" name="paymentOption" class="hidden">
                                <span class="bg-gray-200 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.364 5.636a9 9 0 11-12.728 0 9 9 0 0112.728 0zM11.99 15.75a3.251 3.251 0 100-6.5 3.251 3.251 0 000 6.5z" />
                                    </svg>
                                </span>
                                <span class="font-medium">Credit/Debit Card</span>
                            </label>
                        </div>
                    </div>

                    <!-- Place Order Button -->
                    <button
                        class="w-full bg-primary text-white py-3 rounded-lg text-lg font-semibold hover:bg-primary-dark">
                        Place Order
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('#orderForm').on('submit', function(event) {
                event.preventDefault();
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

                localStorage.removeItem('cart');
                localStorage.removeItem('addonsCart');
                localStorage.removeItem('diningOption');
                localStorage.removeItem('total');

            })
        })

        // Simulate fetching data from local storage
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const addonsCart = JSON.parse(localStorage.getItem("addonsCart")) || [];
        const dinning = localStorage.getItem("diningOption");
        deliveryFee = 0
        if (dinning == "Delivery") {
            deliveryFee = 4;
            $('#delivery-fee').text("£4.00")

        } else {
            $('#delivery-fee').text("£0.00")
             deliveryFee = 0;

        }

        function renderOrderSummary() {
            const orderSummary = document.getElementById('order-summary');
            let total = 0;

            // Add cart items
            cart.forEach(item => {
                const itemTotal = parseFloat(item.price) * item.quantity;
                total += itemTotal;
                const li = document.createElement('li');
                li.className = 'flex justify-between text-gray-700';
                li.innerHTML = `<span>${item.quantity} x ${item.name}</span><span>£${itemTotal.toFixed(2)}</span>`;
                orderSummary.appendChild(li);
            });

            // Add addons
            addonsCart.forEach(addon => {
                const addonTotal = addon.addonPrice * addon.addonQuantity;
                total += addonTotal;
                const li = document.createElement('li');
                li.className = 'flex justify-between text-gray-700';
                li.innerHTML =
                    `<span>${addon.addonQuantity} x ${addon.addonName}</span><span>£${addonTotal.toFixed(2)}</span>`;
                orderSummary.appendChild(li);
            });

            // Add delivery fee
            total += deliveryFee;

            // Update total price
            document.getElementById('total-price').textContent = `£${total.toFixed(2)}`;
        }

        // Render the order summary on page load
        renderOrderSummary();
    </script>
@endsection
