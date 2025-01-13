@extends('User.layout')
@section('title')
    Cart
@endsection

@section('content')
    <div class="container mx-auto my-10">
        <div class="flex flex-wrap lg:flex-nowrap gap-8 w-full">
            <!-- Left Section: Product Cards -->
            <div class="w-full lg:w-[70%] bg-slate-50 p-6 shadow-md">
                <!-- Cards will be dynamically appended here -->
                <div id="product-cards-container"></div>
            </div>

            <!-- Right Section: Order Summary -->
            <div class="w-full lg:w-[30%] bg-slate-50 p-6 shadow-md">
                <!-- Order Summary -->
                <div class="mb-6">
                    <h2 class="font-semibold text-lg">Order Summary</h2>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-gray-700">Total:</p>
                        <p class="font-semibold text-lg" id="order-total">0$</p>
                    </div>
                </div>

                <!-- Delivery/Dining Options -->
                <div class="mb-6">
                    <h2 class="font-semibold text-lg mb-4">Options</h2>
                    <div class="flex flex-col gap-4">
                        <!-- Delivery -->
                        <label class="flex items-center gap-3 cursor-pointer p-3 border rounded-lg hover:bg-gray-100">
                            <input type="radio" name="diningOption" class="hidden" />
                            <span class="bg-blue-500 text-white p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 10h11l-1 9H4l-1-9zM21 12l-4-2m-2 4l4-2m-1-2V6a2 2 0 00-2-2H7a2 2 0 00-2 2v4" />
                                </svg>
                            </span>
                            <span class="font-medium">Delivery</span>
                        </label>

                        <!-- Collection -->
                        <label class="flex items-center gap-3 cursor-pointer p-3 border rounded-lg hover:bg-gray-100">
                            <input type="radio" name="diningOption" class="hidden" />
                            <span class="bg-green-500 text-white p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 17v-2a2 2 0 012-2h12a2 2 0 012 2v2M4 10V5a2 2 0 012-2h12a2 2 0 012 2v5M6 20h12" />
                                </svg>
                            </span>
                            <span class="font-medium">Collection</span>
                        </label>
                    </div>
                </div>

                <!-- Next Button -->
                <button class="w-full bg-primary text-white py-3 rounded-lg text-lg font-semibold hover:bg-primary-dark">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            const $container = $("#product-cards-container");
            const $orderSummaryTotal = $("#order-total");
            const $diningOptions = $("input[name='diningOption']");

            // Load data from local storage
            const cart = JSON.parse(localStorage.getItem("cart")) || [];
            const addonsCart = JSON.parse(localStorage.getItem("addonsCart")) || [];
            let totalPrice = 0;

            // Function to calculate and update total price
            function updateTotalPrice() {
                totalPrice = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
                totalPrice += addonsCart.reduce((sum, addon) => sum + addon.addonPrice * addon.addonQuantity, 0);
                $orderSummaryTotal.text(`${totalPrice}$`);
            }

            // Function to render the entire cart
            function renderCart() {
                $container.empty(); // Clear the container
                cart.forEach((item, index) => {
                    const cardHTML = createProductCard(item, index);
                    $container.append(cardHTML);
                });

                addonsCart.forEach((addon, addonIndex) => {
                    const addonHTML = createAddonCard(addon, addonIndex);
                    $container.append(addonHTML);
                });

                updateTotalPrice(); // Update total price
            }

            // Function to create a product card
            function createProductCard(item, index) {
                const selectedSelectors = item.selectedSelector
                    .map((selector) => `<li>${selector.selectiveName}</li>`)
                    .join("");

                return `
            <div class="card custom-shadow bg-white px-4 py-6 w-full mb-6">
                <div class="flex gap-4 justify-between w-full">
                    <!-- Product Info -->
                    <div class="py-4 w-[70%]">
                        <h2 class="font-semibold text-lg lg:text-xl">${item.name} (${item.size})</h2>
                        <ul class="list-disc list-inside text-gray-600 text-sm mt-2">
                            ${selectedSelectors ?? `<li>${selectedSelectors}</li>`}
                        </ul>
                        <div class="flex items-center mt-4">
                            <p class="mr-2">Quantity:</p>
                            <button class="decrease-quantity px-3 bg-gray-300 text-gray-700 rounded" data-index="${index}">-</button>
                            <span class="mx-4 font-medium">${item.quantity}</span>
                            <button class="increase-quantity px-3 bg-gray-300 text-gray-700 rounded" data-index="${index}">+</button>
                        </div>
                    </div>
                    <!-- Price and Remove Button -->
                    <div class="flex flex-col items-end justify-between py-2 w-[30%]">
                        <button class="remove-item text-red-600 hover:text-red-800 rounded" data-index="${index}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <h2 class="font-semibold text-2xl mt-3">${item.price * item.quantity}$</h2>
                    </div>
                </div>
            </div>
        `;
            }

            // Function to create an add-on card
            function createAddonCard(addon, addonIndex) {
                return `
            <div class="card custom-shadow bg-white px-4 py-4 w-full mb-6">
                <div class="flex gap-4 justify-between">
                    <!-- Add-on Info -->
                    <div class="py-4 w-[70%]">
                        <h3 class="font-semibold text-md">${addon.addonName}</h3>

                        <div class="flex items-center mt-4">
                            <p class="mr-2">Quantity:</p>
                            <button class="decrease-addon-quantity px-3 bg-gray-300 text-gray-700 rounded" data-addon-index="${addonIndex}">-</button>
                            <span class="mx-4 font-medium">${addon.addonQuantity}</span>
                            <button class="increase-addon-quantity px-3 bg-gray-300 text-gray-700 rounded" data-addon-index="${addonIndex}">+</button>
                        </div>
                    </div>
                    <!-- Remove Button for Add-on -->
                    <div class="flex flex-col items-end justify-between py-2 w-[30%]">
                        <button class="remove-addon text-red-600 hover:text-red-800 rounded" data-addon-index="${addonIndex}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <h2 class="font-semibold text-2xl mt-3">${addon.addonPrice * addon.addonQuantity}$</h2>
                    </div>
                </div>
            </div>
        `;
            }

            // Handle quantity increase and decrease for main product
            $container.on("click", ".increase-quantity, .decrease-quantity", function() {
                const index = $(this).data("index");
                const isIncrease = $(this).hasClass("increase-quantity");

                if (isIncrease) {
                    cart[index].quantity += 1;
                } else if (cart[index].quantity > 1) {
                    cart[index].quantity -= 1;
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                renderCart();
            });

            // Handle quantity increase and decrease for add-ons
            $container.on("click", ".increase-addon-quantity, .decrease-addon-quantity", function() {
                const addonIndex = $(this).data("addon-index");
                const isIncrease = $(this).hasClass("increase-addon-quantity");

                if (isIncrease) {
                    addonsCart[addonIndex].addonQuantity += 1;
                } else if (addonsCart[addonIndex].addonQuantity > 1) {
                    addonsCart[addonIndex].addonQuantity -= 1;
                }

                localStorage.setItem("addonsCart", JSON.stringify(addonsCart));
                renderCart();
            });

            // Handle item removal
            $container.on("click", ".remove-item", function() {
                const index = $(this).data("index");
                cart.splice(index, 1);

                localStorage.setItem("cart", JSON.stringify(cart));
                renderCart();
            });

            // Handle add-on removal
            $container.on("click", ".remove-addon", function() {
                const addonIndex = $(this).data("addon-index");
                addonsCart.splice(addonIndex, 1);

                localStorage.setItem("addonsCart", JSON.stringify(addonsCart));
                renderCart();
            });

            // Save dining option in local storage
            $diningOptions.on("change", function() {
                const selectedOption = $(this).siblings("span").text().trim();
                localStorage.setItem("diningOption", selectedOption);
            });

            // Pre-select dining option if saved
            const savedDiningOption = localStorage.getItem("diningOption");
            if (savedDiningOption) {
                $diningOptions.each(function() {
                    const optionText = $(this).siblings("span").text().trim();
                    if (optionText === savedDiningOption) {
                        $(this).prop("checked", true);
                    }
                });
            }

            // Render the cart initially
            renderCart();
        });
    </script>
@endsection
