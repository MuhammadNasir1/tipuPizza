@extends('Admin.layout')
@section('title')
    Category
@endsection
@section('content')
    <button data-modal-target='view-modal' data-modal-toggle='view-modal'></button>

    <div class="w-full pt-10 min-h-[88vh] border-2 shadow-2xl rounded-xl">
        <div class="flex justify-between w-full px-5">
            <div>
                <h1 class="text-3xl font-bold">Menu</h1>
            </div>
            <div>
                <button id="addModalBtn" data-modal-target="blog-modal" data-modal-toggle="blog-modal"
                    class="px-5 py-3 font-semibold text-white rounded-full shadow-md gradient-bg">Add New</button>
                <button data-modal-target="categories-modal" data-modal-toggle="categories-modal"></button>
            </div>
        </div>
        @php
            $headers = ['Sr.', 'Image', 'Title', 'Description', 'Category', 'S.price', 'L.price', 'Action'];
        @endphp
        <x-table :headers="$headers">
            <x-slot name="tablebody">
                <tr>
                    <td></td>
                    {{-- <td class="whitespace-nowrap">{{ $data->added_username  }}</td> --}}
                    {{-- <td>{{ $username =App\Models\User::select('name')->where('id' , $data->added_user_id)->first();  }}</td> --}}
                    <td><img class="object-cover w-16 h-16 rounded-full "
                            src="{{ asset('assets/Profile photo (1) 1.png') }}" alt='Blog Image'></td>
                    <td class='text-xs xl:text-[15px]'>Title Here</td>
                    <td class='text-xs xl:text-[15px] min-w-[280px]'>Description Here</td>
                    <td class='text-sm xl:text-[15px] whitespace-nowrap'>Category 1</td>
                    <td class='text-sm xl:text-[15px] whitespace-nowrap'> 100</td>
                    <td class='text-sm xl:text-[15px] whitespace-nowrap'>100</td>

                    <td>
                        <span class='flex gap-4'>
                            <button class="updateDataBtn">
                                <svg width='36' height='36' viewBox='0 0 36 36' fill='none'
                                    xmlns='http://www.w3.org/2000/svg'>
                                    <circle opacity='0.1' cx='18' cy='18' r='18' fill='#233A85' />
                                    <path fill-rule='evenodd' clip-rule='evenodd'
                                        d='M16.1637 23.6188L22.3141 15.665C22.6484 15.2361 22.7673 14.7402 22.6558 14.2353C22.5593 13.7763 22.277 13.3399 21.8536 13.0088L20.8211 12.1886C19.9223 11.4737 18.8081 11.549 18.1693 12.3692L17.4784 13.2654C17.3893 13.3775 17.4116 13.543 17.523 13.6333C17.523 13.6333 19.2686 15.0329 19.3058 15.063C19.4246 15.1759 19.5137 15.3264 19.536 15.507C19.5732 15.8607 19.328 16.1918 18.9641 16.2369C18.7932 16.2595 18.6298 16.2068 18.511 16.109L16.6762 14.6492C16.5871 14.5822 16.4534 14.5965 16.3791 14.6868L12.0188 20.3304C11.7365 20.6841 11.64 21.1431 11.7365 21.5871L12.2936 24.0025C12.3233 24.1304 12.4348 24.2207 12.5685 24.2207L15.0197 24.1906C15.4654 24.1831 15.8814 23.9799 16.1637 23.6188ZM19.5958 22.8672H23.5929C23.9829 22.8672 24.3 23.1885 24.3 23.5835C24.3 23.9794 23.9829 24.2999 23.5929 24.2999H19.5958C19.2059 24.2999 18.8887 23.9794 18.8887 23.5835C18.8887 23.1885 19.2059 22.8672 19.5958 22.8672Z'
                                        fill='#233A85' />
                                </svg>
                            </button>
                            <button class="deleteDataBtn" delId="" delUrl="../deleteMedia" name="media_id">
                                <svg width='36' height='36' viewBox='0 0 36 36' fill='none'
                                    xmlns='http://www.w3.org/2000/svg'>
                                    <circle opacity='0.1' cx='18' cy='18' r='18' fill='#DF6F79' />
                                    <path fill-rule='evenodd' clip-rule='evenodd'
                                        d='M23.4905 13.7423C23.7356 13.7423 23.9396 13.9458 23.9396 14.2047V14.4441C23.9396 14.6967 23.7356 14.9065 23.4905 14.9065H13.0493C12.8036 14.9065 12.5996 14.6967 12.5996 14.4441V14.2047C12.5996 13.9458 12.8036 13.7423 13.0493 13.7423H14.8862C15.2594 13.7423 15.5841 13.4771 15.6681 13.1028L15.7642 12.6732C15.9137 12.0879 16.4058 11.6992 16.9688 11.6992H19.5704C20.1273 11.6992 20.6249 12.0879 20.7688 12.6423L20.8718 13.1022C20.9551 13.4771 21.2798 13.7423 21.6536 13.7423H23.4905ZM22.557 22.4932C22.7487 20.7059 23.0845 16.4598 23.0845 16.4169C23.0968 16.2871 23.0545 16.1643 22.9705 16.0654C22.8805 15.9728 22.7665 15.918 22.6409 15.918H13.9025C13.7762 15.918 13.6562 15.9728 13.5728 16.0654C13.4883 16.1643 13.4466 16.2871 13.4527 16.4169C13.4539 16.4248 13.4659 16.5744 13.4861 16.8244C13.5755 17.9353 13.8248 21.0292 13.9858 22.4932C14.0998 23.5718 14.8074 24.2496 15.8325 24.2742C16.6235 24.2925 17.4384 24.2988 18.2717 24.2988C19.0566 24.2988 19.8537 24.2925 20.6692 24.2742C21.7298 24.2559 22.4369 23.59 22.557 22.4932Z'
                                        fill='#D11A2A' />
                                </svg>
                            </button>

                            <button mediaTitle="" mediaAuthor="" mediaCategory="" mediaCategoryId="" mediaDate=""
                                mediaDescription="" mediaId="" mediaImage="{{ asset('assets/default-logo-req.png') }}"
                                class="viewModalBtn">
                                <svg width='37' height='36' viewBox='0 0 37 36' fill='none'
                                    xmlns='http://www.w3.org/2000/svg'>
                                    <path fill-rule='evenodd' clip-rule='evenodd'
                                        d='M28.0642 18.5C28.0642 18.126 27.8621 17.8812 27.4579 17.3896C25.9788 15.5938 22.7163 12.25 18.9288 12.25C15.1413 12.25 11.8788 15.5938 10.3996 17.3896C9.99542 17.8812 9.79333 18.126 9.79333 18.5C9.79333 18.874 9.99542 19.1187 10.3996 19.6104C11.8788 21.4062 15.1413 24.75 18.9288 24.75C22.7163 24.75 25.9788 21.4062 27.4579 19.6104C27.8621 19.1187 28.0642 18.874 28.0642 18.5ZM18.9288 21.625C19.7576 21.625 20.5524 21.2958 21.1385 20.7097C21.7245 20.1237 22.0538 19.3288 22.0538 18.5C22.0538 17.6712 21.7245 16.8763 21.1385 16.2903C20.5524 15.7042 19.7576 15.375 18.9288 15.375C18.0999 15.375 17.3051 15.7042 16.719 16.2903C16.133 16.8763 15.8038 17.6712 15.8038 18.5C15.8038 19.3288 16.133 20.1237 16.719 20.7097C17.3051 21.2958 18.0999 21.625 18.9288 21.625Z'
                                        fill='url(#paint0_linear_872_5570)' />
                                    <circle opacity='0.1' cx='18.4287' cy='18' r='18'
                                        fill='url(#paint1_linear_872_5570)' />
                                    <defs>
                                        <linearGradient id='paint0_linear_872_5570' x1='18.9288' y1='12.25'
                                            x2='18.9288' y2='24.75' gradientUnits='userSpaceOnUse'>
                                            <stop stop-color='#FCB376' />
                                            <stop offset='1' stop-color='#FE8A29' />
                                        </linearGradient>
                                        <linearGradient id='paint1_linear_872_5570' x1='18.4287' y1='0'
                                            x2='18.4287' y2='36' gradientUnits='userSpaceOnUse'>
                                            <stop stop-color='#FCB376' />
                                            <stop offset='1' stop-color='#FE8A29' />
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </button>
                        </span>
                    </td>
                </tr>

            </x-slot>
        </x-table>


        <x-modal id="blog-modal">
            <x-slot name="title">Add Blog </x-slot>
            <x-slot name="modal_width">max-w-4xl</x-slot>
            <x-slot name="body">
                <form id="postDataForm" method="POST" url="../saveMedia" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="media_type" value="blogs">
                    <input type="hidden" name="media_id" id="updateId">
                    <div class="grid grid-cols-1 gap-4 ">
                        <div class="md:px-52 ">
                            <x-file-uploader name="media_image" id="moduleImage" />
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="mt-4">
                            <x-input class="" id="categoryName" label="Image Title" placeholder="Enter Here"
                                name="category_name" type="text"></x-input>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-4 ">
                        <div>
                            <x-select name="category_type" id="categoryType1" label="Select Category">
                                <x-slot name="options">
                                    <option disabled selected>Select Category</option>
                                    <option value="blogs">Blog</option>
                                    <option value="diseases">Diseases</option>
                                    <option value="consultancy">Consultancy</option>
                                </x-slot>
                            </x-select>
                        </div>
                        <div class="">
                            <x-input class="" id="categoryName" label="Description" placeholder="Enter Here"
                                name="category_name" type="text"></x-input>
                        </div>

                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-2">
                        <div class="">
                            <x-input class="" id="categoryName" label="S.Price" placeholder="Enter Here"
                                name="category_name" type="number"></x-input>
                        </div>
                        <div class="">
                            <x-input class="" id="categoryName" label="L.Price" placeholder="Enter Here"
                                name="category_name" type="number"></x-input>
                        </div>
                    </div>
                    <div class="px-20 mt-8">
                        <x-modal-button :title="'Add Category'"></x-modal-button>
                    </div>
                </form>
            </x-slot>
        </x-modal>
        <x-modal id="view-modal">
            <x-slot name="title">Details </x-slot>
            <x-slot name="modal_width">max-w-2xl</x-slot>
            <x-slot name="body">
                <div class="p-6">
                    <div class="flex justify-center">
                        <img class="object-contain w-80 h-80" src="{{ asset('assets/viewimgsvg.svg') }}" alt="">
                    </div>
                </div>
            </x-slot>
        </x-modal>
    </div>
