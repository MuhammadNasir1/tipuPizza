@extends('User.layout')


@section('title')
    Cart
@endsection

@section('content')
    <div class="min-h-full bg-gray-100 pb-10 pt-10">
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
                            <th class="p-2">Add-ons</th>
                            <th class="p-2">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody id="cartItems">
                        <!-- Cart items will be dynamically rendered here -->
                    </tbody>
                </table>
            </div>
            <div class="mt-6 bg-white shadow-md rounded-lg p-4">
                <div class="flex flex-col justify-center space-y-3">
                    <div class="text-lg font-semibold text-gray-700">
                        Total: <span id="cartTotal" class="text-primary ml-2">£0.00</span>
                    </div>
                    <div class="text-lg font-semibold text-gray-700">
                        Delivery Charges: <span id="deliveryCharges" class="text-primary ml-2">£0.00</span>
                    </div>
                    <div class="text-lg font-semibold text-gray-700">
                        Grand Total: <span id="cartGrandTotal" class="text-primary ml-2">£0.00</span>
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

                    <button id="get-location" type="button"
                        class="bg-primary text-white px-6 py-3 rounded-full mt-4 font-semibold flex gap-2 items-center">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M256 0c17.7 0 32 14.3 32 32l0 34.7C368.4 80.1 431.9 143.6 445.3 224l34.7 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-34.7 0C431.9 368.4 368.4 431.9 288 445.3l0 34.7c0 17.7-14.3 32-32 32s-32-14.3-32-32l0-34.7C143.6 431.9 80.1 368.4 66.7 288L32 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l34.7 0C80.1 143.6 143.6 80.1 224 66.7L224 32c0-17.7 14.3-32 32-32zM128 256a128 128 0 1 0 256 0 128 128 0 1 0 -256 0zm128-80a80 80 0 1 1 0 160 80 80 0 1 1 0-160z" />
                        </svg>
                        Get Current Location</button>
                    <div id="map" class="my-4 rounded-md" style="height: 400px;"></div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <label for="address" required
                                class="block text-sm text-gray-600 mb-2 focus:outline-none outline-none focus:border-primary">Address</label>
                            <textarea id="address" readonly name="address" required
                                class="w-full border h-[110px] rounded-lg px-4 py-2 text-gray-800"
                                placeholder="Select location from map or use current location button"></textarea>
                        </div>
                        <div>
                            <label for="note"
                                class="block text-sm text-gray-600 mb-2 focus:outline-none outline-none focus:border-primary">Note
                                (optional)</label>
                            <textarea id="note" name="note" class="w-full border h-[110px] rounded-lg px-4 py-2 text-gray-800"></textarea>
                        </div>

                        <p id="distance"></p>
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const customLat = 52.922731162100966; // Your custom latitude
        const customLon = -1.481676048182458; // Your custom longitude (example: New York)
        let now = new Date();
        let localDatetime = now.getFullYear() + '-' +
            String(now.getMonth() + 1).padStart(2, '0') + '-' +
            String(now.getDate()).padStart(2, '0') + 'T' +
            String(now.getHours()).padStart(2, '0') + ':' +
            String(now.getMinutes()).padStart(2, '0');
        document.getElementById('datetime').value = localDatetime;
        $(document).ready(function() {
            //  location
            const locationIqApiKey = "pk.6f9fa812ffad92a314b9d8105a241486"; // Replace with your LocationIQ API key
            const customLat = 52.922731162100966; // Your custom latitude
            const customLon = -1.481676048182458; // Your custom longitude

            $('#get-location').click(getCurrentLocation);

            let currentMarker = null;
            let map = null;

            $(document).ready(function() {
                // Render the map with a custom location on page load
                showMap(customLat, customLon);
            });

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
                                $('#address').val(address);

                                // Show map preview
                                showMap(latitude, longitude);

                                // Calculate distance from user's location to custom location
                                const distance = calculateDistance(latitude, longitude, customLat,
                                    customLon);
                                // $('#distance').text(
                                //     `Distance to custom location: ${distance.toFixed(2)} miles`);

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

                if ($('input[name="dining_option"]:checked').val() === "delivery") {
                    if (distance >= 0 && distance <= 3) {
                        deliveryCharge = 2.5; // Charge for 1-3 miles
                    } else if (distance > 3 && distance <= 5) {
                        deliveryCharge = 4.0; // Charge for 3-5 miles
                    } else {
                        deliveryCharge = 6.0;

                    }
                } else {
                    deliveryCharge = 0;


                }
                let grandTotalWDelivery = parseFloat($('#totalAmount').val()) + parseFloat(deliveryCharge);

                $('#cartGrandTotal').text("£" + grandTotalWDelivery);
                // Display the delivery charge
                $('#deliveryCharges').text(`£${deliveryCharge.toFixed(2)}`);
            }

            // Function to display the map
            function showMap(lat, lon) {
                if (!map) {
                    map = L.map('map').setView([lat, lon], 13);

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
                currentMarker.bindPopup('Delivery Location').openPopup();

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

            // Function to fetch and update location details (address & distance)
            function updateLocationDetails(lat, lon) {
                const url =
                    `https://us1.locationiq.com/v1/reverse.php?key=${locationIqApiKey}&lat=${lat}&lon=${lon}&format=json`;

                $.getJSON(url, (data) => {
                    const address = data.display_name;

                    // Update textarea with the new address
                    $('#address').val(address);

                    // Calculate distance from new location to custom location
                    const distance = calculateDistance(lat, lon, customLat, customLon);
                    $('#distance').text(`Distance to custom location: ${distance.toFixed(2)} miles`);

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


            const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
            const $cartItemsContainer = $('#cartItems');
            const $cartTotalElement = $('#cartTotal');

            // Render Cart items dynamically
            const renderCart = () => {
                $cartItemsContainer.empty();
                let total = 0;

                cartItems.forEach((item, index) => {
                    // Check if the item has add-ons, and calculate their total
                    const addOnTotal = Array.isArray(item.addons) && item.addons.length > 0 ?
                        item.addons.reduce((sum, addOn) => sum + addOn.addonPrice, 0) :
                        0;

                    // Calculate the total for the item, including add-ons
                    const itemTotal = (item.price + addOnTotal) * item.quantity;
                    total += itemTotal;

                    // Generate HTML for add-ons only if they exist
                    const addOnsHTML = Array.isArray(item.addons) && item.addons.length > 0 ?
                        item.addons.map((addOn, addOnIndex) => `
                <div class="flex justify-between flex-nowrap gap-4 items-center bg-gray-100 p-2 rounded mt-1">
                    <span>${addOn.addonName} <span class="text-primary">(£${addOn.addonPrice.toFixed(2)})</span></span>
                    <button class="remove-addon text-red-500 text-sm"  data-index="${index}" data-addon-index="${addOnIndex}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="white" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            `).join('') :
                        '';

                    $cartItemsContainer.append(`
                <tr class="border-b">
                    <td class="p-4 whitespace-nowrap">${item.name}</td>
                    <td class="p-4 whitespace-nowrap">${item.size}</td>
                    <td class="p-4">
                        <div class="flex items-center">
                            <button class="decrease-quantity px-3 bg-gray-300 text-gray-700 rounded" data-index="${index}">-</button>
                            <span class="mx-3">${item.quantity}</span>
                            <button class="increase-quantity px-3 bg-gray-300 text-gray-700 rounded" data-index="${index}">+</button>
                        </div>
                    </td>
                    <td class="p-4 ">£${item.price.toFixed(2)}</td>
                    <td class="p-4">
                       <div class="flex gap-y-2 gap-x-4 flex-wrap">${addOnsHTML}</div>
                    </td>
                    <td class="p-4 text-primary font-semibold">£${itemTotal.toFixed(2)}</td>
                    <td class="p-4">
                        <button class="remove-item  text-primary px-4 py-2 rounded" data-index="${index}">
                         <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="white" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                      </svg>
                        </button>
                    </td>
                </tr>
            `);
                });
                let grandTotal = total;
                // let deliveryCharge = 0;
                $('input[name="dining_option"]').change(function() {
                    // Check if the delivery option checkbox is checked
                    if ($('input[name="dining_option"]:checked').val() !== "delivery") {
                        deliveryCharge = 0;
                    }
                    // Calculate grand total
                    grandTotal = total + deliveryCharge;

                    // Update the delivery charges and grand total on the page
                    $('#deliveryCharges').text(`£${deliveryCharge.toFixed(2)}`);
                    $('#cartGrandTotal').text(`£${grandTotal.toFixed(2)}`);
                });

                $('#totalAmount').val(total.toFixed(2));
                $('#cartGrandTotal').text(`£${grandTotal.toFixed(2)}`);
                $('#cartTotal').text(`£${total.toFixed(2)}`);
            };


            // Handle Add-on Removal
            $cartItemsContainer.on('click', '.remove-addon', function() {
                const index = $(this).data('index'); // Get the item index
                const addOnIndex = $(this).data('addon-index'); // Get the add-on index

                // Check if the item and its add-ons array exist
                if (Array.isArray(cartItems[index].addons) && cartItems[index].addons.length > addOnIndex) {
                    cartItems[index].addons.splice(addOnIndex, 1); // Remove the selected add-on
                    localStorage.setItem('cart', JSON.stringify(cartItems)); // Update localStorage
                    renderCart(); // Re-render the cart
                } else {
                    console.error("Add-on or item not found!");
                }
            });


            // Handle quantity changes and item removal (existing logic)
            $cartItemsContainer.on('click', '.increase-quantity', function() {
                const index = $(this).data('index');
                cartItems[index].quantity += 1;
                localStorage.setItem('cart', JSON.stringify(cartItems));
                renderCart();
            });

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
