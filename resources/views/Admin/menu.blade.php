@extends('Admin.layout')
@section('title')
    Menu
@endsection
@section('content')
    <div class="w-full pt-10 min-h-[88vh] border-2 shadow-2xl rounded-xl">
        <div class="flex justify-between w-full px-5">
            <div>
                <h1 class="text-3xl font-bold">Menu</h1>
            </div>
            <div>
                <button id="addModalBtn" data-modal-target="menu-modal" data-modal-toggle="menu-modal"
                    class="px-5 py-3 font-semibold text-white rounded-full shadow-md gradient-bg">Add New</button>
            </div>
        </div>
        @php
            $headers = ['Sr.', 'Image', 'Title', 'Description', 'Category', 'S.price', 'L.price', 'Action'];
        @endphp
        <x-table :headers="$headers">
            <x-slot name="tablebody">
                @foreach ($menu as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td class="whitespace-nowrap">{{ $data->added_username  }}</td> --}}
                        {{-- <td>{{ $username =App\Models\User::select('name')->where('id' , $data->added_user_id)->first();  }}</td> --}}
                        <td><img class="object-cover w-20 h-20 rounded-full "
                                src="{{ asset($data->menu_img ?? 'assets/images/logo.jpg') }}" alt='Menu Image'></td>
                        <td class='text-xs xl:text-[15px]'>{{ $data->menu_name }}</td>
                        <td class='text-xs xl:text-[15px] min-w-[280px]'>{{ $data->menu_description }}</td>
                        <td class='text-sm xl:text-[15px] whitespace-nowrap'>{{ $data->category->category_name }}</td>
                        <td class='text-sm xl:text-[15px] whitespace-nowrap'> {{ $data->menu_s_price }}</td>
                        <td class='text-sm xl:text-[15px] whitespace-nowrap'> {{ $data->menu_l_price }}</td>

                        <td>
                            <span class='flex gap-4'>
                                <button class="updateDataBtn" menuId="{{ $data->menu_id }}"
                                    menuName="{{ $data->menu_name }}" menuDescription="{{ $data->menu_description }}"
                                    menuSPrice="{{ $data->menu_s_price }}" menuLPrice="{{ $data->menu_l_price }}"
                                    menuCategory="{{ $data->category_id }}" menuImage="{{ asset($data->menu_img) }}"
                                    menuLLabel="{{ $data->menu_l_label }}" menuSLabel="{{ $data->menu_s_label }}"
                                    menuAddons={{ $data->addons }}>
                                    <svg width='36' height='36' viewBox='0 0 36 36' fill='none'
                                        xmlns='http://www.w3.org/2000/svg'>
                                        <circle opacity='0.1' cx='18' cy='18' r='18' fill='#233A85' />
                                        <path fill-rule='evenodd' clip-rule='evenodd'
                                            d='M16.1637 23.6188L22.3141 15.665C22.6484 15.2361 22.7673 14.7402 22.6558 14.2353C22.5593 13.7763 22.277 13.3399 21.8536 13.0088L20.8211 12.1886C19.9223 11.4737 18.8081 11.549 18.1693 12.3692L17.4784 13.2654C17.3893 13.3775 17.4116 13.543 17.523 13.6333C17.523 13.6333 19.2686 15.0329 19.3058 15.063C19.4246 15.1759 19.5137 15.3264 19.536 15.507C19.5732 15.8607 19.328 16.1918 18.9641 16.2369C18.7932 16.2595 18.6298 16.2068 18.511 16.109L16.6762 14.6492C16.5871 14.5822 16.4534 14.5965 16.3791 14.6868L12.0188 20.3304C11.7365 20.6841 11.64 21.1431 11.7365 21.5871L12.2936 24.0025C12.3233 24.1304 12.4348 24.2207 12.5685 24.2207L15.0197 24.1906C15.4654 24.1831 15.8814 23.9799 16.1637 23.6188ZM19.5958 22.8672H23.5929C23.9829 22.8672 24.3 23.1885 24.3 23.5835C24.3 23.9794 23.9829 24.2999 23.5929 24.2999H19.5958C19.2059 24.2999 18.8887 23.9794 18.8887 23.5835C18.8887 23.1885 19.2059 22.8672 19.5958 22.8672Z'
                                            fill='#233A85' />
                                    </svg>
                                </button>
                                <button class="deleteDataBtn" delId="" delUrl="../deleteMenu/{{ $data->menu_id }}">
                                    <svg width='36' height='36' viewBox='0 0 36 36' fill='none'
                                        xmlns='http://www.w3.org/2000/svg'>
                                        <circle opacity='0.1' cx='18' cy='18' r='18' fill='#DF6F79' />
                                        <path fill-rule='evenodd' clip-rule='evenodd'
                                            d='M23.4905 13.7423C23.7356 13.7423 23.9396 13.9458 23.9396 14.2047V14.4441C23.9396 14.6967 23.7356 14.9065 23.4905 14.9065H13.0493C12.8036 14.9065 12.5996 14.6967 12.5996 14.4441V14.2047C12.5996 13.9458 12.8036 13.7423 13.0493 13.7423H14.8862C15.2594 13.7423 15.5841 13.4771 15.6681 13.1028L15.7642 12.6732C15.9137 12.0879 16.4058 11.6992 16.9688 11.6992H19.5704C20.1273 11.6992 20.6249 12.0879 20.7688 12.6423L20.8718 13.1022C20.9551 13.4771 21.2798 13.7423 21.6536 13.7423H23.4905ZM22.557 22.4932C22.7487 20.7059 23.0845 16.4598 23.0845 16.4169C23.0968 16.2871 23.0545 16.1643 22.9705 16.0654C22.8805 15.9728 22.7665 15.918 22.6409 15.918H13.9025C13.7762 15.918 13.6562 15.9728 13.5728 16.0654C13.4883 16.1643 13.4466 16.2871 13.4527 16.4169C13.4539 16.4248 13.4659 16.5744 13.4861 16.8244C13.5755 17.9353 13.8248 21.0292 13.9858 22.4932C14.0998 23.5718 14.8074 24.2496 15.8325 24.2742C16.6235 24.2925 17.4384 24.2988 18.2717 24.2988C19.0566 24.2988 19.8537 24.2925 20.6692 24.2742C21.7298 24.2559 22.4369 23.59 22.557 22.4932Z'
                                            fill='#D11A2A' />
                                    </svg>
                                </button>

                            </span>
                        </td>
                    </tr>
                @endforeach

            </x-slot>
        </x-table>


        <x-modal id="menu-modal">
            <x-slot name="title">Add Menu </x-slot>
            <x-slot name="modal_width">max-w-4xl</x-slot>
            <x-slot name="body">
                <form id="postDataForm" method="POST" url="../addMenu" enctype="multipart/form-data">
                    @csrf

                    <div class="grid md:grid-cols-2 grid-cols-1 w-full gap-4 ">
                        <div>
                            <x-file-uploader name="menu_img" id="menuImage" />
                        </div>
                        <div>

                            <div class="mt-2">
                                <div class="mt-4">
                                    <x-input class="" id="menuName" label="Name" placeholder="Enter Here"
                                        name="menu_name" type="text"></x-input>
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-select name="category_id" id="menuCategory" label="Select Category">
                                    <x-slot name="options">
                                        <option value="" disabled selected>Select Menu Category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->category_id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </x-slot>
                                </x-select>
                            </div>


                        </div>
                        <div class="grid md:grid-cols-2 gap-4  col-span-2">
                            <div class="flex gap-2">
                                <div class="w-1/2">
                                    <x-input class="" id="menuSLabel" label="Label" placeholder="Enter Here"
                                        name="menu_s_label" type="text"></x-input>
                                </div>
                                <div class="w-1/2">
                                    <x-input class="" id="menuSPrice" label="S.Price" placeholder="Enter Here"
                                        name="menu_s_price" type="text"></x-input>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <div class="">
                                    <x-input class="" id="menuLLabel" label="Label 2" placeholder="Enter Here"
                                        name="menu_l_label" type="text"></x-input>
                                </div>
                                <div class="">
                                    <x-input class="" id="menuLPrice" label="L.Price" placeholder="Enter Here"
                                        name="menu_l_price" type="text"></x-input>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-2 w-full">
                            <x-select name="addons[]" id="addons" label="Select Addons">
                                <x-slot name="options">
                                    <option value="null" disabled selected>Select Menu Addons</option>
                                    @foreach ($addons as $data)
                                        <option value="{{ $data->addon_id }}">{{ $data->addon_name }}</option>
                                    @endforeach

                                </x-slot>
                            </x-select>
                        </div>
                        <div id="selected_addons_list" class="my-2 flex gap-3 flex-wrap"></div>
                        <div class="col-span-2">

                            <x-textarea class="" id="menuDescription" label="Description"
                                placeholder="Enter Description" name="menu_description"></x-textarea>
                        </div>


                        <!-- Hidden input to store selected addon IDs -->
                        <input type="hidden" id="selected_addons" name="addons" value="">
                    </div>
                    <div class=" mt-8">
                        <button class="w-full px-3 py-2 font-semibold text-white rounded-full shadow-md gradient-bg"
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
                                Add Menu
                            </div>
                        </button>
                    </div>
                </form>
            </x-slot>
        </x-modal>

    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Listen for changes on the dropdown
            $('#addons').on('change', function() {
                // Get the selected value and text
                let selectedValue = $(this).val();
                let selectedText = $(this).find('option:selected').text();

                // Check if the selected value already exists in the list
                if ($('#selected_addons_list button[data-id="' + selectedValue + '"]').length > 0) {
                    alert("This addon has already been added.");
                    return; // Stop the function if the addon is already added
                }

                // Add the selected text to the list view
                let listItem = `<button type="button" class="flex items-center space-x-2 text-white bg-primary py-2 px-4 rounded-lg" data-id="${selectedValue}">
    <span class="flex-1">${selectedText}</span>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 remove-addon" fill="white" viewBox="0 0 24 24" stroke="currentColor" data-id="${selectedValue}">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
</button>
                    `;
                $('#selected_addons_list').append(listItem);

                // Disable the selected option in the dropdown
                $('#addons option[value="' + selectedValue + '"]').prop('disabled', true);

                // Update the hidden input field with the selected values
                updateHiddenField();
            });

            // Remove item from the list and update hidden field
            $(document).on('click', '.remove-addon', function() {
                let addonId = $(this).data('id');

                // Remove the corresponding list item
                $(this).closest('button').remove();

                // Enable the option again in the dropdown
                $('#addons option[value="' + addonId + '"]').prop('disabled', false);

                // Update the hidden input field
                updateHiddenField();
            });

            // Function to update the hidden input field
            function updateHiddenField() {
                let addonIds = [];
                $('#selected_addons_list button').each(function() {
                    addonIds.push($(this).data('id'));
                });


                $('#selected_addons').val(addonIds.join(','));
            }
        });





        function updateDatafun() {
            $('.updateDataBtn').click(function() {
                $('#menu-modal').removeClass("hidden").addClass('flex');
                $('#postDataForm').attr('url', '../updateMenu/' + $(this).attr('menuId'));


                $('#menuName').val($(this).attr('menuName'));
                $('#menuSPrice').val($(this).attr('menuSPrice'));
                $('#menuLPrice').val($(this).attr('menuLPrice'));
                $('#menuSLabel').val($(this).attr('menuSLabel'));
                $('#menuLLabel').val($(this).attr('menuLLabel'));
                $('#menuCategory').val($(this).attr('menuCategory')).trigger('change');
                $('#menuDescription').val($(this).attr('menuDescription'));
                let fileImg = $('#menu-modal .file-preview');
                fileImg.removeClass('hidden').attr('src', $(this).attr('menuImage'));

                $('#addons option').prop('disabled', false);
                $('#addons option[value="null"]').prop('disabled', true);

                $('#selected_addons').val($(this).attr('menuAddons')); // Set the value of selected_addons

                let selectedValues = $('#selected_addons').val().split(
                    ','); // Get the values as an array (e.g., ["1", "2"])

                // Clear the list to avoid duplicates
                $('#selected_addons_list').empty();


                // Iterate over each selected value
                selectedValues.forEach(function(value) {
                    // Find the matching option in the select dropdown
                    let selectedOption = $(`#addons option[value="${value}"]`);
                    let selectedText = selectedOption.text(); // Get the text of the option

                    if (selectedText) {
                        // Create the button element for the addon
                        let listItem = `
            <button type="button" class="flex items-center space-x-2 text-white bg-primary py-2 px-4 rounded-lg" data-id="${value}">
                <span class="flex-1">${selectedText}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 remove-addon" fill="white" viewBox="0 0 24 24" stroke="currentColor" data-id="${value}">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        `;

                        // Append the button to the selected addons list
                        $('#selected_addons_list').append(listItem);

                        // Disable the matched option in the select dropdown
                        selectedOption.prop('disabled', true);
                    }
                });


                $('#menu-modal #modalTitle').text("Update Menu");
                $('#menu-modal #btnText').text("Update");

            });
        }
        updateDatafun();
        $('#addModalBtn').click(function() {
            $('#postDataForm')[0].reset();
            $('#postDataForm').attr('url', '../addMenu');

            $('#menuCategory').trigger('change');

            $('#menu-modal #modalTitle').text("Add Menu");
            $('#menu-modal #btnText').text("Add Menu");
            let fileImg = $('#menu-modal .file-preview');
            fileImg.addClass('hidden');

            $('#selected_addons_list').empty();
            $('#addons option').prop('disabled', false);
            $('#addons option[value="null"]').prop('disabled', true);



            $('#menuSLabel').val('S');
            $('#menuLLabel').val('L');
        })


        // Listen for the custom form submission response event
        $(document).on("formSubmissionResponse", function(event, response, Alert, SuccessAlert, WarningAlert) {
            // console.log(response);
            if (response.success) {

                $('.modalCloseBtn').click();
            } else {}
        });
    </script>
@endsection
