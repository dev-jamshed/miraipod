@extends('admin.layout.app')

@section('title', 'Cars')

@section('content')

@include('admin.message')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Autoparts</h4>
                <a class="btn btn-primary" href="{{ route('admin.autoparts.create') }}">New AutoPart</a>
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

                                            <th>Title</th>
                                            <th>Short Description</th>
                                            <th>Long Description</th>
                                            <th>Img</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $item)
                                        <tr >
                                            <td  class="text-center">{{ $index+1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->short_description }}</td>
                                            <td>{!! $item->long_description !!}</td>
                                            <td> <img width="200px" class="img-fluid" src="{{ asset($item->img_1) }}" alt=""> </td>
                                           
                                            <td class="action-btns">
                                                <a href="{{ route('admin.autoparts.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                                                <a href="{{ route('admin.autoparts.destroy', $item->id) }}" class="btn btn-danger">Delete</a>
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
