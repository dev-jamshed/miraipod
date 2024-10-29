<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend') }}/images/logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Miraipod</title>
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.min.css
    " rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>

    @yield('styles')

    <style>
        @media(max-width:992px) {
            .nav-mobile {
                display: block;
            }

            .header-none,
            .nav-none {
                display: none !important
            }
        }

        .side-banner-overlay {
            background: linear-gradient(165deg, black, rgba(0, 0, 0, 0.5), transparent);
            background-color: transparent !important;
        }
    </style>

    <style>
        side-banner-overlay {
            background: linear-gradient(165deg, black, rgba(0, 0, 0, 0.5), transparent);
            background-color: transparent !important;
        }

        @media (max-width: 576px) {



            .spec-container table {
                font-size: .85rem;
            }



            .spec-header {
                padding: 0px 10px;
                margin-bottom: 25px;
            }

            .spec-header h1 {
                font-size: 22px;
            }

            .spec-header button {
                font-size: .85rem;
                padding: 8px 15px;
            }

            .spec-flex {
                display: flex;
                gap: 10px;
            }

            .wrapper .mainImage {
                height: 250px;
            }

            .wrapper .thumbnail .thumbnailBox {
                height: 100%;
            }

            .wrapper .thumbnail {
                display: flex;
                overflow-x: auto;
                width: 100%;
                max-width: unset;
                height: 100px;
                display: flex;
                flex-direction: row;
                gap: 0px;
            }









            .cars-pagination {
                margin: 50px 0px 20px;

            }

            .footer-copyright {
                padding: 20px 15px;
            }

            .side-banner-overlay span {
                color: #ffffff;
            }

            .heading-header {
                padding: 0px 10px;
            }

            .car-card .detail-area {
                gap: 5px;
            }

            .color-black-bold {
                font-size: .7rem;
            }

            .car-card .text-area a {
                font-size: .8rem;
            }

            .fleet-filter-container {

                padding: 40px 23px;

            }

            footer h2 {

                margin-top: 2rem;
            }

            .footer-get-touch {
                padding-left: 2%;

            }

            .bottom-box {


                padding: 2.5rem;
            }

            .heading-header h2 {
                font-size: 22px;
            }

            .heading-header a {
                font-size: .95rem;
            }

            .side-banner img {
                width: 100%;
                height: 100%;
                object-fit: cover;

            }

            .side-banner {
                height: 200px;
            }

            .side-banner-overlay {
                padding-top: 0%;
                align-items: center;
            }

            .wrapper {

                flex-direction: column;
            }

            .wrapper .mainImage img {

                object-fit: cover;
                height: 280px;
            }


            .btn-box {

                margin-left: 75px;
            }

        }

        @media (min-width: 576px) and (max-width: 768px) {

            .footer-get-touch {
                padding-left: 0%;
                margin-top: 20px;
                margin-left: 9px;
            }

            .side-banner img {
                width: 100%;
                height: 100%;
                object-fit: cover;

            }

            .side-banner {

                height: 414px;
            }



            .heading-header h2 {
                font-size: 30px;

            }

            .wrapper {

                flex-direction: column;


            }

            .wrapper .mainImage img {

                object-fit: cover;
                height: 300px;
            }

        }
        
        .template-color-1 a {
    color: #ffffff;
}
.float {
     position: fixed;
    width: 60px;
    height: 60px;
    bottom: 60px;
    right: 40px;
    background-color: #25d366;
    color: #FFF;
    border-radius: 50px;
    text-align: center;
    font-size: 30px;
    box-shadow: 2px 2px 3px #999;
    z-index: 100;
    display: flex;
    align-items: center;
    justify-content: center;
}
    </style>


</head>

<body>
    <?php
    use Carbon\Carbon;
    ?>
    
    <a href="https://wa.me/818081553636" class="float">
