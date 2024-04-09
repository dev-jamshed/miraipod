@extends('admin.layout.app')

@section('title', 'Cars List')

@section('content')
    @include('admin.message')
    <br>
    <br>
    <br>
    <h2>Cars List</h2>
    <a href="{{ route('admin.cars.create') }}" class="btn btn-success">Create Car</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Stock ID</th>
                <th>Model Grade</th>
                <th>Engine Type</th>
                <th>Drive</th>
                <th>Body Type</th>
                <th>Transmission</th>
                <th>Condition</th>
                <th>Color</th>
                <th>Year/Month</th>
                <th>M3</th>
                <th>Seats</th>
                <th>FOB Price</th>
                <th>Show CNF Price</th>
                <th>Fuel</th>
                <th>Mileage</th>
                <th>CC</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->stock_id }}</td>
                    <td>{{ $car->model_grade }}</td>
                    <td>{{ $car->engine_type }}</td>
                    <td>{{ $car->drive }}</td>
                    <td>{{ $car->body_type }}</td>
                    <td>{{ $car->transmission }}</td>
                    <td>{{ $car->condition }}</td>
                    <td>{{ $car->color }}</td>
                    <td>{{ $car->year_month }}</td>
                    <td>{{ $car->m3 }}</td>
                    <td>{{ $car->seats }}</td>
                    <td>{{ $car->fob_price }}</td>
                    <td>{{ $car->show_cnf_price }}</td>
                    <td>{{ $car->fuel }}</td>
                    <td>{{ $car->mileage }}</td>
                    <td>{{ $car->cc }}</td>
                    <td>
                        @if (isset($car->status))
                            @if ($car->status == true)
                                <svg class="text-success" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            @else
                                <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
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
                    <td>
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
@endsection
