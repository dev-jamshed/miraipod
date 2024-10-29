
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

