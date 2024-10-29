@extends('admin.layout.app')

@section('title', 'Fob')

@section('content')

@include('admin.message')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>F O B Prices </h4>
                <a class="btn btn-primary" href="{{ route('admin.fob.create') }}">New Make</a>
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
                                            <th class="text-center">
                                              #
                                            </th>
                                            <th>Min</th>
                                            <th>Max</th>
                                            <th colspan="2" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($fobs->isNotEmpty())
                                        @foreach ($fobs as $fob)
                                            <tr>
                                                <td class="text-center">{{ $fob->id }}</td>
                                                <td>{{ $fob->min_price }}</td>
                                                <td>{{ $fob->max_price }}</td>
                                                <td class="action-btns">
                                                    <a href="{{ route('admin.fob.edit', $fob->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                        <button type="submit" class="btn btn-danger"
                                                        onclick="deletefob({{$fob->id}})">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">
                                                Records Not Found
                                            </td>
                                        </tr>
                                    @endif

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
