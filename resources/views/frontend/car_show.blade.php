@extends('frontend.layouts.master_layout')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">

    <style>
        .swal2-containe {
            z-index: 99999;
        }

        #btnOpenForm2,
        #btnOpenForm3 {
            border: 1px solid #C90200;
            padding: 0px 20px;
            border-radius: 5px;
            font-weight: bold;
            transition: all .2s;
        }

        #btnOpenForm2:hover,
        #btnOpenForm3:hover {
            border: 1px solid #C90200;
            padding: 0px 20px;
            border-radius: 5px;
            background: #C90200;
            color: white
        }

        .form-popup-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
        }

        .u-form-popup-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
        }

        .form-control {

            color: #282424 !important;
        }

        .form-popup-bg {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: #000000e6;
            opacity: 0.2;
            visibility: hidden;
            -webkit-transition: opacity 0.2s 0s, visibility 0s 0.2s;
            -moz-transition: opacity 0.2s 0s, visibility 0s 0.2s;
            transition: opacity 0.2s 0s, visibility 0s 0.2s;
            overflow-y: auto;
            z-index: 99;
        }

        .u-form-popup-bg {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: #00000082;
            opacity: 0.2;
            visibility: hidden;
            -webkit-transition: opacity 0.2s 0s, visibility 0s 0.2s;
            -moz-transition: opacity 0.2s 0s, visibility 0s 0.2s;
            transition: opacity 0.2s 0s, visibility 0s 0.2s;
            overflow-y: auto;
            z-index: 100;
            backdrop-filter: blur(5px);
            /* Adjust the blur intensity */
        }

        .form-popup-bg {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            background-color: #00000082;
            opacity: 0.2;
            visibility: hidden;
            -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
            -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
            transition: opacity 0.3s 0s, visibility 0s 0.3s;
            overflow-y: auto;
            z-index: 99;
            backdrop-filter: blur(5px);
            /* Adjust the blur intensity */
        }

        .form-popup-bg.is-visible {
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
            -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
            transition: opacity 0.3s 0s, visibility 0s 0s;
        }

        .u-form-popup-bg.is-visible {
            opacity: 1;
            visibility: visible;
            -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
            -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
            transition: opacity 0.3s 0s, visibility 0s 0s;
        }

        .form-container {
            background-color: #000;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.19), 0 6px 8px rgba(0, 0, 0, 0.23);
            display: flex;
            flex-direction: column;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            padding: 30px;
            color: #fff;
        }

        .close-button {
            background: none;
            color: #fff;
            width: 40px;
            height: 40px;
            position: absolute;
            top: 0;
            right: 0;
            border: solid 1px #fff;
        }

        .form-popup-bg:before {
            content: '';
            background-color: #fff;
            opacity: .25;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        section input[type="text"]:focus {
            border-color: #CA2726;
            /* Border color on focus */
            outline: none;
            /* Remove the default outline */
            box-shadow: 0px 0px 5px #CA2726;
        }

        section select:focus {
            border-color: #CA2726 !important;
            /* Border color on focus */
            outline: none !important;
            /* Remove the default outline */
            box-shadow: 0px 0px 5px #CA2726 !important;
        }

        section textarea:focus {
            border-color: #CA2726 !important;
            /* Border color on focus */
            outline: none !important;
            /* Remove the default outline */
            box-shadow: 0px 0px 5px #CA2726 !important;
        }

        .btn-submit {
            background-color: #ff0402;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-bottom: 10px;
            opacity: 0.8;
            border-radius: 8px;
        }


        .result {
            margin-top: 20px;
        }


        .youtube_link_icon {
            color: #c90200;
            font-size: 1.7rem;
            transition: all .2s;
        }

        .youtube_link_icon:hover {
            color: #920806;
        }

        .yt-link {
            display: flex;
            /* justify-content: center; */
            align-items: center;
            gap: 4px;
            transition: all .2s;
            font-size: .95rem
        }
        .yt-link:hover{
            color: #c90200;
            text-decoration: underline
        }




        <style>
    /* Adjust input field width and alignment */
    .intl-tel-input {
        width: 100%;
    }

    .intl-tel-input .country-list {
        z-index: 1000; /* Ensure the dropdown is above other elements */
    }

    .iti__country-list {
    position: absolute;
    z-index: 2;
    list-style: none;
    text-align: left;
    padding: 0;
    margin: 0 0 0 -1px;
    box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2);
    background-color: white;
    border: 1px solid #CCC;
    white-space: nowrap;
    max-height: 300px;
    overflow-y: scroll;
    -webkit-overflow-scrolling: touch;
    
    align-items: baseline;
    flex-direction: column;
    max-width: 300px;
}
span.iti__country-name {
    color: black;
}

