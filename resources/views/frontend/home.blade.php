@extends('frontend.layouts.master_layout')
@section('content')
@php
$currentCurrencyAmount = session('currencyAmount', '1');
$currentCurrency = session('currency', 'USD');
$currentCurrencyId = session('currencyId', '0');
@endphp

    <div class="container">
        <form action="{{route('filter-cars-web')}}" method="post">
            @csrf
            <section class="fleet-filter-container" style="padding-top:20px">
                <div class="filter-bg-image">
                    <img src="{{asset('frontend')}}/images/banner.png" alt="">
                </div>
                <div class="slogan">
                    <h1>Global  <span class="color_red">Vehicle </span> Export</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-3 col-md-4 col-6">
                        <select name="make" onchange="callToModel(this.value)"  class="form-select fleet-filter-select" id="make_id" aria-label="Default select example">
                            <option disabled selected>Make</option>
                            <option value="">All</option>
                            @foreach ($carMakes as $carMake )
                                <option value="{{$carMake->id}}">{{$carMake->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6 ">
                        <select name="model" id="model_id" class="form-select fleet-filter-select" aria-label="Default select example">
                            <option disabled selected>Model</option>
                                <option disabled>Please Select Make</option>
                        </select>
                    </div>

                 

                    <div class="col-lg-3 col-md-4 col-6 ">
                        <select name="bodytype" class="form-select fleet-filter-select" aria-label="Default select example">
                            <option disabled selected>Body Type</option>
                            <option value=''>All</option>
                            @foreach ($bodyTypes as $bodytype )
                                <option value="{{$bodytype->id}}">{{$bodytype->name}}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-lg-3 col-md-4 col-6 ">
                        <select name="color" class="form-select fleet-filter-select" aria-label="Default select example">
                            <option disabled selected>Color</option>
                            <option value=''>All</option>
                            @foreach ($carColors as $color )
                                <option value="{{$color}}">{{$color}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                    


                    <div name="transmission" class="col-lg-3 col-md-4 col-6 ">
                        <select class="form-select fleet-filter-select" aria-label="Default select example">
                            <option disabled selected>Transmission</option>
                            <option value=''>All</option>
                            @foreach ($transmissions as $transmission)
                            <option value="{{ $transmission->name }}">{{ $transmission->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                        <div class="col-lg-3 col-md-4 col-6 ">
                        <select name="steering" class="form-select fleet-filter-select" aria-label="Default select example">
                            <option disabled selected>Steering</option>
                            <option value=''>All</option>
                            <option value="RHS">RHS</option>
                            <option value="LHS">LHS</option>
                        </select> 
                    </div>
                    
                       <div class="col-lg-3 col-md-4 col-12 ">
                        <div class="year-range-container">
                            <select name="date_from" class="form-select fleet-filter-select" aria-label="Default select example"> 
                                <option disabled selected>Year From</option>
                                <option value=''>All</option>
                                @foreach ($carYears as $carYear )
                                    <option value="{{$carYear}}">{{$carYear}}</option>
                                @endforeach
                            </select>

                            <span>|</span>

                            <select name="date_to" class="form-select fleet-filter-select" aria-label="Default select example">
                                <option disabled selected>Year To</option>
                                <option value=''>All</option>
                                @foreach ($carYears as $carYear )
                                    <option value="{{$carYear}}">{{$carYear}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-4 col-12 ">
                        <div  class="year-range-container">
                            <select name="fob_price_from" class="form-select fleet-filter-select" aria-label="Default select example">
                                <option disabled selected>FOB From</option>
                                <option value=''>All</option>
                                @foreach ($carFobPrices as $fobPrice)
                                    <option value="{{$fobPrice}}">{{ $fobPrice * $currentCurrencyAmount  }}</option>
                                @endforeach

                            </select>

                            <span>|</span>

                            <select name="fob_price_to" class="form-select fleet-filter-select" aria-label="Default select example">
                                <option disabled selected>FOB To</option>
                                <option value=''>All</option>
                                @foreach ($carFobPrices as $fobPrice)
                                    <option value="{{$fobPrice}}">{{ $fobPrice * $currentCurrencyAmount  }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    
                                        <div class="col-lg-3 col-md-4 col-12 ">
                        <div  class="year-range-container">
                            <select name="cc_from" class="form-select fleet-filter-select" aria-label="Default select example">
                                <option disabled selected>CC From</option>
                                <option value=''>All</option>
                                @foreach ($carCC as $cc)
                                    <option value="{{$cc}}">{{$cc}}</option>
                                @endforeach

                            </select>

                            <span>|</span>

                            <select name="cc_to" class="form-select fleet-filter-select" aria-label="Default select example">
                                <option disabled selected>CC To</option>
                                <option value=''>All</option>
                                @foreach ($carCC as $cc)
                                    <option value="{{$cc}}">{{$cc}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 ">
                        <div class="year-range-container">
                            <select  name="mileage_from" class="form-select fleet-filter-select" aria-label="Default select example">
                                <option disabled selected>Mileage From</option>
                                <option value=''>All</option>
                                @foreach ($carMileages as $mileage )
                                    <option value="{{$mileage}}">{{$mileage}}</option>
                                @endforeach
                            </select>

                            <span>|</span>

                            <select name="mileage_to" class="form-select fleet-filter-select" aria-label="Default select example">
                                <option  disabled selected>Mileage To</option>
                                <option value=''>All</option>
                                @foreach ($carMileages as $mileage )
                                    <option value="{{$mileage}}">{{$mileage}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                    
                    


                

                    <div class="col-lg-3 col-md-4 col-6 ">
                        <select name="fuel" class="form-select fleet-filter-select" aria-label="Default select example">
                            <option disabled selected>Fuel</option>
                            <option value=''>All</option>
                            @foreach ($carFuels as  $fuel)
                                <option value="{{$fuel}}">{{$fuel}}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="col-lg-3 col-md-4 col-6 px-2">
                        <button type="submit"><i class="fa-light fa-magnifying-glass"></i>  Search </button>
                    </div>
                </div>
            </section>
        </form>
    </div>


    <section class="brand container ">
        <div class="brand-slider">
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/honda.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/Hyundai.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/mazda.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/Mitsbishi.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/nissan.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/honda.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/Hyundai.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/mazda.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/Mitsbishi.png" alt="">
            </div>
            <div class="brand-slide">
                <img src="{{asset('frontend')}}/images/brands/nissan.png" alt="">
            </div>
        </div>

        <hr>
    </section>

    <section class="used-cars container">

        <div class="heading-header">
            <h2>
                Used Cars
            </h2>
            <a href="{{route('filter.cars')}}">
                See All
                <i class="fa-regular fa-arrow-right-long"></i>
            </a>
        </div>

        <div class="row gy-5 ">
            <div class="col-md-3">
                <div class="side-banner">
                    <img src="{{asset('frontend')}}/images/side-banner.png" alt="">
                    <div class="side-banner-overlay">
                        <p>Find  Your Next <span> Adventure in</span> Our Pre-Owned <span> Selection.</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row gy-3 gx-1" >

                    @foreach($cars as $car)
                    <div class="col-md-6 col-lg-4 col-6" >
                          <a  href="{{route('car.show',['id' => $car->id])}}">
                            <div class="car-card">
                                <div class="img-area">
                                    @if($car->carImages->isNotEmpty())
                                    <img src="{{asset('images/car')}}/{{$car->carImages->first()->image }}" alt="">
                                @endif
                                </div>
                                <div class="text-area">
                                    
                                    
                                    <h4>@if($car->make != null) {{$car->make->name}} @endif @if($car->model != null) {{$car->model->name}} @endif {{\Carbon\Carbon::parse($car->year_month)->format('Y')}}</h4>
                                    <div class="detail-area">
                                        <p class="color-black-bold">Chasis No <span> xxxxx{{ substr($car->chassis_no, -4) }}</span></p>
                                        <p>|</p>
                                        <p class="color-black-bold">CC <span>{{$car->cc}}</span></p>
                                    </div>
                                    <a href="{{route('car.show',['id' => $car->id])}}">View Details <i class="fa-regular fa-arrow-right"></i></a>
                                </div>
                            </div>
                            </a>
                    </div>
          
                      
                    

                   
                    
                    <!--
                    <div class="col-md-6 col-lg-4">
                        <div class="car-card">
                            <div class="img-area">
                                <img src="{{asset('frontend')}}/images/cars/car-2.png" alt="">
                            </div>
                            <div class="text-area">
                                <h4>TOYOTA YARIS HYBRID 2021</h4>
                                <div class="detail-area">
                                    <p class="color-black-bold">Chasis No <span>0xxxxxx</span></p>
                                    <p>|</p>
                                    <p class="color-black-bold">CC <span>1300</span></p>
                                </div>
                                <a href="#">View Details <i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>-->

                    @endforeach   

                </div>
            </div>
        </div>

    </section>

    <section class="new-arrival container">
        <div class="heading-header">
            <h2>
                New Arrival
            </h2>
            <a href="{{route('filter.cars')}}">
                See All
                <i class="fa-regular fa-arrow-right-long"></i>
            </a>
        </div>


        <div class="new-arrival-slider">
            @foreach($newArrivalCars as $car)
            <div class="new-arival-slide mx-2">

                <a href="{{route('car.show',['id' => $car->id])}}">
                <div class="car-card">
                    <div class="img-area">
                        @if($car->carImages->isNotEmpty())
                        <img src="{{asset('images/car')}}/{{$car->carImages->first()->image }}" alt="">
                    @endif
                    </div>
                    <div class="text-area">
                        <h4>{{$car->make->name. ' ' . $car->model->name . ' ' . \Carbon\Carbon::parse($car->year_month)->format('Y')}}</h4>
                            <div class="detail-area">
                                    <p class="color-black-bold">Chasis No <span> xxxxx{{ substr($car->chassis_no, -4) }}</span></p>
                                    <p>|</p>
                                    <p class="color-black-bold">CC <span>{{$car->cc}}</span></p>
                            </div>
                        <a href="{{route('car.show',['id' => $car->id])}}">View Details <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
                </a>
               
            </div>
            @endforeach
            
            
            <!--
            <div class="new-arival-slide mx-2">
                <div class="car-card">
                    <div class="img-area">
                        <img src="{{asset('frontend')}}/images/cars/car-2.png" alt="">
                    </div>
                    <div class="text-area">
                        <h4>TOYOTA YARIS HYBRID 2021</h4>
                         <div class="detail-area">
                                    <p class="color-black-bold">Chasis No <span>0xxxxxx</span></p>
                                    <p>|</p>
                                    <p class="color-black-bold">CC <span>1300</span></p>
                                </div>
                        <a href="#">View Details <i class="fa-regular fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            -->
        </div>


    </section>

    <section class="featured-cars container">

        <div class="heading-header">
            <h2>
                Featured Cars
            </h2>
            <a href="{{route('filter.cars')}}">
                See All
                <i class="fa-regular fa-arrow-right-long"></i>
            </a>
        </div>

        <div class="row gy-5">

           
            <div class="col-md-3">
                <div class="side-banner">
                    <img src="{{asset('frontend')}}/images/side-banner-2.png" alt="">
                    <div class="side-banner-overlay">
                        <p>Find  Your Next <span> Adventure in</span> Our Pre-Owned <span> Selection.</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row gy-3 gx-1">
                    @forEach($featuredCars as $car)
                    <div class="col-6 col-lg-4">
                        <a href="{{route('car.show',['id' => $car->id])}}">
                        <div class="car-card">
                            <div class="img-area">
                                @if($car->carImages->isNotEmpty())
                                <img src="{{asset('images/car')}}/{{$car->carImages->first()->image }}" alt="">
                                @endif
                            </div>
                            <div class="text-area">
                                <h4>{{$car->make->name. ' ' . $car->model->name . ' ' . \Carbon\Carbon::parse($car->year_month)->format('Y')}}</h4>
                                <div class="detail-area">
                                    <p class="color-black-bold">Chasis No <span> xxxxx{{ substr($car->chassis_no, -4) }}</span></p>
                                    <p>|</p>
                                    <p class="color-black-bold">CC <span>{{$car->cc}}</span></p>
                                </div>
                                <a href="{{route('car.show',['id' => $car->id])}}">View Details <i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                        </a>
                    </div>

                    @endforeach

                   
                    
                   <!--
                    <div class="col-md-6 col-lg-4">
                        <div class="car-card">
                            <div class="img-area">
                                <img src="{{asset('frontend')}}/images/cars/car-2.png" alt="">
                            </div>
                            <div class="text-area">
                                <h4>TOYOTA YARIS HYBRID 2021</h4>
                                <div class="detail-area">
                                    <p class="color-black-bold">Chasis No <span>0xxxxxx</span></p>
                                    <p>|</p>
                                    <p class="color-black-bold">CC <span>1300</span></p>
                                </div>
                                <a href="#">View Details <i class="fa-regular fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>

    </section>

    @endsection
    @section('scripts')
   <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>


<script>
         function callToModel(id) {
            console.log(id);
            let modelSelect = document.getElementById('model_id');
            $.ajax({
                url: "{{ route('admin.fetchModels') }}",
                method: 'POST',
                data: { id: id }, // Pass id as an object
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.status !== 404 && response.data.length > 0) {
                        modelSelect.innerHTML = ''; // Clear existing options
                        modelSelect.innerHTML = `
                        <option selected disabled>Select Model</option>
                        <option value=''>All</option>
                        `; // Clear existing options
                        response.data.forEach(value => {
                            modelSelect.innerHTML += `
                                <option value="${value.id}">${value.name}</option>
                            `;
                        });
                    } else {
                        modelSelect.innerHTML = `
                            <option selected disabled>No Model Available</option>
                        `;
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        }

       

</script>
@endsection
