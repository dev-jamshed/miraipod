@extends('frontend.layouts.master_layout')
@section('content')
@php
$currentCurrencyAmount = session('currencyAmount', '1');
$currentCurrency = session('currency', 'USD');
$currentCurrencyId = session('currencyId', '0');
@endphp
@section('styles')
<style>
  .cars-pagination .prev-btn.hidden,
.cars-pagination .next-btn.hidden {
    display: none;
}
.unavail{
    font-size: 1.2rem;
    font-weight: 500;
    margin-top: 50px;
    color: gray
}
</style>
@endsection


<div class="container">
    <form id="filter-form" action="{{ route('filter-cars-web') }}" method="post">
        @csrf
        <section class="fleet-filter-container">
                <div class="filter-bg-image">
                    <img src="{{asset('frontend')}}/images/banner.png" alt="">
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

<section class="cars-container">
    <div class="container">
        <div class="heading-header">
            <p>
                @if(isset($searchTerm))
                Search : {{$searchTerm}}
                @else
                {{!empty( $oldReq ) ? 'Filterd Cars' : 'All Cars'}}
                @endif
            </p>
            <a>
                <span id="carsCount"> {{ $cars->total() }}      </span> Cars Found
            </a>
        </div>

        <div class="row gy-3 gx-1" id="cars-list">

            @forelse ($cars as $car)
            <div class="col-lg-3 col-md-4 col-6">
                <a href="{{ route('car.show',['id' => $car->id]) }}">
                    <div class="car-card">
                    <div class="img-area">
                        @if($car->carImages->isNotEmpty())
                            <img src="{{ asset('images/car') }}/{{ $car->carImages->first()->image }}" alt="">
                        @endif
                    </div>
                    <div class="text-area">
                        <h4>{{ $car->make->name . ' ' . $car->model->name . ' ' . \Carbon\Carbon::parse($car->year_month)->format('Y') }}</h4>
        
                        <div class="detail-area">
                            <p class="color-black-bold">Chassis No <span> xxxxx{{ substr($car->chassis_no, -4) }}</span></p>
                            <p>|</p>
                            <p class="color-black-bold">CC <span>{{ $car->cc }}</span></p>
                        </div>
        
                        <a href="{{ route('car.show',['id' => $car->id]) }}">View Details <i class="fa-regular fa-arrow-right"></i></a>
        
                    </div>
                </div>
                </a>
            </div>
            @empty
            <p class="unavail">Sorry, currently there are no cars available.</p>
            @endforelse
    

        </div>


        <div class="cars-pagination" id="pagination">
            @if ($cars->lastPage() > 1)
                @if ($cars->currentPage() != 1)
                    <a href="{{ $cars->previousPageUrl() }}" class="prev-btn">
                        <button><i class="fa-solid fa-chevron-left"></i></button>
                    </a>
                @else
                    <span class="prev-btn hidden">
                        <button><i class="fa-solid fa-chevron-left"></i></button>
                    </span>
                @endif
                @for ($i = 1; $i <= $cars->lastPage(); $i++)
                    <a href="{{ $cars->url($i) }}" class="pagination-pages {{ ($cars->currentPage() == $i) ? 'pg-active' : '' }}">
                        <button>{{ $i }}</button>
                    </a>
                @endfor
                @if ($cars->currentPage() != $cars->lastPage())
                    <a href="{{ $cars->nextPageUrl() }}" class="next-btn">
                        <button><i class="fa-solid fa-chevron-right"></i></button>
                    </a>
                @else
                    <span class="next-btn hidden">
                        <button><i class="fa-solid fa-chevron-right"></i></button>
                    </span>
                @endif
            @endif
        </div>
        
        

       
    </div>
</section>

@section('scripts')
<script>

    $('.new-arrival-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        nextArrow:'<span class="next-arrow arrow"><i class="fa-solid fa-chevron-right"></i></span>',
        prevArrow:'<span class="prev-arrow arrow"><i class="fa-solid fa-chevron-left"></i></span>',
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
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                }
            }
        ],
    });

    </script>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script>
    <script>

    var model_id = "{{ isset($oldReq['model']) && !empty($oldReq['model']) ? $oldReq['model'] : '' }}";

    function callToModel(id) {
        console.log(id);
        console.log(model_id);
        let selected = '';
        let modelSelect = document.getElementById('model_id');
        $.ajax({
            url: '{{ route('admin.fetchModels') }}',
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
                        if(value.id == model_id){
                            selected = 'selected';
                        } else {
                            selected = '';
                        }
                        modelSelect.innerHTML += `
                            <option ${selected} value="${value.id}">${value.name}</option>
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


    @if (isset($oldReq['make']) && $oldReq['make'])
    document.addEventListener('DOMContentLoaded', () => {
        callToModel("{{ $oldReq['make'] }}");
    });
    @endif

    $(document).ready(function() {
    function fetchCars(page) {
        var formData = $('#filter-form').serializeArray();
        formData.push({ name: 'page', value: page });

        $.ajax({
            url: '{{ route('filter-cars-web') }}',
            method: 'POST',
            data: $.param(formData),
            success: function(response) {
                $('#cars-list').html(response.carsHtml);
                $('#pagination').html(response.pagination);
                $('#carsCount').html(response.carsCount);
                bindPaginationLinks();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function bindPaginationLinks() {
        $('.cars-pagination a').on('click', function(event) {
            event.preventDefault();
            var page = $(this).data('page');
            fetchCars(page);
        });
    }

    bindPaginationLinks();

    $('#filter-form').on('submit', function(event) {
        event.preventDefault();
        fetchCars(1);
    });
});



</script>





@endsection


@endsection

