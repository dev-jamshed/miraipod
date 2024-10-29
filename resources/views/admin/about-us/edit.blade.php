@extends('admin.layout.master_layout')

@section('tilte','About Edit')

@section('content')
        
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">					
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update About</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{route('about.index')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('about.update',$data->id)}}" method="post" class="border p-3 w-100" enctype="multipart/form-data">
        @csrf
        <!-- Default box -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-body">								
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" value="{{$data->title}}" name="title" id="title" class="form-control" placeholder="About heading...">	
                                    </div>
                                </div>
                              


                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea  name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description">{!!$data->description!!}</textarea>
                                    </div>
                                </div>                                            
                            </div>
                        </div>	                                                                      
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2 class="h4 mb-3">Image</h2>								
                            <div class="mb-3">
                                <input type="file" name="image">
                            </div>
                            <div class="mb-3">
                                <img width="200px" src="{{asset($data->image)}}" alt="">
                            </div>
                        </div>	                                                                      
                    </div>

                </div>

            </div>
            
            <div class="pb-5 pt-3">
                <button class="btn btn-primary">Update</button>
                <a href="{{route('about.index')}}" class="btn btn-outline-dark ml-3">Cancel</a>
            </div>
        </div>
        <!-- /.card -->
        </form>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
