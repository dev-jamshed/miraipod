

@extends('admin.layout.app')

@section('title', 'Cars')

@section('content')

@include('admin.message')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Cars</h4>
                <a class="btn btn-primary" href="{{ route('admin.cars.create') }}">New Cars</a>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                         
                                            <th>ID</th>
                                            <th>Stock ID</th>
                                            <th>Model Grade</th>
                                          
                                            <th>Drive</th>
                                            <th>chassis_no</th>
                                            <th>Transmission</th>
                                          
                                            <th>Color</th>
                                         
                                           
                                         
                                      
                                           
                                            <th>Fuel</th>
                                            <th>Mileage</th>
                                            <th>CC</th>
                                            <th>Status</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cars as $car)
                                        <tr >
                                         
                                            <td>{{ $car->id }}</td>
                                            <td>{{ $car->stock_id }}</td>
                                            <td>{{ $car->model_grade }}</td>
                                           
                                            <td>{{ $car->drive }}</td>
                                            <td>{{ $car->chassis_no ?? 'N/A' }}</td>
                                            <td>{{ $car->transmission }}</td>
                                            
                                            <td>{{ $car->color }}</td>
                                         
                                           
                                          
                                          
                                          
                                            <td>{{ $car->fuel }}</td>
                                            <td>{{ $car->mileage }}</td>
                                            <td>{{ $car->cc }}</td>
                                            <td >
                                                @if (isset($car->status))
                                                    @if ($car->status == true)
                                                        <svg class="text-success tick-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                    @else
                                                        <svg class="text-danger tick-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                                                            </path>
                                                        </svg>
                                                    @endif
                                                @else
                                                    <!-- Handle case where status field is not set -->
                                                    Status Not Set
                                                @endif
                                            </td>
                                            <td class="action-btns">
                                                <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-primary">Edit</a>
                                                <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('customJs')

@endsection
