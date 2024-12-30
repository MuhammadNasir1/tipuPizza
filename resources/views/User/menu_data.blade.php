<div id="sizeModal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[200] justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="fixed inset-0 transition-opacity">
        <div id="backdrop" class="absolute inset-0 opacity-75 bg-slate-800"></div>
    </div>
    <div class="flex items-center justify-center min-h-screen relative"> ">
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md">
            <h2 class="text-lg font-semibold" id="modalItemName"></h2>
            <p class="text-sm text-gray-500 mb-4" id="modalDescription"></p>
            <div class="flex gap-4">
                <button id="selectSmall" class="btn bg-gray-300 text-black px-4 py-2 rounded">Small - £<span
                        id="modalSmallPrice"></span></button>
                <button id="selectLarge" class="btn bg-gray-300 text-black px-4 py-2 rounded">Large - £<span
                        id="modalLargePrice"></span></button>
            </div>
            <button id="closeModal" class="mt-4 btn bg-red-500 text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>
</div>


<script>
    function addCartfun() {

        // =================== cart
        // Load cart from localStorage or initialize
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Update the cart item count badge
        const updateCartCount = () => {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            $('#cartItemCount').text(totalItems);
        };

        // Initialize cart count on page load
        updateCartCount();

        // Add or update item in the cart
        const addToCart = (item) => {
            const existingItemIndex = cart.findIndex(cartItem => cartItem.id === item.id && cartItem
                .size === item.size);
            if (existingItemIndex > -1) {
                // Increment quantity if item already exists
                cart[existingItemIndex].quantity += 1;
            } else {
                // Add new item to the cart
                cart.push({
                    ...item,
                    quantity: 1
                });
            }
            localStorage.setItem('cart', JSON.stringify(cart)); // Save to localStorage
            updateCartCount(); // Update the badge count

            // SweetAlert2 confirmation
            Swal.fire({
                title: 'Added to Cart',
                text: `${item.name} (${item.size}) has been added to your cart!`,
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            });
        };

        // Handle card click
        $('.open-modal').on('click', function() {
            const itemId = $(this).data('item-id');
            const itemName = $(this).data('item-name');
            const priceSmall = $(this).data('price-small');
            const priceLarge = $(this).data('price-large');

            if (priceSmall && priceLarge) {
                // Show modal if both prices are available
                $('#modalItemName').text(itemName);
                $('#modalSmallPrice').text(priceSmall);
                $('#modalLargePrice').text(priceLarge);

                $('#selectSmall').data('cart-item', {
                    id: itemId,
                    name: itemName,
                    size: 'Small',
                    price: priceSmall
                });
                $('#selectLarge').data('cart-item', {
                    id: itemId,
                    name: itemName,
                    size: 'Large',
                    price: priceLarge
                });

                $('#sizeModal').removeClass('hidden').addClass('flex');
            } else {
                // Directly add to cart if only one price is available
                const cartItem = {
                    id: itemId,
                    name: itemName,
                    size: priceSmall ? 'Small' : 'Large',
                    price: priceSmall || priceLarge
                };
                addToCart(cartItem);
                console.log('Cart:', cart); // Debugging purposes
            }
        });

        // Close modal
        $('#closeModal').on('click', function() {
            $('#sizeModal').removeClass('flex').addClass('hidden');
        });

        // Add item to cart from modal
        $('#selectSmall, #selectLarge').on('click', function() {
            const cartItem = $(this).data('cart-item');
            addToCart(cartItem);

            $('#sizeModal').removeClass('flex').addClass('hidden');
            console.log('Cart:', cart); // Debugging purposes
        });







        // =================== cart end
    }

    $(document).ready(function() {
        addCartfun()
        // Show the loader before fetching data
        $('#MenuLoader').show();

        // Fetch data from the server
        $.ajax({
            url: '../getMenu', // Replace with your route to fetch categories
            method: 'GET',
            success: function(response) {
                // Assuming the response is an array of categories
                const categories = response.categories; // Adjust based on your API response format

                // Construct HTML content dynamically
                let contentHTML = '';
                let categoryHtml1 = '';





                categories.forEach(function(category) {
                    categoryHtml1 += `
                    <div >

                    <a href="#${category.category_name}" onclick="handleCategoryClick('${category.id}')"
                        class="max-w-full whitespace-nowrap bg-primary text-white flex flex-col justify-center flex-shrink-0 items-center rounded-md custom-shadow py-4 px-8 text-center font-semibold hover:bg-red-600 transition">
                        <img  loading="lazy" class="w-24     h-24 object-cover mb-2 rounded-full border-primary bg-white"
                            src=" ${category.category_img ?? 'assets/images/default.jpg'}"
                            alt="menu" />
                     ${category.category_name}
                    </a>
                       </div>

            </div>`
                    contentHTML += `
                    <section id="${category.id}" class="w-full">
                        <div class="relative flex justify-center items-center flex-col">
                            <h2 class="text-white font-semibold bg-primary px-8 py-2 rounded-md text-xl">
                                ${category.category_name}
                            </h2>
                        </div>
                        <div>
                            <p class="my-2 text-center">${category.category_description}</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 mt-8 w-full">
                            ${category.items.map(item => `
                                <div class="custom-shadow open-modal cursor-pointer px-4 py-6 rounded-xl w-full"
                                     data-item-id="${item.menu_id}"
                                     data-item-name="${item.menu_name}"
                                     data-price-small="${item.prices.small || ''}"
                                     data-price-large="${item.prices.large || ''}">
                                    <div class="flex flex-col">
                                        <div class="flex flex-col md:flex-row gap-5 items-center">
                                            <img loading="lazy" class="w-20 h-20 object-cover rounded-full border-primary"
                                                 src="${item.menu_img || 'assets/images/default.jpg'}" alt="menu" />
                                            <div class="w-full">
                                                <div class="flex lg:flex-row flex-col lg:gap-4 lg:justify-between w-full">
                                                    <h3 class="text-lg font-semibold">${item.menu_name}</h3>
                                                    <div class="flex gap-4 justify-end">
                                                        ${item.prices.small ? `<h2 class="font-semibold text-lg text-black relative flex justify-center">
                                           ild                 £ ${item.prices.small} <span class="absolute font-semibold -top-5">S</span>
                                                        </h2>` : ''}
                                                        ${item.prices.large ? `<h2 class="font-semibold text-lg text-primary relative flex justify-center">
                                                            £ ${item.prices.large} <span class="text-primary absolute font-semibold -top-5">L</span>
                                                        </h2>` : ''}
                                                    </div>
                                                </div>
                                                <p class="mt-3 text-gray-500 text-sm text-center md:text-start">
                                                    ${item.description}
                                                </p>
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
    });
</script>
