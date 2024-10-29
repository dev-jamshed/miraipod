
@php
    use Illuminate\Support\Str;
@endphp

@extends('admin.layout.master_layout')

@section('tilte','About Us')

@section('content')
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">					
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>About</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{route('about.edit',['id'=>$data->id])}}" class="btn btn-primary">Edit About</a>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="container-	fluid">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-tools">
                                <div class="input-group input-group" style="width: 250px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                
                                    <div class="input-group-append">
                                      <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                      </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">								
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>											
                                        <th>Heading</th>
                                        <th>Content</th>
                                        <th>Image</th>
                                        <th>Actions	</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="order-detail.html">{{$data->id}}</a></td>
                                        <td>{{$data->title}}	</td>
                                        <td>{!! Str::limit($data->description, 30) !!}</td>
                                        <td><img src="{{asset($data->image)}}" class="img-thumbnail" width="100" ></td>


                                        <td>
                                            <a href="{{route('about.edit',['id'=>$data->id])}}">
                                                <svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </a>
                                        </td>																				
                                    </tr>
                                </tbody>
                            </table>										
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination m-0 float-right">
                              <li class="page-item"><a class="page-link" href="#">«</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        @section('customJs')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if(session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });		
        </script>
        @endif

    @endsection

@endsection





@extends('admin.layout.app')

@section('title','titlehere')

@section('content')

@endsection
@section('customJs')
 
@endsection