li.iti__divider {
    display: none;
}
.yt-link{
    display: flex;

}

.checkboxContainer {
    display: flex;
    align-items: center;
    margin-top: 10px;
}
.checkboxContainer input{
    width: 20px;  /* Change this value to increase size */
    cursor: pointer;
    height: 20px; /* Change this value to increase size */
}
.checkboxContainer label {
    cursor: pointer;
    font-size: 0.8rem;
    margin-left: 10px; /* Add some space between checkbox and label */
    
}
 
   
</style>
    </style>
@endsection
@section('content')
    @php
        $currentCurrencyAmount = session('currencyAmount', '1');
        $currentCurrency = session('currency', 'USD');
        $currentCurrencyId = session('currencyId', '0');
    @endphp

    <section class="car-detail-header">

        <div class="container">

            <div class="row">
                <div class="col-md-9">
                    <div class="wrapper">
                        <section class="mainImage">
                        </section>
                        <section class="thumbnail">

                        </section>
                    </div>
                </div>
                <div class="col-md-3 pt-3">
                    <div class="cs_flex">
                        @if ($car->fob_price)
                            <div class="form-container price-calculator-contianer"
                                style="    position: sticky;
                                top: 5px;">

                                <h3>Price Calculator</h3>
                                <p style='font-size:.8rem' class="mb-4">Please select Country and Port</p>

                                <form id="calculateForm" action="{{ route('getcal') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input name="fob_price" value="{{ $car->fob_price }}" type="number"
                                            class="form-control mb-4" hidden />

                                        <input name="m3" value="{{ $car->m3 }}" type="number"
                                            class="form-control mb-4" hidden />
                                    </div>
                                    <div class="form-group ">

                                        <select required name="country_id" id="country"
                                            class="form-control mp_select mb-4" onchange="fetchPorts(this.value)">
                                            <option disabled selected>Select Country</option>

                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group ">
                                        <select required id="port_id" name="port_id" class="form-control mp_select mb-4">
                                            <option selected disabled>Select Port</option>
                                        </select>
                                    </div>
                                    <button type="button" id="calculateBtn" class="btn-submit">Calculate</button>
                                </form>

                                <div class="result" id="result">
                                    <p>Result Will Shown </p>
                                </div>



                            </div>
                      
                       
                        @endif

                        <div class="inquiry_form_container "  @if ($car->fob_price) style="display:none !important" @endif>
                            <div class="form-container">
                                <h4 class="mb-4">Vehicle Inquiry</h4>
                        
                                <form >
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input value="{{ auth()->user()->name ?? '' }}" type="text" name="name" class="form-control mb-4" placeholder="Name" required />
                                        </div>
                        
                                        <!-- Country Dropdown -->
                                        <div class="form-group col-12">
                                            <select id="countrySelect1" required name="country" class="form-control mb-4" placeholder="Select*">
                                                <option disabled selected>Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option extravalue="{{ $country->code }}" value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                        
                                        <!-- International Telephone Input -->
                                        <div class="form-group col-12 mb-4">
                                            <input id="phone1" class="form-control" type="tel" name="phone" placeholder="Phone" required />
                                            <div  class="checkboxContainer">
                                                <input name="is_whatsapp" type="checkbox" id="whatsappCheck">
                                                <label for="whatsappCheck">Is WhatsApp on this number?</label>
                                            </div>
                                        </div>
                        
                                        <div class="form-group col-12">
                                            <input class="form-control mb-4" value="{{ auth()->user()->email ?? '' }}" name="email" type="email" placeholder="Email" required />
                                        </div>
                        
                                        <div class="form-group col-12">
                                            <input hidden class="form-control mb-4" readonly type="text" value="{{ $car->make->name . ' ' . $car->model->name . ' ' . \Carbon\Carbon::parse($car->year_month)->format('Y') }}" name="car_name" placeholder="Car" />
                                            <input class="form-control mb-4" type="number" hidden name="car_id" value="{{ $car->id }}" />
                                        </div>
                        
                                        <div class="form-group col-lg-12">
                                            <textarea name="message" placeholder="Message" class="form-control mb-4" rows="3" required></textarea>
                                        </div>
                        
                                        <div class="col-12">
                                            
                                            <button type="button" id="submitInquiry1" class="btn-submit inqury-btn-submit">Send Inquiry</button>
                                        </div>
                                    </div> <!-- row -->
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>

    <section id="SpecContainer" class="car-specs">
        <div class="container">

            <div class="spec-header">

                <div>
                    <h1>{{ $car->make->name . ' ' . $car->model->name . ' ' . \Carbon\Carbon::parse($car->year_month)->format('Y') }}</h1>
                    
                    @if (!empty($car->yt_link))
                        <p style="margin-top: 5px; font-size: 16px;">
                            <a target="_blank" class="yt-link" href="{{ $car->yt_link }}" >
                                <i class="fa-brands fa-youtube youtube_link_icon"></i>
                                Discover More About This Stunning Car! 
                            </a>
                        </p>
                    @endif
                </div>
                


                <div class='spec-flex'>
                    <button id="btnOpenForm">Inquiry Now</button>
                </div>
            </div>

            <div class="spec-container">


                <table class="table table-borderless text-center text-nowrap fw-bold">
                    <thead class="row-red fw-bold">
                        <td>Status</td>
                        <td>Chassis No.</td>
                        <td>Model Grade</td>
                        <td>Engine Type</td>
                    </thead>
                    <tbody>
                        <tr class="row-gray-light">
                            <td>{{ $car->status ? 'In Stock' : 'Out of Stock' }}</td>
                            <td>
                                @if ($car->showChassis == 1)
                                    {{ $car->chassis_no }}
                                @else
                                    <span class="text-muted">N/A</span>
                                @endif
                            </td>
                            <td>{{ $car->model_grade }}</td>
                            <td>{{ $car->engine_type }}</td>
                        </tr>

                        <thead class="row-red fw-bold">
                            <td>Drive</td>
                            <td>Transmission</td>
                            <td>Body Type</td>
                            <td>Condition</td>
                        </thead>
                        <tr class="row-gray-light">
                            <td>{{ $car->drive }}</td>
                            <td>{{ $car->transmission }}</td>
                            <td>{{ $car->type->name }}</td>
                            <td>{{ $car->condition }}</td>
                        </tr>

                        <thead class="row-red fw-bold">
                            <td>Color</td>
                            <td>Year/Month</td>
                            <td>Doors</td>
                            <td>Seats</td>
                        </thead>
                        <tr class="row-gray-light">
                            <td>{{ $car->color }}</td>
                            <td>{{ $car->year_month }}</td>
                            <td>{{ $car->doors }}</td>
                            <td>{{ $car->seats }}</td>
                        </tr>

                        <thead class="row-red fw-bold">
                            <td>Fuel</td>
                            <td>M3</td>
                            <td>Mileage</td>
                            <td>CC</td>
                        </thead>
                        <tr class="row-gray-light">
                            <td>{{ $car->fuel }}</td>
                            <td>{{ $car->m3 }}</td>
                            <td>{{ $car->mileage }}</td>
                            <td>{{ $car->cc }}</td>

                        </tr>

                        <thead class="row-red fw-bold" style="font-size: 1.2rem">
                            <th>Wheels</th> <!-- New column for wheels -->
                            <th colspan="2">FOB Price</th> <!-- Changed to <th> for header -->
                            <th>CNF</th> <!-- Changed to <th> for header -->

                        </thead>

                        <tr class="row-gray-light" style="font-size: 1.2rem">
                            <td>
                                {{ $car->wheels }} <!-- Display wheels value -->
                            </td>
                            <td colspan="2">
                                @if ($car->fob_price)
                                    {{ $car->fob_price * $currentCurrencyAmount }}
                                @else
                                    <button id="btnOpenForm3">ASK</button>
                                @endif
                            </td>
                            <td>
                                @if ($car->show_cnf_price)
                                    <p id="CnfContainer" class="cnf-p">
                                        {{ ($car->fob_price + $car->m3) * $currentCurrencyAmount }} </p>
                                @else
                                    <button id="btnOpenForm2">ASK</button>
                                @endif
                            </td>

                        </tr>


                    </tbody>
                </table>



            </div>

        </div>



    </section>

    <section>
        <div class="form-popup-bg">
            <div class="form-container" style="padding: 40px">
                <button id="btnCloseForm" class="close-button">X</button>
                <h1>Vehicle Inquiry</h1>
                <p>Please fill the *required fields.</p>
                <form >
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input value="{{ auth()->user()->name ?? '' }}" type="text" name="name"
                                class="form-control mb-4" placeholder="Name" required />
                        </div>
                        <div class="form-group col-lg-6">
                            <select id="countrySelect2" required name="country" class="form-control mb-4" placeholder="Select*">
                                <option disabled selected>Select Country*</option>
                                @foreach ($countries as $country)
                                    <option extravalue="{{ $country->code }}" value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-6">
                            <input id="phone2" class="form-control" type="tel" name="phone" placeholder="Phone" required />
                            <div class="checkboxContainer mb-4">
                                <input name="is_whatsapp" type="checkbox" id="whatsappCheck2">
                                <label for="whatsappCheck2">Is WhatsApp on this number?</label>
                            </div>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <input class="form-control mb-4" value="{{ auth()->user()->email ?? '' }}" name="email"
                                type="email" placeholder="Email" required />
                        </div>
                        <div class="form-group col-lg-12">
                            <input class="form-control mb-4" readonly type="text"
                                value="{{ $car->make->name . ' ' . $car->model->name . ' ' . \Carbon\Carbon::parse($car->year_month)->format('Y') }}"
                                name="car_name" placeholder="Car" />
                            <input class="form-control mb-4" type="number" hidden name="car_id"
                                value="{{ $car->id }}" />
                        </div>
                        <div class="form-group col-lg-12">
                            <textarea name="message" placeholder="Message" class="form-control mb-4" rows="3" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="button" id="submitInquiry2" class="btn-submit inqury-btn-submit">Send Inquiry</button>
                        </div>
                    </div> <!-- row -->
                </form>
            </div>
        </div>
    </section>

 


    <section class="recommend-slider container">

        <div class="heading-header">
            <h2>
                Recommended
            </h2>
            <a href="{{ route('filter.cars') }}">
                See All
                <i class="fa-regular fa-arrow-right-long"></i>
            </a>
        </div>


        <div class="new-arrival-slider">

            @foreach ($allcar as $n_car)
                <div class="new-arival-slide mx-2">
                    <a href="{{ route('car.show', ['id' => $n_car->id]) }}">
                        <div class="car-card">
                            <div class="img-area">
                                @if ($n_car->carImages->isNotEmpty())
                                    <img src="{{ asset('images/car') }}/{{ $n_car->carImages->first()->image }}"
                                        alt="">
                                @endif
                            </div>
                            <div class="text-area">
                                <h4>{{ $n_car->make->name . ' ' . $n_car->model->name . ' ' . \Carbon\Carbon::parse($n_car->year_month)->format('Y') }}
                                </h4>
                                <div class="detail-area">
                                    <p class="color-black-bold">Chasis No <span>{{ $n_car->chassis_no }}</span></p>
                                    <p>|</p>
                                    <p class="color-black-bold">CC <span>{{ $n_car->cc }}</span></p>
                                </div>
                                <a href="{{ route('car.show', ['id' => $n_car->id]) }}">View Details <i
                                        class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
    </section>
