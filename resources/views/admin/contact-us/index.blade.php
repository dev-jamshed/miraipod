@php
    use Illuminate\Support\Str;
@endphp
@extends('admin.layout.master_layout')

@section('tilte','Blog Edit')

@section('content')


		<!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">					
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Contact Us</h1>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr id="rowId{{$item->id}}">
                                        <td><a href="order-detail.html">{{$item->id}}</a></td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->message}}</td>
                                        
                                        <td>
                                            <a onClick="getDelete({{$item->id}})" class="text-danger w-4 h-4 mr-1">
                                                <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path	ath fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                  </svg>
                                            </a>
                                        </td>																				
                                    </tr>
                                    @endforeach
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
       




            			@section('customJs')
				<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
				
				<script>
						function getDelete(id){
							$.ajax({
								url: "{{route('project.destroy')}}",
								type: 'POST',
								data: {
									id:id,
									_token: '{{ csrf_token() }}' // This is used for CSRF protection
								},
								success: function(response) {
									let row = document.getElementById(`rowId${id}`)
									row.remove();
									console.log(response)
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
										icon: "success",
										title: response.message
									});

									
								},
								error: function(xhr, status, error) {
									var errorMessage = xhr.responseJSON.message;
									alert('Error: ' + errorMessage);
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
										icon: "error",
										title: response.message
									});
									
								}
							});
						}
				</script>

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