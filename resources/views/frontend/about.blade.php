@extends('frontend.layouts.master_layout')
@section('styles')
<link rel="stylesheet" href="{{asset('frontend')}}/css/about.css">
@endsection
@section('content')

 <!--================Post Gallery Slider Area =================-->
 <section class="about_image">
    <img class="img-fluid banner-img" src="{{asset('frontend')}}/images/footer-backgorund.png" alt="">
    <div class="overlay-text">
        <div>
            <h1>About</h1>
            <p>Home / About</p>
        </div>
    </div>
</section>
<!--================End Post Gallery Slider Area =================-->







<section class="about-section">
    <div class="container">
        <div class="row">
            <div class="content-column col-lg-6 col-md-12 col-sm-12 order-2">
                <div class="inner-column">
                    <div class="sec-title" >
                        <!-- <span class="title">About Us</span> -->
                        <h2 >Welcome to MiraiPod</h2>
                    </div>
                    <div class="text">
                     Your one-stop destination for purchasing premium Japanese cars and exporting them to customers worldwide. We specialize in sourcing high-quality vehicles directly from Japan, ensuring that you get the best selection at competitive prices.
                    </div>
                    <div class="text">
                       With years of experience in the automotive industry, we have built a reputation for excellence and reliability. Our team of experts carefully inspects each vehicle to ensure that it meets our stringent standards for quality and performance.
                    </div>
                    <div class="text">
                       At MiraiPod, customer satisfaction is our top priority. We strive to provide you with a seamless buying experience, from browsing our extensive inventory to arranging for shipping to your desired location. Whether you're looking for a fuel-efficient compact car or a rugged off-road vehicle, we have the perfect car to suit your needs.
                    </div>
                    <div class="btn-box">
                        <a href="{{route('contact')}}" class="theme-btn btn-style-one">Contact Now</a>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                    <figure class="image-1">
                        <a href="#" class="lightbox-image" data-fancybox="images">
                            <img title="Balam image" src="{{asset('frontend')}}/images/banner3.jpg" alt="">
                        </a>
                    </figure>
                </div>
            </div>

        </div>

        <div class="padding-left-5">
            <div class="sec-title sec-title-md">
                <span class="title">Our Commitment</span>
                <h2>Quality and Innovation</h2>
            </div>
            <div class="text">
               At MiraiPod, we are dedicated to offering innovative solutions and exceptional quality in every aspect of our business. We are constantly refining our processes and services to surpass the expectations of our customers.
            </div>
            <div class="text">
               Our team is committed to crafting each transaction with meticulous attention to detail and a focus on excellence. We strive to be at the forefront of innovation and technology, ensuring that our customers have access to the finest Japanese cars available.
            </div>
            <div class="text">
               We invite you to explore our inventory and discover the excellence of MiraiPod. Thank you for choosing MiraiPod for your Japanese car purchase and export needs.
            </div>
        </div>
    </div>
   </section>


@endsection
