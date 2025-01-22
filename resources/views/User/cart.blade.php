@extends('User.layout')
@section('title')
    Cart
@endsection

@section('content')
    <div class="container mx-auto my-10">
        <div class="flex flex-wrap lg:flex-nowrap gap-8 w-full bg-slate-50 p-6 shadow-md">
            <!-- Left Section: Product Cards -->
            <div class="w-full lg:w-[70%] ">
                <!-- Cards will be dynamically appended here -->

                {{-- <div class="bg-white p-4 rounded-lg shadow-md w-full">
                    <div class="border-b pb-2 mb-2">
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-lg">Item (S)</span>
                            <div class="flex items-center space-x-2">
                                <button class="bg-gray-300 px-2 rounded">-</button>
                                <span class="text-lg font-semibold">2</span>
                                <button class="bg-gray-300 px-2 rounded">+</button>
                                <span class="font-bold">£7</span>
                                <button class="text-red-500 text-xl">✖</button>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm">selectors</p>
                    </div>

                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">addons</span>
                            <div class="flex items-center space-x-2">
                                <button class="bg-gray-300 px-2 rounded">-</button>
                                <span class="text-lg font-semibold">2</span>
                                <button class="bg-gray-300 px-2 rounded">+</button>
                                <span class="font-bold">£7</span>
                                <button class="text-gray-400">✖</button>
                            </div>
                        </div>


                    </div>
                </div> --}}
                <div id="product-cards-container">








                </div>
            </div>

            <!-- Right Section: Order Summary -->
            <div class="w-full h-full lg:w-[30%] bg-white px-3 py-4 rounded-lg  shadow-md">
                <!-- Order Summary -->
                <div class="mb-6 border border-gray-300 px-2 py-4 rounded-md bg-white ">
                    <h2 class="font-semibold text-lg">Order Summary</h2>
                    <div class="flex justify-between items-center border-b mt-4">
                        <p class="text-gray-700">Sub Total:</p>
                        <p class="font-semibold text-lg" id="sub-total">0£</p>
                    </div>
                    <div class="flex justify-between items-center border-b mt-3 ">
                        <p class="text-gray-700">Delivery Charges:</p>
                        <p class="font-semibold text-lg" id="delivery-charges">0£</p>
                    </div>
                    <div class="flex justify-between items-center mt-2">
                        <p class="text-gray-700 font-semibold">Total:</p>
                        <p class="font-semibold text-lg text-primary" id="order-total">0£</p>
                    </div>
                </div>

                <!-- Delivery/Dining Options -->
                <div class="mb-6">

                    <div class="flex  gap-4">
                        <!-- Delivery -->
                        <label class="flex w-full border-2 items-center gap-3 cursor-pointer p-2 rounded-lg bg-white"
                            data-option="Delivery" id="Delivery">
                            <input type="radio" name="diningOption" class="hidden" />
                            <img src="{{ asset('assets/delivery-icon.png') }}" alt="delivery" class="w-10 h-10">
                            <span class="font-medium">Delivery</span>
                        </label>

                        <!-- Collection -->
                        <label
                            class="flex w-full border-2 items-center gap-3 cursor-pointer p-2  rounded-lg bg-white "
                            data-option="Collection" id='Collection'>
                            <input type="radio" name="diningOption" class="hidden" />
                            <img src="{{ asset('assets/collection-icon.png') }}" alt="collection" class="w-10 h-10">

                            <span class="font-medium">Collection</span>
                        </label>
                    </div>
                    <div>
                        <div class="mt-4 hidden" id="collection-container">
                            <h2 class="font-semibold text-black text-lg">Collection Point</h2>
                            <div class="border border-gray-300 rounded-lg py-4 px-2 mt-2">
                                <div class="flex gap-2 flex-shrink-0 items-center">
                                    <img src="{{ asset('assets/images/new-logo.png') }}" alt="logo"
                                        class="min-w-12 w-12 flex-shrink-0">
                                    <div>
                                        <h2 class="text-black text-xs sm:text-[15px]"> <span class="font-semibold">TIPU
                                                Pizza Kebab</span> <span
                                                class="text-[#6F767E] font-normal">(Restaurant)</span></h2>
                                        <p class="sm:text-xs text-[10px] text-[#6F767E]"><i
                                                class="fa-solid fa-location-dot mr-2"></i>2 Curzon St, Derby DE1 1LL</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-4 hidden" id="delivery-container">
                            <h2 class="font-semibold text-black text-lg">Delivery Point</h2>
                            <div class="border border-gray-300 rounded-lg py-4 px-2 mt-2">
                                <div class="flex gap-2 flex-shrink-0 items-center">
                                    <div class="flex flex-col items-center gap-1 cursor-pointer">
                                        <p> <i class="fa-solid fa-location-dot mr-2 text-2xl text-primary"></i></p>
                                        <p class="text-[10px] text-[#6F767E] ">pick here</p>
                                    </div>
                                    <div>
                                        <h2 class="text-black text-xs sm:text-[15px]"> <span
                                                class="font-semibold">Address</span> <span
                                                class="text-[#6F767E] font-normal">(3.5km)</span></h2>
                                        <p class="sm:text-xs text-[10px] text-[#6F767E]">Zone, google map location here</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>


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
            const $orderSubTotal = $("#sub-total");
            const $orderSummaryTotal = $("#order-total");
            const $diningOptions = $("input[name='diningOption']");

            const savedOption = localStorage.getItem("diningOption");

            function activeDinningBtn(selectedOption) {
                if (selectedOption == "Delivery") {
                    $("#Delivery").addClass("bg-red-400 border-primary");
                    $("#Collection").removeClass("bg-red-400 border-primary");
                    $('#collection-container').addClass('hidden');
                    $('#delivery-container').removeClass('hidden');

                } else if (selectedOption == "Collection") {
                    $("#Collection").addClass("bg-red-400 border-primary").removeClass('hidden');
                    $('#collection-container').removeClass('hidden');
                    $("#Delivery").removeClass("bg-red-400 border-primary");
                    $('#delivery-container').addClass('hidden');
                }
            }
            activeDinningBtn(savedOption);

            // Load data from local storage
            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            function updateTotalPrice() {
                let totalPrice = cart.reduce((sum, item) => {
                    let addonsTotal = item.selectedAddons.reduce((addonSum, addon) =>
                        addonSum + addon.addonPrice * addon.addonQuantity, 0);
                    return sum + (item.price * item.quantity) + addonsTotal;
                }, 0);

                localStorage.setItem("total", totalPrice);

                const formattedPrice = totalPrice % 1 === 0 ? totalPrice.toFixed(0) : totalPrice.toFixed(2);
                $orderSummaryTotal.text(`£${formattedPrice}`);
                $orderSubTotal.text(`£${formattedPrice}`);
            }

            function renderCart() {
                $container.empty(); // Clear the container
                cart.forEach((item, index) => {
                    const cardHTML = createProductCard(item, index);
                    $container.append(cardHTML);
                });
                updateTotalPrice();
            }

            function createProductCard(item, index) {
                const selectedSelectors = item.selectedSelector
                    .map((selector) => `<li>${selector.selectiveName}</li>`)
                    .join("");

                const selectedAddons = item.selectedAddons
                    .map((addon) => `
                    <div class="flex justify-between items-center border-b pb-2">
                        <span class="text-gray-600">${addon.addonName}</span>
                        <div class="flex items-center space-x-4">
                        ${addon.addonPrice !== 0 ? `
                            <button class="decrease-addon-quantity px-2 bg-gray-300 rounded" data-index="${index}" data-addon-id="${addon.addonId}">-</button>
                            <span class="text-lg font-semibold">${addon.addonQuantity}</span>
                            <button class="increase-addon-quantity px-2 bg-gray-300 rounded" data-index="${index}" data-addon-id="${addon.addonId}">+</button>
                            <span class="font-bold">£${(addon.addonPrice * addon.addonQuantity).toFixed(2)}</span>` : ''}
                            <button class="remove-addon text-gray-400" data-index="${index}" data-addon-id="${addon.addonId}">✖</button>
                        </div>
                    </div>
                `).join("");

                return `
                <div class="card rounded-lg custom-shadow bg-white px-4 py-2 w-full mb-6">
                    <div class="flex gap-4 justify-between w-full border-b">
                        <div class="py-4 w-[70%]">
                            <h2 class="font-semibold text-lg lg:text-xl">${item.name} (${item.size})</h2>
                            <ul class="list-disc list-inside text-gray-600 text-sm mt-2">
                                ${selectedSelectors}
                            </ul>
                            <div class="flex items-center mt-4">
                                <p class="mr-2">Quantity:</p>
                                <button class="decrease-quantity px-3 bg-gray-300 text-gray-700 rounded" data-index="${index}">-</button>
                                <span class="mx-4 font-medium">${item.quantity}</span>
                                <button class="increase-quantity px-3 bg-gray-300 text-gray-700 rounded" data-index="${index}">+</button>
                            </div>
                        </div>
                        <div class="flex flex-col items-end justify-between py-2 w-[30%]">
                            <button class="remove-item text-red-600 hover:text-red-800 rounded" data-index="${index}">
                                ✖
                            </button>
                            <h2 class="font-semibold text-2xl mt-3">£${(item.price * item.quantity).toFixed(2)}</h2>
                        </div>
                    </div>
                    <div class="space-y-2 mt-4">
                        ${selectedAddons}
                    </div>
                </div>
            `;
            }

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

            $container.on("click", ".increase-addon-quantity, .decrease-addon-quantity", function() {
                const productIndex = $(this).data("index");
                const addonId = $(this).data("addon-id");
                const isIncrease = $(this).hasClass("increase-addon-quantity");

                let product = cart[productIndex];
                let addon = product.selectedAddons.find(a => a.addonId == addonId);

                if (isIncrease) {
                    addon.addonQuantity += 1;
                } else if (addon.addonQuantity > 1) {
                    addon.addonQuantity -= 1;
                }

                localStorage.setItem("cart", JSON.stringify(cart));
                renderCart();
            });

            $container.on("click", ".remove-item", function() {
                const index = $(this).data("index");
                cart.splice(index, 1);
                localStorage.setItem("cart", JSON.stringify(cart));
                renderCart();
            });

            $container.on("click", ".remove-addon", function() {
                const productIndex = $(this).data("index");
                const addonId = $(this).data("addon-id");

                cart[productIndex].selectedAddons = cart[productIndex].selectedAddons.filter(a => a
                    .addonId != addonId);

                localStorage.setItem("cart", JSON.stringify(cart));
                renderCart();
            });

            $diningOptions.on("change", function() {
                const selectedOption = $(this).siblings("span").text().trim();
                localStorage.setItem("diningOption", selectedOption);
                activeDinningBtn(selectedOption);
            });

            const savedDiningOption = localStorage.getItem("diningOption");
            if (savedDiningOption) {
                $diningOptions.each(function() {
                    const optionText = $(this).siblings("span").text().trim();
                    if (optionText === savedDiningOption) {
                        $(this).prop("checked", true);
                    }
                });
            }

            renderCart();
        });
    </script>
@endsection