<i class="fab fa-whatsapp my-float"></i>
</a>


    <header class="container header-none">

        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('frontend') }}/images/logo.png" alt="">
            </a>
        </div>

        <div class="search-bar">
            <form action="{{ route('searchFilter') }}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Search by keywords ">
                <button>
                    Search
                    <i class="fa-light fa-magnifying-glass"></i>
                </button>
            </form>
        </div>

        <div class="header-flex">

            <div class="login-btns">
                <i class="fa-light fa-user"></i>
                @if (Auth::check())
                    @php
                        $user = Auth::user();
                    @endphp
                    
                 
            
                    @if ($user->role_id == 1)
                        <p><a href="{{route('admin.banners.index')}}">Admin Dashboard</a></p>
                        @else
                        <p><a href="/profile">Profile</a></p>
                    @endif
                    
                @else
                    <p><a href="{{ route('register') }}">Sign up</a></p>
                    <span style="color: gray;"> | </span>
                    <p><a href="{{ route('login') }}">Login</a></p>
                @endif
                
                @if (Auth::check())
                @if(Auth::user()->role_id == 0)
                    <span style="color: gray;"> | </span>
                <p><a href="{{ route('inquiries.index') }}">My Inquiries</a></p>
                @endif
                @endif
                
            </div>
            
            </div>

            <div class="language-select">
                <i class="fa-light fa-globe"></i>
                <select class="form-select header-select" aria-label="Default select example">
                    <option selected>English</option>
                    <option value="1">Urdu</option>
                </select>
            </div>



            @php
                $currentCurrencyAmount = session('currencyAmount', '1');
                $currentCurrency = session('currency', 'USD');
                $currentCurrencyId = session('currencyId', '0');
            @endphp


            <form action="{{ route('setCurrency') }}" method="POST">
                @csrf
                <select class="form-select header-select" aria-label="Default select example" name="currency"
                    onchange="this.form.submit()">
                    <option value="0" {{ $currentCurrencyId == 0 ? 'selected' : '' }}>YEN</option>

                    @foreach (App\Models\Admin\ExchangeRate::all() as $exPrice)
                        <option value="{{ $exPrice->id }}"
                            {{ $currentCurrencyId == $exPrice->id ? 'selected' : '' }}>{{ $exPrice->currency }}
                        </option>
                    @endforeach
                </select>
            </form>

        </div>

    </header>

    <nav class="nav-none">
        <ul>
            <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
            <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
            </li>
            <li><a class="{{ request()->routeIs('car.show', 'filter.cars', 'filter-cars-web') ? 'active' : '' }}"
                    href="{{ route('filter.cars') }}">Used Cars </a></li>
            <li><a class="{{ request()->routeIs('autoparts', 'autoparts.show') ? 'active' : '' }}"
                    href="{{ route('autoparts') }}">Auto Parts</a></li>
            <li><a class="{{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">Faqs</a></li>
            <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact
                    Us</a></li>
        </ul>
    </nav>



    <div class="nav-mobile container">

        <div class="logo-m">
            <a href="{{ route('home') }}">
                <img src="{{ asset('frontend') }}/images/logo.png" alt="">
            </a>

            <div id="hamburger" class="hamburger">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>

        <hr class="hr-m">


        <div class="header-flex-m">

            <div class="login-btns">
                <i class="fa-light fa-user"></i>
                <p><a href="#">Sign up</a></p>
                <span style="color: gray;"> | </span>
                <p><a href="#">Login</a></p>
            </div>

            <div class="language-select">
                <i class="fa-light fa-globe"></i>
                <select class="form-select header-select" aria-label="Default select example">
                    <option selected>English</option>
                    <option value="1">Urdu</option>
                </select>
            </div>



            @php
                $currentCurrencyAmount = session('currencyAmount', '1');
                $currentCurrency = session('currency', 'USD');
                $currentCurrencyId = session('currencyId', '0');
            @endphp


            <form action="{{ route('setCurrency') }}" method="POST">
                @csrf
                <select class="form-select header-select" aria-label="Default select example" name="currency"
                    onchange="this.form.submit()">
                    <option value="0" {{ $currentCurrencyId == 0 ? 'selected' : '' }}>YEN</option>

                    @foreach (App\Models\Admin\ExchangeRate::all() as $exPrice)
                        <option value="{{ $exPrice->id }}"
                            {{ $currentCurrencyId == $exPrice->id ? 'selected' : '' }}>{{ $exPrice->currency }}
                        </option>
                    @endforeach
                </select>
            </form>

        </div>



        <div id="nav_link_m" class="nav-links-m">

            <div id="xmark" class="xmark">
                <i class="fa-solid fa-xmark"></i>
            </div>

            <div class="logo-navlinks-m">
                <img src="{{ asset('frontend') }}/images/logo.png" alt="">
            </div>

            <ul>
                <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li><a class="{{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About
                        Us</a></li>
                <li><a class="{{ request()->routeIs('car.show', 'filter.cars', 'filter-cars-web') ? 'active' : '' }}"
                        href="{{ route('filter.cars') }}">Used Cars </a></li>
                <li><a class="{{ request()->routeIs('autoparts', 'autoparts.show') ? 'active' : '' }}"
                        href="{{ route('autoparts') }}">Auto Parts</a></li>
                <li><a class="{{ request()->routeIs('faq') ? 'active' : '' }}" href="{{ route('faq') }}">Faqs</a>
                </li>
                <li><a class="{{ request()->routeIs('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>







    </div>

    @yield('content')


    <footer>

        <div class="footer-bg-image">
            <img src="{{ asset('frontend') }}/images/footer-backgorund.png" alt="">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-3 col-lg-2 col-6 ps-md-0 ps-5">
                    <h2>Quick Links</h2>
                    <ul>
                        <li><a href="{{ route('home') }}"><i class="fa-solid fa-angles-right"></i> Home</a></li>
                        <li><a href="{{ route('about') }}"><i class="fa-solid fa-angles-right"></i> About Us</a></li>
                        <li><a href="{{ route('filter.cars') }}"><i class="fa-solid fa-angles-right"></i> Used
                                Cars</a></li>
                        <li><a href="{{ route('autoparts') }}"><i class="fa-solid fa-angles-right"></i> Auto
                                Parts</a></li>
                        <li><a href="{{ route('faq') }}"><i class="fa-solid fa-angles-right"></i> Faqs</a></li>
                        <li><a href="{{ route('contact') }}"><i class="fa-solid fa-angles-right"></i> Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-lg-2 col-6">
                    <h2>Car Brands</h2>
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Toyota</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Nissan</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Honda</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Mazda</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Mitsubishi</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Subaru</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Suzuki</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-lg-2 col-6 ps-md-0 ps-5">
                    <h2>Car Type</h2>
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Wagon</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Hatchback</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Van</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Sedan</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> SUV</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Truck</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Coupe</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-lg-2 col-6">
                    <h2>Countries</h2>
                    <ul>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Japan</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Russia</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> USA</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> UAE</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> australia</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Truck</a></li>
                        <li><a href="#"><i class="fa-solid fa-angles-right"></i> Coupe</a></li>
                    </ul>
                </div>
                <!-- <div class="col-1"></div> -->
                <div class="col-md-3 col-lg-4 footer-get-touch ps-5">
                    <h2>Get In Touch</h2>
                    @php
                           $companyInfo = \App\Helpers\getCompanyInfo(); 
                        //    dd($companyInfo)
                    @endphp
            
                @if($companyInfo)
                <ul>
                <li><a href="#" style="color: white;"> <i class="fa-regular fa-phone-volume"></i> {{ $companyInfo->phone_1 }}</a></li>
                <li><a href="#" style="color: white;"> <i class="fa-regular fa-phone-volume"></i> {{ $companyInfo->phone_2 }}</a></li>
                <li><a href="#" style="color: white;"> <i class="fa-regular fa-envelope"></i> {{ $companyInfo->email_1 }}</a></li>
                <li><a href="#" style="color: white;"> <i class="fa-regular fa-envelope"></i> {{ $companyInfo->email_2 }}</a></li>
                <li><a href="#" style="color: white;"> <i class="fa-regular fa-location-dot"></i> {{ $companyInfo->office_address }}</a></li>
                @else
                    <li>No company information available.</li>
                @endif
                <ul>
                </div>
            </div>

        </div>
        <div class="footer-copyright">
            <div class="container pb-2">
                <hr>
            </div>

            All Rights Reserved © 2024 Miraipod I Powered By Diginotive.com
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script src="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.10.7/dist/sweetalert2.all.min.js
        "></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


    <script>
        let ul_m = document.getElementById('nav_link_m')
        let NavCloseBtn = document.getElementById('xmark')
        let NavOpenBtn = document.getElementById('hamburger')

        NavOpenBtn.addEventListener('click', () => {
            ul_m.classList.add('nav-links-m-left')
        })
        NavCloseBtn.addEventListener('click', () => {
            ul_m.classList.remove('nav-links-m-left')
        })

        $('.brand-slider').slick({
            slidesToShow: 8,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow: '<span class="next-arrow  arrow"><i class="fa-solid fa-chevron-right"></i></span>',
            prevArrow: '<span class="prev-arrow arrow"><i class="fa-solid fa-chevron-left"></i></span>',
            responsive: [

                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 6,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 3,
                        arrows:false
                    }
                },

            ],
        });
        $('.new-arrival-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow: '<span class="next-arrow arrow"><i class="fa-solid fa-chevron-right"></i></span>',
            prevArrow: '<span class="prev-arrow arrow"><i class="fa-solid fa-chevron-left"></i></span>',
            responsive: [

                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                    }
                },


            ],
        });


        // $(document).ready(function() {
        //     $('.fleet-filter-select').select2();
        // });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('scripts')

</body>

</html>