@endsection


@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // document selector
        const thumbnailWrapper = document.querySelector(".thumbnail");
        const thumbnailBox = document.querySelectorAll(".thumbnailBox");
        const mainImage = document.querySelector(".mainImage");

        // list of images
        const imageList = [

            @foreach ($car->carImages as $carImgs)
                `{{ asset('images/car') }}/{{ $carImgs->image }}`,
            @endforeach

        ];

        // Set the first image to be shown initially
        mainImage.innerHTML = `<img src="${imageList[0]}" alt="">`;
        mainImage.addEventListener("mousemove", (e) => {
            const containerWidth = mainImage.offsetWidth;
            const containerHeight = mainImage.offsetHeight;

            const image = mainImage.querySelector("img");
            const imageWidth = image.offsetWidth;
            const imageHeight = image.offsetHeight;

            const x = e.pageX - mainImage.offsetLeft;
            const y = e.pageY - mainImage.offsetTop;

            const translateX = (containerWidth / 2 - x) * 2;
            const translateY = (containerHeight / 2 - y) * 2;

            const scale = 3;

            image.style.transform = `translate(${translateX}px, ${translateY}px) scale(${scale})`;
        });
        mainImage.addEventListener("mouseleave", (e) => {
            const image = mainImage.querySelector("img");
            image.style.transform = "translate(0%, 0%) scale(1)";
        });
        imageList.forEach((image, index) => {
            const isActive = index === 0 ? "active" : "";
            const child = `<div class="thumbnailBox ${isActive}">
            <img src="${image}" alt="">
        </div>`;
            const div = document.createElement("div");
            div.innerHTML = child;
            thumbnailWrapper.appendChild(div);
        });

        thumbnailWrapper.querySelectorAll(".thumbnailBox").forEach((thumbnail) => {
            thumbnail.addEventListener("click", (e) => {
                const activeThumbnail = document.querySelector(".thumbnailBox.active");
                if (activeThumbnail) {
                    activeThumbnail.classList.remove("active");
                }
                thumbnail.classList.add("active");
                imageSrc = thumbnail.querySelector("img").getAttribute("src");
                mainImage.innerHTML = `<img src="${imageSrc}" alt="">`;
            });
        });
    </script>

    <!-- Replace this -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>

    <!-- With this -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        function closeForm() {
            $('.form-popup-bg').removeClass('is-visible');
        }

        $(document).ready(function($) {

            /* Contact Form Interactions */
            $('#btnOpenForm').on('click', function(event) {
                event.preventDefault();
                $.get('/check-auth', function(response) {
                    if (response.authenticated) {
                        $('.form-popup-bg').addClass('is-visible');
                    } else {
                        window.location.href = '{{ route('login') }}'; // Redirect to login
                    }

                });

                // $('.form-popup-bg').addClass('is-visible');
            });
            $('#btnOpenForm2').on('click', function(event) {
                event.preventDefault();

                $('.form-popup-bg').addClass('is-visible');
            });
            $('#btnOpenForm3').on('click', function(event) {
                event.preventDefault();

                $('.form-popup-bg').addClass('is-visible');
            });

            //close popup when clicking x or off popup
            $('.form-popup-bg').on('click', function(event) {
                if ($(event.target).is('.form-popup-bg') || $(event.target).is('#btnCloseForm')) {
                    event.preventDefault();
                    $(this).removeClass('is-visible');
                }
            });



        });
    </script>

    <script>
        function closeForm() {
            $('.u-form-popup-bg').removeClass('is-visible');
        }

        $(document).ready(function($) {

            /* Contact Form Interactions */
            $('#btnCalcForm').on('click', function(event) {
                event.preventDefault();

                $('.u-form-popup-bg').addClass('is-visible');
            });

            //close popup when clicking x or off popup
            $('.u-form-popup-bg').on('click', function(event) {
                if ($(event.target).is('.u-form-popup-bg') || $(event.target).is('#btnCloseForm')) {
                    event.preventDefault();
                    $(this).removeClass('is-visible');
                }
            });

        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        // $(document).ready(function() {
        //     $('#submitInquiry').click(function(e) {
        //         e.preventDefault();
        //         var formData = $('#inquiryForm').serialize();

        //         $.ajax({
        //             url: "{{ route('inquiry.store') }}",
        //             type: "POST",
        //             data: formData,
        //             success: function(response) {
        //                 if (response.status == 200) {
        //                     Swal.fire({
        //                         title: 'Success!',
        //                         text: response.message,
        //                         icon: 'success',
        //                         confirmButtonText: 'OK'
        //                     });
        //                     $('#inquiryForm')[0].reset();
        //                 } else {
        //                     Swal.fire({
        //                         title: 'Error!',
        //                         text: 'Failed to send inquiry. ' + response.message,
        //                         icon: 'error',
        //                         confirmButtonText: 'OK'
        //                     });
        //                 }
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error(xhr.responseText);
        //                 Swal.fire({
        //                     title: 'Error!',
        //                     text: 'An error occurred while sending the inquiry: ' + xhr
        //                         .responseText,
        //                     icon: 'error',
        //                     confirmButtonText: 'OK'
        //                 });
        //             }
        //         });
        //     });
        // });


        function fetchPorts(countryId) {
            $.ajax({
                url: "{{ route('getport') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "country_id": countryId
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#port_id').empty();

                        $.each(response.data, function(index, port) {
                            $('#port_id').append('<option value="' + port.id + '">' + port.port +
                                '</option>');
                        });
                    } else {
                        $('#port_id').empty();
                        $('#port_id').append('<option selected disabled >No Port Available</option>');

                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('An error occurred while fetching ports');
                }
            });
        }

        $(document).ready(function() {
            $('#calculateBtn').click(function(e) {
                e.preventDefault();

                // Form validation
                var price = $('input[name="fob_price"]').val();
                var country = $('#country').val();
                var port = $('#port_id').val();

                if (!price) {
                    $('#result').html(`
                  <p>Please enter a price.</p>
              `).css('color', 'red');
                    return;
                }

                if (!country) {
                    $('#result').html(`
                  <p>Please select a country.</p>
              `).css('color', 'red');
                    return;
                }

                if (!port) {
                    $('#result').html(`
                  <p>Please select a port.</p>
              `).css('color', 'red');
                    return;
                }

                var formData = $('#calculateForm').serialize();
                const currentCurrencyAmount = {{ $currentCurrencyAmount }};
                const CnfContainer = document.getElementById('CnfContainer');

                $.ajax({
                    url: "{{ route('getcal') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.status == 200) {
                            $('#result').html(`
                            <p>Calculated Price: <span style="font-weight:bold">${response.data * currentCurrencyAmount}</span></p>
                        `).css('color', 'white');

                            CnfContainer.innerText = response.data * currentCurrencyAmount

                            location.href = '#SpecContainer'
                            CnfContainer.classList.add('blinking_transition')
                            setTimeout(() => {
                                CnfContainer.classList.remove('blinking_transition')
                            }, 2500);

                        } else {
                            $('#result').html(`
                            <p>Failed to calculate price</p>
                        `).css('color', 'red');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        $('#result').html(`
                        <p>An error occurred while calculating the price: ${xhr.responseText}</p>
                    `).css('color', 'red');
                    }
                });
            });
        });
    </script>

    {{-- // new / --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script>
        function initializePhoneInput(inputId, countrySelectId) {
            const phoneInputField = document.querySelector(`#${inputId}`);
            const phoneInput = window.intlTelInput(phoneInputField, {
                initialCountry: "auto",
                geoIpLookup: function(callback) {
                    fetch('https://ipinfo.io/json?token=66e2f39b20a2bd')
                        .then(response => response.json())
                        .then(data => callback(data.country.toLowerCase()))
                        .catch(() => callback("us"));
                },
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"
            });
    
            // Listen for changes on the country select and update the phone input accordingly
            document.querySelector(`#${countrySelectId}`).addEventListener("change", function() {
                const selectedCountryCode = this.options[this.selectedIndex].getAttribute("extravalue").toLowerCase();
                phoneInput.setCountry(selectedCountryCode);
            });
    
            return phoneInput;
        }
    
        // Initialize phone inputs for each form
        const phoneInput1 = initializePhoneInput("phone1", "countrySelect1");
        const phoneInput2 = initializePhoneInput("phone2", "countrySelect2");
    
        function submitForm(event, phoneInput) {
            event.preventDefault();
            
            const form = $(event.target).closest('form');
            
            const phoneNumber = phoneInput.getNumber(); // Get formatted phone number
            const formData = form.serializeArray();
            formData.push({ name: 'phone', value: phoneNumber });
            
            $.ajax({
                url: "{{ route('inquiry.store') }}",
                type: 'POST',
                data: $.param(formData),
                success: function(response) {
                    Swal.fire('Success!', response.message, 'success');
                    form.trigger("reset");
                },
                error: function(error) {
                    Swal.fire('Error!', 'Something went wrong. Please try again.', 'error');
                }
            });
        }
    
        // Attach event listeners for each form button and pass the respective phone input instance
        $('#submitInquiry1').on('click', function(event) {
            submitForm(event, phoneInput1);
        });
    
        $('#submitInquiry2').on('click', function(event) {
            submitForm(event, phoneInput2);
        });
    </script>
    
    
@endsection
