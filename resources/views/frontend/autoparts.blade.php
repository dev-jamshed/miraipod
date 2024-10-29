@extends('frontend.layouts.master_layout')
@section('styles')
<link rel="stylesheet" href="{{asset('frontend')}}/css/about.css">
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
    /* border: unset !important; */!i;!;
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
    .slider-img > img {
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

    .autopart-slider .next-arrow{
        right:-50px;

    }

    .autopart-slider .arrow{
    color: white;
    display: flex;
    align-items: center;
    justify-content:center ;
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
.autopart-slider .next-arrow{
    right: 10px;
}
.autopart-slider .prev-arrow{
    left: 10px;
}
.autopart-slider .arrow i{
transition: all .3s;
}
.autopart-slider .arrow:hover i{
   color: var(--primary-color);
   transform: scale(1.2);
}

.img-area img{

    
    width: 100%;
    object-fit: cover;
    height: 199px;
   overflow: hidden;
}


  .unavail{
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

.short-des{
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
<!--<div class="container autopart-slider mb-5 mt-3">-->
<!--<div class="responsive">-->
<!--    <div class="slider-img ">-->

<!--        <img src="{{asset('frontend')}}/images/pic4.jpg" alt="" class="img-fluid  ">-->
<!--    </div>-->
<!--    <div class="slider-img">-->
<!--        <img src="{{asset('frontend')}}/images/pic5.jpg" alt="" class="img-fluid  " >-->
<!--    </div>-->
<!--    <div class="slider-img"><img src="{{asset('frontend')}}/images/pic6.jpg" alt="" class="img-fluid  "></div>-->
<!--  </div>-->
<!--  </div>-->
 <!--================Post Gallery Slider Area =================-->
 
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


        <!--@forelse ($data as $item)-->
                   
        <!--    <div class="col-md-6 col-lg-3">-->
        <!--        <a href="{{route('autoparts.show',['id' => $item->id])}}" >-->
        <!--        <div class="car-card">-->
        <!--            <div class="img-area">-->
        <!--                <img src="{{asset($item->img_1)}}" alt="">-->
        <!--            </div>-->
        <!--            <div class="text-area">-->
        <!--                <h4>{{$item->title}}</h4>-->
        <!--                <div class="detail-area">-->
                            <!--<p class="two-lines short-des text-black">{{$item->title}}</p>-->
        <!--                </div>-->
        <!--                <a href="{{route('autoparts.show',['id' => $item->id])}}" >View Details <i class="fa-regular fa-arrow-right"></i></a>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        </a>-->
        <!--    </div>-->
         
        <!--@empty-->

        <!--<p class="unavail">Sorry, currently there are no cars available.</p>-->
            
        <!--@endforelse-->
        
        <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/post 1 .jpg">
            </div>
        </div>
        <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/photos 4.jpg">
            </div>
        </div>
        
        <h2>ARE YOU LOOKING TO IMPORT JAPANESE SPARE PARTS IN YOUR COUNTRY! </h2>
        <p>then your search ends here. Miraipod Co, Ltd. also a reputed name of supplying used auto spares of all Japanese model to the Spare Parts dealer worldwide. With an experience of 15 years of supplying Auto Spares to many countries we can surely help you grow into Auto Parts industry.</p>
  <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/photos 6 .jpg">
            </div>
        </div>
        <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/post 3.jpg">
            </div>
        </div>
        
        <p>Miraipod Co, Ltd. offers container shipments of used Japanese parts. In particular, we offer cars in the form of half-cuts and nose-cuts, used cars and trucks engines. The cars for half-cuts and nose-cuts are usually purchased at car auctions, from insurance companies or from private car stocks.</p>


<h2>Ours specialized Team will make sure that you receive all the required parts in break free and in good condition.</h2>

<h3>HALF CUTS :</h3>
<p>We can cut vehicles in Half Cuts and fit approximately 14-17 half cuts with all parts inside a 40Ft Container. Haplf cut vehicles can be cut from the bottom edge of the windscreen of the vehicle or with and withoutroof. Depending on the requirements of client and market.</p>

 <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/photos 5 .jpg">
            </div>
        </div>
        <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/post 2.jpg">
            </div>
        </div>
        
        
        
        <h3>NOSE CUT: </h3>
<p>We can cut vehicles in Nose cuts and fit them in container for you. Approximately 25 -35 Nose Cuts can be loaded in 40Ft. Container with all other parts of the vehicle depending on the size. All nose cuts will be packed in foams and carpets to avoid any damage during shipment</p>

 <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/PHOTOS 9.jpg">
            </div>
        </div>
        <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/PHOTOS 10 .jpg">
            </div>
        </div>
        
        
        
              <h3>COMPLETE KNOCKDOWN:  </h3>
<p>We also offer complete knockdown vehicles inside the container. This will reduce dead stock in your showroom, we can fit approximately 45 to 60 units in a 40 ft container depending on the size of vehicle</p>
<div class="col-md-3">
    </div>
 <div class="col-md-6 col-xs-6 sds">
            <div class="auto">
                <img src="/frontend/images/autoparts/PHOTOS 11.jpg">
            </div>
        </div>
      <div class="col-md-3">
    </div>
    
    <p>We have specialized team to design your container packaging and make sure that you get maximum parts inside the container as we believe that Japanese air does not sell. Our packaging team has a vast experience in packing the container carefully so nothing breaks while your shipment is in transit.</p>
    <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/PHOTOS 7.jpg">
            </div>
        </div>
        <div class="col-md-6 col-xs-6">
            <div class="auto">
                <img src="/frontend/images/autoparts/PHOTOS 8.jpg">
            </div>
        </div>
        <p>If you are looking to import a container please feel free to contact us and our parts specialist will directly call you to discuss and design the container.</p>
    
        
        
</div>

<div class="row main-2">
    <h3>PROCEDURE OF ORDERING A CONTAINER:</h3>
    <ul>
        <li>
            <h4>1.	REQUEST A QUOTATION</h4>
            <p>Once you know the vehicle after speaking to our team we can issue a quotation with FOB prices of each unit.</p>
        </li>
        <li>
            <h4>2.	DEPOSIT</h4>
            <p>Upon receiving the quotation, we are required a deposit of 50% of the invoice value to confirm the order.</p>
        </li>
        <li>
            <h4>3.	PURCHASE</h4>
            <p>Once the order is confirmed we will search and purchase your units across all auctions and yards in Japan to make sure the quality is not compromised. This procedure usually takes 2-3 weeks</p>
        </li>
        <li>
            <h4>4.	CUTTING AND PACKAGING</h4>
            <p>Once purchase is done our dedicated team will start cutting and packing each vehicle with labels. We will stay in touch with you more frequently to update you with the progress and ask you any question we may have. This procedure usually takes 4-5 days depending the amount of vehicles</p>
            
        </li>
        <li>
            <h4>5.	CONTAINER LOADING AND PAPERWORK</h4>
            <p>Now its time to load the container. Our team will keep you posted through messages and pictures about your container loading. Once the container is loaded and deliver to the shipping lines we will arrange the Bill of Landing for you and send you the documents via DHL or FEDEX.</p>
        </li>
    </ul>
    
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
  nextArrow:'<span class="next-arrow  arrow"><i class="fa-solid fa-chevron-right"></i></span>',      
    prevArrow:'<span class="prev-arrow arrow"><i class="fa-solid fa-chevron-left"></i></span>',
  responsive: [
    {
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
