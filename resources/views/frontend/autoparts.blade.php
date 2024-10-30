@extends('frontend.layouts.master_layout')
@section('styles')
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/about.css">
    <style>
        .row.main-2 ul {
            display: block;
            margin-top: 30px;
        }

        .buttons a {
            background: #c90200;
            padding: 12px 40px;
            color: #fff;
            font-size: 17px;
        }

        .heading-header {
            text-align: center;
            display: block;
            /* border: unset !important; */
            !i;
            !;
        }

        .heading-header h2::after {
            display: none;
        }



        .heading-header h2 {
            text-transform: uppercase;
            font-family: sans-serif;

        }

        .buttons {
            padding-top: 30px;
        }

        .row.main-2 h4 {
            font-weight: 700;
            font-size: 21px;
            color: #084bb9;
        }

        .slider-img>img {
            display: block;
            object-fit: cover;
            height: 532px;
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
        }

        .row.main-2 {
            margin-top: 40px;
        }

        .row.main-2 h3 {
            font-weight: 700;
        }

        .row.main-auto img {
            margin: 0 auto;
            text-align: center;
            margin-bottom: 40px;
        }

        .row.main-auto {
            text-align: center;
        }

        .main-auto h2 {
            /* margin-bottom: 10px; */
        }

        section.inner-banner {
            padding-top: 10px;
        }

        .main-auto p {
            padding-bottom: 20px;
            max-width: 80%;
            text-align: center;
            margin: 0 auto;
            padding-bottom: 50px;
            padding-top: 20px;
        }

        .autopart-slider .next-arrow {
            right: -50px;

        }

        .autopart-slider .arrow {
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            z-index: 2;
            padding: 10px;
            position: absolute;
            font-size: 44px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: all .3s;
        }

        .autopart-slider .next-arrow {
            right: 10px;
        }

        .autopart-slider .prev-arrow {
            left: 10px;
        }

        .autopart-slider .arrow i {
            transition: all .3s;
        }

        .autopart-slider .arrow:hover i {
            color: var(--primary-color);
            transform: scale(1.2);
        }

        .img-area img {


            width: 100%;
            object-fit: cover;
            height: 199px;
            overflow: hidden;
        }


        .unavail {
            font-size: 1.2rem;
            font-weight: 500;
            margin-top: 50px;
            color: gray
        }


        .two-lines {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .col-md-6.col-xs-6 {
            max-width: 50%;
        }

        .short-des {
            padding: 10px;
        }

        .main-auto h2 {
            text-transform: uppercase;
            font-family: sans-serif;
        }

        .main-auto h3 {
            text-transform: uppercase;
            /* font-family: sans-serif; */
            color: #0a0ad8;
            padding-top: 40px;
            font-weight: 700;
        }





        @media(max-width:600px) {

            .main-auto h2 {
                font-size: 20px;
            }

            .main-auto p {
                max-width: 90%;
                font-size: 14px;
            }

            .row.main-2 h3 {
                font-size: 18px;
            }

            .row.main-2 h4 {
                font-size: 18px;
            }

            .row.main-2 li {
                margin-bottom: 40px;
            }

            .col-md-6.col-xs-6.sds {
                max-width: 100%;
            }

        }
    </style>
@endsection
@section('content')
    <!--================End Post Gallery Slider Area =================-->

    <section class="inner-banner">
        <img src="/frontend/images/autoparts/cars banner.jpg">
    </section>

    <section class="container pt-1">
        <div class="heading-header">
            <h2>
                Auto Parts
            </h2>

        </div>


        <div class="row main-auto">


            <div class="row main-auto">
                @foreach ($data as $item)
                    <div class="col-md-6 col-xs-6">
                        <div class="auto">
                            @if($item->img_1)
                                <img src="{{ asset($item->img_1) }}" alt="Image 1">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <div class="auto">
                            @if($item->img_2)
                                <img src="{{ asset($item->img_2) }}" alt="Image 2">
                            @endif
                        </div>
                    </div>
                    
                    {{-- Long Description --}}
                    <div>
                        {!! $item->long_description !!}
                    </div>
                @endforeach
            </div>
            

        </div>

        <div class="row main-2">
          {!! $AutoPartsDescription->description !!}

            <div class="buttons">
                <a href="/contact-us">Contact Now</a>
            </div>
        </div>

    </section>
@endsection





@section('scripts')
    <script>
        $('.responsive').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            nextArrow: '<span class="next-arrow  arrow"><i class="fa-solid fa-chevron-right"></i></span>',
            prevArrow: '<span class="prev-arrow arrow"><i class="fa-solid fa-chevron-left"></i></span>',
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    </script>
@endsection
