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
                                <table class="table table-striped table-bordered" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 5%;">#</th>
                                            {{-- <th>Title</th> --}}
                                            {{-- <th>Short Description</th> --}}
                                            <th style="width: 40%;">Description</th>
                                            <th style="width: 20%;">Image</th>
                                            <th class="text-center" style="width: 15%;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                {{-- <td>{{ $item->title }}</td> --}}
                                                {{-- <td>{{ $item->short_description }}</td> --}}
                                                <td>
                                                    <p>{{ Str::limit(strip_tags($item->long_description), 450) }}</p>
                                                </td>
                                                
                                                <td class="text-center">
                                                    <img src="{{ asset($item->img_1) }}" alt="Image" class="img-thumbnail" style="max-width: 150px;">
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.autoparts.edit', $item->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>
                                                    <a href="{{ route('admin.autoparts.destroy', $item->id) }}" class="btn btn-danger btn-sm" 
                                                       onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                
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
