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
                        <p class="font-semibold text-lg" id="deliveryCharges">0£</p>
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
                        <label class="flex w-full border-2 items-center gap-3 cursor-pointer p-2  rounded-lg bg-white "
                            data-option="Collection" id='Collection'>
                            <input type="radio" name="diningOption" class="hidden" />
                            <img src="{{ asset('assets/collection-icon.png') }}" alt="collection" class="w-10 h-10">

                            <span class="font-medium">Collection</span>
                        </label>
                    </div>
                    <div>
                        <div class="mt-4 hidden" id="collection-container">
                            <h2 class="font-semibold text-black text-lg">Collection Point</h2>
                            <div class="border border-gray-300 rounded-lg py-2 px-2 mt-2 min-h-20 flex items-center">
                                <div class="flex gap-2 flex-shrink-0 items-center h-full">
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
                            <div
                                class="border border-gray-300 rounded-lg py-2 px-2 mt-2 min-h-20 h-full flex items-center justify-between">
                                <div class="flex gap-2 flex-shrink-0 items-center justify-between w-full">
                                    <div>
                                        <h2 class="text-black text-xs sm:text-[15px]"> <span
                                                class="font-semibold">Address</span> <span
                                                class="text-[#6F767E] font-normal">( <span
                                                    id="distance">0.0M</span>)</span></h2>
                                        <p class="sm:text-xs text-[10px] text-[#6F767E]" id="address">Location required
                                        </p>
                                    </div>
                                    <div class="flex flex-col items-center gap-1 cursor-pointer" id="get-location">
                                        <p> <i class="fa-solid fa-location-dot mr-2 text-2xl text-primary"></i></p>
                                        <p class="text-[10px] text-[#6F767E] whitespace-nowrap">Get Current</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="map" class="my-4 rounded-md z-20" style="height: 300px;"></div>
                        <div class="mt-2">
                            <x-input class="" id="datetime" label="Date-Time" placeholder="Enter Here"
                                name="date_time" type="datetime-local"></x-input>
                        </div>
                    </div>


                </div>


                <button class="w-full bg-primary text-white py-3 rounded-lg text-lg font-semibold hover:bg-primary-dark"
                    data-modal-target="order-Modal" data-modal-toggle="order-Modal">
                    Proceed to Checkout
                </button>
            </div>
        </div>
    </div>

    <x-modal id="order-Modal">
        <x-slot name="title">CheckOut </x-slot>
        <x-slot name="modal_width">max-w-xl</x-slot>
        <x-slot name="body">
            <form id="orderForm">
                @csrf
                <div class=" ">
                    <div class="w-full bg-white border border-gray-300 rounded-lg p-6">
                        <div class="flex justify-between gap-2 items-center">
                            <h2 class="text-lg font-semibold text-gray-800">Bill</h2>
                            <p class="text-lg font-bold text-primary text-right " id="modalTotal">£00.00</p>
                        </div>
                        <hr class="my-4">

                        <h3 class="text-md font-semibold text-gray-700 mb-2">Payment Method</h3>

                        <div class="space-y-3">
                            <!-- Cash On Delivery Option -->
                            <div
                                class="flex items-center space-x-3 p-4 border rounded-lg bg-red-100 border-red-400 cursor-pointer">
                                <i class="fas fa-money-bill-wave text-red-600 text-2xl"></i>
                                <span class="text-gray-800 font-medium">Cash On Delivery</span>
                            </div>

                            <!-- Online Payment Option -->
                            {{-- <div class="flex items-center space-x-3 p-4 border rounded-lg bg-gray-100 cursor-pointer">
                            <i class="fas fa-credit-card text-gray-600 text-2xl"></i>
                            <span class="text-gray-800 font-medium">Online Pay by Credit/Debit Card</span>
                        </div> --}}
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="mt-4">
                            <x-input class="" id="fullName" label="Full Name" placeholder="Enter Here"
                                name="name" type="text"></x-input>
                        </div>
                        <div class="mt-4">
                            <x-input class="" id="phoneNo0" label="Phone" placeholder="Enter Here"
                                name="phone" type="text"></x-input>
                        </div>
                        <div class="mt-4">
                            <x-textarea class="" id="categoryDescription" label="Additional Note"
                                placeholder="Enter Here" name="category_description"></x-textarea>
                        </div>
                    </div>
                </div>
                <div class=" mt-8">

                    <button class="w-full px-3 py-2 font-semibold text-white rounded-lg shadow-md gradient-bg"
                        id="submitBtn">
                        <div id="btnSpinner" class="hidden">
                            <svg aria-hidden="true"
                                class="w-6 h-6 mx-auto text-center text-gray-200 animate-spin fill-customOrangeLight"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                        </div>
                        <div id="btnText">
                            Confirm Order
                        </div>
                    </button>

                </div>
            </form>
        </x-slot>
    </x-modal>
    <input type="hidden" id="subTotalInput">