@endsection
@section('js')
    <script>
        function viewData() {

            $('.viewModalBtn').click(function() {
                $('#view-modal').addClass('flex').removeClass('hidden');
                $('#dTitle').text($(this).attr('mediaTitle'));
                $('#dAuthor').text($(this).attr('mediaAuthor'));
                $('#dCategory').text($(this).attr('mediaCategory'));
                $('#dDate').text($(this).attr('mediaDate'));
                $('#dDescription').text($(this).attr('mediaDescription'));
                $('#dImage').attr('src', $(this).attr('mediaImage'));

            });

        }
        viewData()

        function updateDatafun() {
            viewData()
            $('.updateDataBtn').click(function() {
                $('#blog-modal').removeClass("hidden").addClass('flex');

                let mediaDetails = $(this).siblings('.viewModalBtn');;
                $('#updateId').val(mediaDetails.attr('mediaId'));
                $('#mediaTitle').val(mediaDetails.attr('mediaTitle'));
                $('#mediaTitle').val(mediaDetails.attr('mediaTitle'));
                $('#mediaAuthor').val(mediaDetails.attr('mediaAuthor'));
                $('#categoryId').val(mediaDetails.attr('mediaCategoryId')).trigger('change');
                $('#mediaDescription').val(mediaDetails.attr('mediaDescription'));
                let fileImg = $('#blog-modal .file-preview');
                fileImg.removeClass('hidden').attr('src', mediaDetails.attr('mediaImage'));


                $('#blog-modal #modalTitle').text("Update Menu");
                $('#blog-modal #btnText').text("Update");

            });
        }
        updateDatafun();
        $('#addModalBtn').click(function() {
            $('#postDataForm')[0].reset();
            $('#categoryId').trigger('change');
            $('#updateId').val('');
            $('#blog-modal #modalTitle').text("Add Menu");
            $('#blog-modal #btnText').text("Add Menu");
            let fileImg = $('#blog-modal .file-preview');
            fileImg.addClass('hidden');

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
