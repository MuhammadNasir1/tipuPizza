<div class="w-full bg-white sticky top-20 z-50">
    <div class="max-w-6xl mx-auto p-6">

        <div class="relative">
            <button id="scroll-left"
                class="absolute -left-6 top-1/2 transform -translate-y-1/2 z-10 bg-black flex justify-center items-center text-white p-2 h-8 w-8 rounded-full shadow-md hover:bg-gray-700 text-2xl">
                &#8249;
            </button>
            <div id="scroll-container" class="flex space-x-4 overflow-x-scroll scrollbar-hide">
                @foreach ($categories as $category)
                    <a href="#{{ $category['category_name'] }}" onclick="handleCategoryClick('{{ $category['id'] }}')"
                        class="max-w-full whitespace-nowrap bg-primary text-white flex flex-col justify-center flex-shrink-0 items-center rounded-md custom-shadow py-4 px-8 text-center font-semibold hover:bg-red-600 transition">
                        <img class="w-24     h-24 object-cover mb-2 rounded-full border-primary bg-white"
                            src="{{ $category->category_img ?? asset('assets/images/pizza.jpg') }}" alt="menu" />
                            {{-- src="{{ $category->category_name ?? asset('assets/images/default.jpg') }}" alt="menu" /> --}}
                        {{ $category['category_name'] }}
                    </a>
                @endforeach
            </div>
            <button id="scroll-right"
                class="absolute -right-6 top-1/2 transform -translate-y-1/2 z-10 bg-black flex justify-center items-center text-white p-2 h-8 w-8 rounded-full shadow-md hover:bg-gray-700 text-2xl">
                &#8250;
            </button>
        </div>
    </div>
</div>


<div class="container mx-auto flex justify-center items-center flex-col gap-8 py-8 w-full">
    @foreach ($categories as $category)
        <section id="{{ $category['id'] }}" class="w-full">
            <div class="relative flex justify-center items-center flex-col">
                <h2 class="text-white font-semibold bg-primary px-8 py-2 rounded-md text-xl">
                    {{ $category['category_name'] }}
                </h2>
            </div>
            <div>
                <p class="my-2  text-center">
                    {{ $category['category_description'] }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 mt-8 w-full">
                @foreach ($category['items'] as $item)
                    <div class="custom-shadow px-4 py-6 rounded-xl w-full">
                        <div class="flex flex-col">
                            <div class="flex flex-col md:flex-row gap-5 items-center">
                                <img class="w-20 h-20 object-cover rounded-full border-primary"
                                    src="{{ asset('assets/images/default.jpg') }}" alt="menu" />
                                <div class="w-full">
                                    <div class="flex lg:flex-row flex-col lg:gap-4 lg:justify-between w-full">
                                        <h3 class="text-lg font-semibold">{{ $item['menu_name'] }}</h3>
                                        <div class="flex gap-4 justify-end">
                                            @if ($item['prices']['small'])
                                                <h2
                                                    class="font-semibold text-lg text-black relative flex justify-center">
                                                    £ {{ $item['prices']['small'] }}
                                                    <span class="absolute font-semibold -top-5">S</span>
                                                </h2>
                                            @endif
                                            @if ($item['prices']['large'])
                                                <h2
                                                    class="font-semibold text-lg text-primary relative flex justify-center">
                                                    £ {{ $item['prices']['large'] }}
                                                    <span class="text-primary absolute font-semibold -top-5">L</span>
                                                </h2>
                                            @endif
                                        </div>
                                    </div>
                                    <p class="mt-3 text-gray-500 text-sm text-center md:text-start">
                                        {{ $item['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endforeach
</div>