@endsection
@section('js')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        $(document).ready(function() {

            const locationIqApiKey = "pk.6f9fa812ffad92a314b9d8105a241486";
            const customLat = 52.922731162100966;
            const customLon = -1.481676048182458;
            let = deliveryOption = null;
            $('#get-location').click(getCurrentLocation);
            let popupMarketText = "Tipu Pizza Kebab";

            // set current market null and map null
            let currentMarker = null;
            let map = null;


            // show map when my page load
            showMap(customLat, customLon);

            const $container = $("#product-cards-container");
            const $orderSubTotal = $("#sub-total");
            const $orderSummaryTotal = $("#order-total");
            const $diningOptions = $("input[name='diningOption']");

            const savedOption = localStorage.getItem("diningOption");

            function activeDinningBtn(selectedOption) {
                if (selectedOption == "Delivery") {
                    $("#Delivery").addClass("bg-red-300 border-primary");
                    $("#Collection").removeClass("bg-red-300 border-primary");
                    $('#collection-container').addClass('hidden');
                    $('#delivery-container').removeClass('hidden');
                    popupMarketText = "Your Current Location"
                    deliveryOption = "Delivery";
                    getCurrentLocation()
                    setDeliveryCharges()
                } else if (selectedOption == "Collection") {
                    $("#Collection").addClass("bg-red-300 border-primary").removeClass('hidden');
                    $('#collection-container').removeClass('hidden');
                    $("#Delivery").removeClass("bg-red-300 border-primary");
                    $('#delivery-container').addClass('hidden');
                    popupMarketText = "Tipu Pizza Kebab"
                    showMap(customLat, customLon);
                    deliveryOption = "Collection";
                    setDeliveryCharges()

                }
            }
            activeDinningBtn(savedOption);



            function setMinDateTime() {
                let now = new Date();
                let localDatetime = now.getFullYear() + '-' +
                    String(now.getMonth() + 1).padStart(2, '0') + '-' +
                    String(now.getDate()).padStart(2, '0') + 'T' +
                    String(now.getHours()).padStart(2, '0') + ':' +
                    String(now.getMinutes()).padStart(2, '0');

                // Set the input value to current date and time
                $('#datetime').val(localDatetime);

                // Prevent past date/time selection
                $('#datetime').attr('min', localDatetime);
            }

            setMinDateTime();

            // ===== map
            // get current location of user
            function getCurrentLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position) => {
                            const {
                                latitude,
                                longitude
                            } = position.coords;

                            // Fetch address from LocationIQ API
                            const url =
                                `https://us1.locationiq.com/v1/reverse.php?key=${locationIqApiKey}&lat=${latitude}&lon=${longitude}&format=json`;

                            $.getJSON(url, (data) => {
                                const address = data.display_name;

                                // Display address in textarea
                                $('#address').text(address);

                                // Show map preview
                                showMap(latitude, longitude);

                                // Calculate distance from user's location to custom location
                                const distance = calculateDistance(latitude, longitude, customLat,
                                    customLon);

                                $('#distance').text(
                                    `${distance.toFixed(2)} m`);

                                // Set delivery charges based on the distance
                                setDeliveryCharges(distance);

                            }).fail((jqXHR, textStatus, errorThrown) => {
                                console.error('Error fetching location data:', textStatus, errorThrown);
                            });
                        },
                        (error) => {
                            console.error('Error getting location:', error);
                            alert(
                                'Unable to retrieve your location. Please enable location services and try again.'
                            );
                        }
                    );
                } else {
                    alert('Geolocation is not supported by this browser.');
                }
            }


            // Function to set delivery charges based on distance
            function setDeliveryCharges(distance) {
                let deliveryCharge = 0;

                if (deliveryOption === "Delivery") {
                    if (distance >= 0 && distance <= 3) {
                        deliveryCharge = 3; // Charge for 1-3 miles
                    } else if (distance > 3 && distance <= 5) {
                        deliveryCharge = 5.0; // Charge for 3-5 miles
                    } else {
                        deliveryCharge = 5.0;

                    }
                } else {
                    deliveryCharge = 0;


                }

                let grandTotalWDelivery = parseFloat($('#subTotalInput').val()) + parseFloat(deliveryCharge);

                $('#order-total').text("£" + grandTotalWDelivery.toFixed(2));
                $('#modalTotal').text("£" + grandTotalWDelivery.toFixed(2));
                // Display the delivery charge
                $('#deliveryCharges').text(`£${deliveryCharge.toFixed(2)}`);
            }


            // Function to display the map
            function showMap(lat, lon) {
                if (!map) {
                    map = L.map('map').setView([lat, lon], 16);

                    // Add OpenStreetMap tiles
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap contributors'
                    }).addTo(map);
                } else {
                    map.setView([lat, lon], 13); // If map already exists, just move to the new position
                }

                // Add draggable marker for user's location
                if (currentMarker) {
                    map.removeLayer(currentMarker); // Remove the previous marker
                }

                currentMarker = L.marker([lat, lon], {
                    draggable: true
                }).addTo(map);
                currentMarker.on('dragend', onMarkerDragged); // Update location when the marker is dragged

                // Add popup to the marker
                currentMarker.bindPopup(popupMarketText).openPopup();

                // Allow user to click on the map to update the location
                map.on('click', function(e) {
                    const clickedLat = e.latlng.lat;
                    const clickedLon = e.latlng.lng;

                    // Move the marker to the clicked position
                    currentMarker.setLatLng([clickedLat, clickedLon]);

                    // Fetch address for clicked location
                    updateLocationDetails(clickedLat, clickedLon);
                });
            }
            // Function to handle marker drag event
            function onMarkerDragged(event) {
                const lat = event.target.getLatLng().lat;
                const lon = event.target.getLatLng().lng;

                // Fetch address from LocationIQ API for the new location
                updateLocationDetails(lat, lon);
            }

            function updateLocationDetails(lat, lon) {
                const url =
                    `https://us1.locationiq.com/v1/reverse.php?key=${locationIqApiKey}&lat=${lat}&lon=${lon}&format=json`;

                $.getJSON(url, (data) => {
                    const address = data.display_name;

                    // Update textarea with the new address
                    $('#address').text(address);

                    // Calculate distance from new location to custom location
                    const distance = calculateDistance(lat, lon, customLat, customLon);
                    $('#distance').text(`${distance.toFixed(2)} m`);

                    // Set delivery charges based on the new distance
                    setDeliveryCharges(distance);
                }).fail((jqXHR, textStatus, errorThrown) => {
                    console.error('Error fetching location data:', textStatus, errorThrown);
                });
            }

            // Function to calculate distance in miles using the Haversine formula
            function calculateDistance(lat1, lon1, lat2, lon2) {
                const R = 3961; // Radius of Earth in miles
                const φ1 = lat1 * Math.PI / 180;
                const φ2 = lat2 * Math.PI / 180;
                const Δφ = (lat2 - lat1) * Math.PI / 180;
                const Δλ = (lon2 - lon1) * Math.PI / 180;

                const a = Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
                    Math.cos(φ1) * Math.cos(φ2) *
                    Math.sin(Δλ / 2) * Math.sin(Δλ / 2);
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

                return R * c; // Distance in miles
            }


            // ===== map

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
                $('#subTotalInput').val(formattedPrice);
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
                    <div class="flex justify-between items-center border-b pb-2 ml-5">
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


            // add order 
            $('#orderForm').on('submit', function(event) {

                Swal.fire({
                    icon: 'success',
                    title: 'Order Placed!',
                    text: 'Your order has been placed successfully!',
                    confirmButtonColor: '#EC1223',
                    customClass: {
                        icon: 'text-primary',
                    },
                }).then(function() {
                    localStorage.removeItem('cart');
                    renderCart();
                    window.location.href =
                        '../'; // Redirect to the home page
                });
            });
        });
    </script>
@endsection
