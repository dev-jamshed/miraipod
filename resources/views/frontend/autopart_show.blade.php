@extends('frontend.layouts.master_layout')
@section('styles')
<link rel="stylesheet" href="{{asset('frontend')}}/css/about.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/ez-plus@1.2.1/css/jquery.ez-plus.min.css">

<style>

.entry-summary img {

    width: 100%;
    height: auto;
    object-fit: cover;
    height: 300px;
}

 .sec_images > img{

    object-fit: cover;
    height: 110px;
    width: 110px;

 }

 .desc-sec{

    margin-top: 6rem;
 }
</style>
@endsection
@section('content')

 <!--================Post Gallery Slider Area =================-->
 <section class="about_image">
    <img class="img-fluid banner-img" src="{{asset('frontend')}}/images/banner1.jpg" alt="">
    <div class="overlay-text">
        <div>
            <h1>Auto Parts</h1>
            <p>Home / Auto Parts</p>
        </div>
    </div>
</section>
<!--================End Post Gallery Slider Area =================-->




<section class="clearfix arrival-area product">
    <div class="container prod_main" >
        
        <div class="row g-5">
            
       
  
            <div class="col-md-5 col-sm-12 col-xs-12 ">
                
                    <div class="summary entry-summary">
                        <div class="">
                            <div id="main_img_0" class="new_bg_image_overlay main-pic" style="display: block;">
                                <a data-fancybox="gallery" href="{{asset($data->img_1)}}">
                                    <img src="{{asset($data->img_1)}}" class="prdouct_lbox" alt="ALMOND">
                                  </a>
                              
                            </div>
                            
                                                            <div id="main_img_1" class=" main-pic" style="display: none;">
                                    <a data-fancybox="gallery" href="{{asset($data->img_2)}}">
                                    <img src="{{asset($data->img_2)}}" class="prdouct_lbox" alt="ALMOND">
                                  </a>
                                </div>
                                                            <div id="main_img_2" class=" main-pic" style="display: none;">
                                    <a data-fancybox="gallery" href="{{asset($data->img_3)}}">  
                                    <img src="{{asset($data->img_3)}}" class="prdouct_lbox" alt="ALMOND">
                                  </a>
                                </div>
                                                 
                        </div>    
                    </div>

                    
                     <div class="product_secondary_images  pd-thumbs  no-s">
                <ul class="view-pro-img" style="display: flex;
    gap: 10px;
    margin-top: 15px;">
                    
                    <li class="img_active" onclick="change_img_thumb(0)" id="prod_img_0">
                        <span>
                            <div class="product_secondary_images_container sec_images">
                                <img class="product_secondary_image_sm" alt="ALMOND" src="{{asset($data->img_1)}}">
                            </div>
                        </span>
                    </li>


                    @if ($data->img_2)
                        
                    
                    <li class="" onclick="change_img_thumb(1)" id="prod_img_1">
                        <span>
                            <div class="product_secondary_images_container sec_images">
                                <img class="product_secondary_image_sm" alt="ALMOND" src="{{asset($data->img_2)}}" >
                            </div>
                        </span>
                    </li>   
                    @endif



                    @if ($data->img_3)
                        

                    <li class="" onclick="change_img_thumb(2)" id="prod_img_2">
                        <span>
                            <div class="product_secondary_images_container sec_images">
                                <img class="product_secondary_image_sm" alt="ALMOND" src="{{asset($data->img_3)}}" >
                            </div>
                        </span>
                    </li>   
                    @endif
                                        
                </ul>
                
            </div>
            </div>
                
            
           
           
               <div class="col-md-7 col-sm-12 col-xs-12 my-quote">
                <div class="sec-title" >
                        
                    <h2 > {{$data->title}} </h2>
                </div>
<div class="product-detail-description">
    <div class="text">

        {{$data->short_description}} 

    </div> <br>
        
</div>


    <div class="btn-box">
        <a href="{{route('contact')}}" class="theme-btn btn-style-one">Inquiry</a>
    </div>
                 
                </div>
            
                
            </div>
            
  
      
    </div>
<div class="container desc-sec">
    <div>
        <div class="sec-title sec-title-md mb-3">
           
            <h2>Description</h2>
        </div>
        <div class="text">
        {!!$data->long_description!!} 
        </div>
       
    </div>
</div>
</section>




@endsection
@section('scripts')

<script>
    
    $(document).ready(function(){
       
            });

    function change_img_thumb(id){

      $('#prod_img_0').removeClass('img_active');
      $('#main_img_0').hide();
      
              $("#prod_img_1").removeClass('img_active');
        $('#main_img_1').hide();
              $("#prod_img_2").removeClass('img_active');
        $('#main_img_2').hide();
        

      $("#prod_img_"+id).addClass('img_active');
      $('#main_img_'+id).show();
    }

</script>
    
    
@endsection
