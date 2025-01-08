<div id="sizeModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[200] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 opacity-75 bg-slate-800"></div>
    </div>
    <div class="flex items-center justify-center min-h-screen relative">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
            <h2 class="text-lg font-semibold" id="modalItemName"></h2>
            <p class="text-sm text-gray-500 mb-4" id="modalDescription"></p>
            <div class="flex gap-4">
                <button id="selectSmall" class="btn bg-gray-300 text-black px-4 py-2 rounded">
                    <span id="labelS"></span> - £<span id="modalSmallPrice"></span>
                </button>
                <button id="selectLarge" class="btn bg-gray-300 text-black px-4 py-2 rounded">
                    <span id="labelL"></span> - £<span id="modalLargePrice"></span>
                </button>
            </div>

            <!-- Addons section -->
            <div id="addonsSection" class="mt-4">
                <h3 class="text-md font-semibold">Choose Addons</h3>
                <div id="addonList" class="mt-2"></div>
            </div>

            <button id="closeModal" class="mt-4 btn bg-red-500 text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>
</div>

<script>
    function addCartfun() {
        // =================== cart
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        const updateCartCount = () => {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            $('#cartItemCount').text(totalItems);
        };

        updateCartCount();

        const addToCart = (item) => {
            const existingItemIndex = cart.findIndex(cartItem => cartItem.id === item.id && cartItem.size === item
                .size);
            if (existingItemIndex > -1) {
                cart[existingItemIndex].quantity += 1;
            } else {
                cart.push({
                    ...item,
                    quantity: 1
                });
            }
            localStorage.setItem('cart', JSON.stringify(cart));
            updateCartCount();

            Swal.fire({
                title: 'Added to Cart',
                text: `${item.name} (${item.size}) has been added to your cart!`,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            });
        };

        $('.open-modal').on('click', function() {
            const itemId = $(this).data('item-id');
            const itemName = $(this).data('item-name');
            const priceSmall = $(this).data('price-small');
            const priceLarge = $(this).data('price-large');
            const labelSmall = $(this).data('item-label-s');
            const labelLarge = $(this).data('item-label-l');
            const addonsId = $(this).data('menu_addons');

            // Fetch addons for the current item
            $.ajax({
                url: '/getIemAddons', // Adjust this URL to match your endpoint
                method: 'GET',
                data: {
                    addonsId: addonsId
                },
                success: function(addons) {
                    // Clear existing addon checkboxes
                    $('#addonList').empty();
                    console.log(addons);

                    // Add checkboxes for each addon
                    addons.forEach(function(addon) {
                        const addonHtml = `
                        <div class="flex items-center justify-between gap-4">
                           <div>
                             <input type="checkbox" id="addon-${addon.addon_id}" data-addon-id="${addon.addon_id}" data-addon-name="${addon.addon_name}" class="addon-checkbox w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary  focus:ring-2 ">
                            <label for="addon-${addon.addon_id}" class="ml-2">${addon.addon_name}</label>
                            </div>
                            <div>
                                   <p class="ml-2 text-primary font-semibold">${addon.addon_price}£ </;>
                                </div>
                        </div>
                    `;
                        $('#addonList').append(addonHtml);
                    });

                    // Show modal
                    $('#modalItemName').text(itemName);
                    $('#modalSmallPrice').text(priceSmall);
                    $('#modalLargePrice').text(priceLarge);
                    $('#labelS').text(labelSmall);
                    $('#labelL').text(labelLarge);

                    $('#selectSmall').data('cart-item', {
                        id: itemId,
                        name: itemName,
                        size: labelSmall,
                        price: priceSmall,
                        addons: [] // Initially no addons selected
                    });

                    $('#selectLarge').data('cart-item', {
                        id: itemId,
                        name: itemName,
                        size: labelLarge,
                        price: priceLarge,
                        addons: [] // Initially no addons selected
                    });

                    $('#sizeModal').removeClass('hidden').addClass('flex');
                }
            });
        });

        // Close modal
        $('#closeModal').on('click', function() {
            $('#sizeModal').removeClass('flex').addClass('hidden');
        });

        // Add item to cart from modal
        $('#selectSmall, #selectLarge').on('click', function() {
            const cartItem = $(this).data('cart-item');

            // Collect selected addons
            const selectedAddons = [];
            $('.addon-checkbox:checked').each(function() {
                selectedAddons.push({
                    id: $(this).data('addon-id'),
                    name: $(this).data('addon-name')
                });
            });

            // Add selected addons to the cart item
            cartItem.addons = selectedAddons;

            addToCart(cartItem);
            $('#sizeModal').removeClass('flex').addClass('hidden');
        });
    }


    // function addCartfun() {

    //     // =================== cart
    //     // Load cart from localStorage or initialize
    //     let cart = JSON.parse(localStorage.getItem('cart')) || [];

    //     // Update the cart item count badge
    //     const updateCartCount = () => {
    //         const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    //         $('#cartItemCount').text(totalItems);
    //     };

    //     // Initialize cart count on page load
    //     updateCartCount();

    //     // Add or update item in the cart
    //     const addToCart = (item) => {
    //         const existingItemIndex = cart.findIndex(cartItem => cartItem.id === item.id && cartItem
    //             .size === item.size);
    //         if (existingItemIndex > -1) {
    //             // Increment quantity if item already exists
    //             cart[existingItemIndex].quantity += 1;
    //         } else {
    //             // Add new item to the cart
    //             cart.push({
    //                 ...item,
    //                 quantity: 1
    //             });
    //         }
    //         localStorage.setItem('cart', JSON.stringify(cart)); // Save to localStorage
    //         updateCartCount(); // Update the badge count

    //         // SweetAlert2 confirmation
    //         Swal.fire({
    //             title: 'Added to Cart',
    //             text: `${item.name} (${item.size}) has been added to your cart!`,
    //             icon: 'success',
    //             showConfirmButton: false,
    //             timer: 1500
    //         });
    //     };

    //     // Handle card click
    //     $('.open-modal').on('click', function() {
    //         const itemId = $(this).data('item-id');
    //         const itemName = $(this).data('item-name');
    //         const priceSmall = $(this).data('price-small');
    //         const priceLarge = $(this).data('price-large');
    //         const labelSmall = $(this).data('item-label-s');
    //         const labelLarge = $(this).data('item-label-l');

    //         if (priceSmall && priceLarge) {
    //             // Show modal if both prices are available
    //             $('#modalItemName').text(itemName);
    //             $('#modalSmallPrice').text(priceSmall);
    //             $('#modalLargePrice').text(priceLarge);
    //             $('#labelS').text(labelSmall);
    //             $('#labelL').text(labelLarge);

    //             $('#selectSmall').data('cart-item', {
    //                 id: itemId,
    //                 name: itemName,
    //                 size: labelSmall,
    //                 price: priceSmall
    //             });
    //             $('#selectLarge').data('cart-item', {
    //                 id: itemId,
    //                 name: itemName,
    //                 size: labelLarge,
    //                 price: priceLarge
    //             });

    //             $('#sizeModal').removeClass('hidden').addClass('flex');
    //         } else {
    //             // Directly add to cart if only one price is available
    //             const cartItem = {
    //                 id: itemId,
    //                 name: itemName,
    //                 size: priceSmall ? labelSmall : labelLarge,
    //                 price: priceSmall || priceLarge
    //             };
    //             addToCart(cartItem);
    //             console.log('Cart:', cart); // Debugging purposes
    //         }
    //     });

    //     // Close modal
    //     $('#closeModal').on('click', function() {
    //         $('#sizeModal').removeClass('flex').addClass('hidden');
    //     });

    //     // Add item to cart from modal
    //     $('#selectSmall, #selectLarge').on('click', function() {
    //         const cartItem = $(this).data('cart-item');
    //         addToCart(cartItem);

    //         $('#sizeModal').removeClass('flex').addClass('hidden');
    //         console.log('Cart:', cart); // Debugging purposes
    //     });







    //     // =================== cart end
    // }'

    $(document).ready(function() {
        addCartfun()
        // Show the loader before fetching data
        $('#MenuLoader').show();

        // Fetch data from the server
        setTimeout(function() {
            $.ajax({
                url: '../getMenu', // Replace with your route to fetch categories
                method: 'GET',
                success: function(response) {
                    // Assuming the response is an array of categories
                    const categories = response
                        .categories; // Adjust based on your API response format

                    // Construct HTML content dynamically
                    let contentHTML = '';
                    let categoryHtml1 = '';





                    categories.forEach(function(category) {
                        categoryHtml1 += `
                    <div class="w-full" >

                    <a href="#${category.category_name}" onclick="handleCategoryClick('${category.id}')"
                        class="max-w-full whitespace-nowrap min-w-[220px] bg-primary text-white flex flex-col justify-center flex-shrink-0 items-center rounded-md custom-shadow py-4 px-8 text-center font-semibold hover:bg-red-600 transition">
                        <img  loading="lazy" class="w-24     h-24 object-cover mb-2 rounded-full border-primary bg-white"
                            src=" ${category.category_img ?? 'https://tipupizzakebab.uk/storage/category_images/MIrwwTHocrN5amajvlSXQdzI07sT7wYVxNZuiE0Y.png'}"
                            alt="menu" />
                     ${category.category_name}
                    </a>
                       </div>
                       `
                        contentHTML += `
                    <section id="${category.id}" class="w-full">
                        <div class="relative flex justify-center items-center flex-col">
                            <h2 class="text-white font-semibold bg-primary px-8 py-2 rounded-md text-xl">
                                ${category.category_name}
                            </h2>
                        </div>
                        <div>
                            <p class="my-2 text-center">${category.category_description ?? ''}</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 mt-8 w-full">
                            ${category.items.map(item => `
                                <div class="custom-shadow  px-4 py-6 rounded-xl w-full">
                                    <div class="flex flex-col">
                                        <div class="flex flex-col md:flex-row gap-5 items-center">
                                            <img loading="lazy" class="w-20 h-20 object-cover rounded-full border-primary"
                                                 src="${item.menu_img || 'assets/images/default.jpg'}" alt="menu" />
                                            <div class="w-full">
                                                <div class="flex lg:flex-row flex-col lg:gap-4 lg:justify-between md:items-center w-full">
                                                    <h3 class="text-lg font-semibold">${item.menu_name}</h3>
                                                    <div class="flex gap-4 justify-end">
                                                        ${item.prices.small ? `<h2 class="font-semibold text-lg text-black relative flex flex-col justify-start items-center ">
                                                             <span class=" font-semibold leading-none">${item.prices.smallLabel}</span> £ ${item.prices.small}
                                                        </h2>` : ''}
                                                        ${item.prices.large ? `<h2 class="font-semibold text-lg text-black relative flex flex-col justify-start items-center text-primary ">
                                                          <span class=" font-semibold leading-none text-primary">${item.prices.largeLabel}</span>  £ ${item.prices.large}
                                                        </h2>` : ''}
                                                    </div>
                                                </div>
                                                <p class="mt-3 text-gray-500 text-sm text-center md:text-start">
                                                    ${item.description ?? ''}
                                                </p>
                                               <div class="flex justify-end mt-4">

                                                 <button class="bg-primary open-modal w-full md:w-auto text-white px-4 py-3 rounded-md flex gap-4 justify-center items-center"        data-item-id="${item.menu_id}"
                                                    data-item-name="${item.menu_name}" data-menu_addons="${item.menu_addons}"
                                                    data-price-small="${item.prices.small || ''}"
                                                    data-price-large="${item.prices.large || ''}"  data-item-label-s="${item.prices.smallLabel}"  data-item-label-l="${item.prices.largeLabel}"><svg fill="white" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0L69.5 0c22 0 41.5 12.8 50.6 32l411 0c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3l-288.5 0 5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5L488 336c13.3 0 24 10.7 24 24s-10.7 24-24 24l-288.3 0c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5L24 48C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg> Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    </section>
                `;
                    });

                    // Inject the content into the page
                    $('#scroll-container').html(categoryHtml1);
                    $('#contentContainer').html(contentHTML);
                    // Hide the loader and show the content
                    $('#MenuLoader').hide();
                    $('#contentContainer').removeClass('hidden');
                    $('#menuCategory').removeClass('hidden');
                    addCartfun()

                },
                error: function() {
                    // Handle error (e.g., show a message or retry option)
                    $('#MenuLoader').hide();
                    alert('Failed to load data');
                }
            });
        }, 500);
    });
</script>
