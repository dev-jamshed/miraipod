@extends('admin.layout.app')
@section('content')
    <style>
        a {
            cursor: pointer;
        }

        .flex {
            gap: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .colorimage {
            width: 90px;
            margin: 2px;
        }

        .colorimage-row {
            /* border: .5px solid gray; */
            border-radius: 5px;
            padding: 10px 0px !important
        }

        #product-gallery {
            margin: 20px 0px !important;
            margin-bottom: 40px !important;
            border: 1px solid #afa6a6;
            border-radius: 10px;
            padding: 20px;
        }

        .dropzoneimg {
            /* margin: 20px 5px!important; */
            margin-bottom: 21px !important;
            border: 1px solid #afa6a6;
            border-radius: 10px;
            padding: 10px 20px;
        }

        .dropzoneimg .card-body {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0px !important;
            padding-top: 8px !important;
        }

        .img-delte-btn {
            background: #ef020263;
            padding: 8px;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all .2s;
            cursor: pointer;
        }

        .img-delte-btn:hover {
            color: white !important;
            background-color: #f10017;
        }
    </style>

    {{-- {{$categories.id}} --}}

    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create bodyType</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.bodyType.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <form id='subcategoryForm'>
            @csrf
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="name">bodyType</label>
                                    <select name="body_type" id="category" class="form-control">
                                        <option value="">Please Select bodyType</option>
                                        @if ($bodyTypes->isNotEmpty())
                                            {
                                            @foreach ($bodyTypes as $bodyType)
                                                <option {{$car->body_type ==$bodyType->id ? 'selected' : ''  }} value=" {{ $bodyType->id }}"> {{ $bodyType->name }}</option>
                                            @endforeach
                                            }
                                        @endif

                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="chassis_no">chassis_no</label>
                                    <input type="text" name="chassis_no" id="chassis_no" class="form-control"
                                        placeholder="chassis_no" value="{{$car->chassis_no}}">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="model_grade">model_grade</label>
                                    <input type="text" name="model_grade" id="model_grade" class="form-control"
                                        placeholder="model_grade" value="{{$car->model_grade}}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input readonly type="text" name="slug" id="slug" class="form-control"
                                        placeholder="Slug" value="{{$car->slug}}">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="engine_type">engine_type</label>
                                    <input type="text" name="engine_type" id="engine_type" class="form-control"
                                        placeholder="engine_type"  value="{{$car->engine_type}}">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status">drive</label>
                                    <select name="drive" id="drive" class="form-control">
                                        <option  {{ $car->drive == 'RHS' ? 'selected' : '' }} value="RHS">RHS</option>
                                        <option {{ $car->drive == 'LHS' ? 'selected' : '' }}  value="LHS">LHS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="transmission">transmission</label>
                                    <select name="transmission" id="transmission" class="form-control">
                                        <option {{ $car->transmission == 'automatic' ? 'selected' : '' }} value="automatic">automatic</option>
                                        <option {{ $car->transmission == 'manual' ? 'selected' : '' }} value="manual">manual</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="condition">condition</label>
                                    <select name="condition" id="condition" class="form-control">
                                        <option {{ $car->condition == 'new' ? 'selected' : '' }} value="new">New</option>
                                        <option {{ $car->condition == 'Used' ? 'selected' : '' }} value="Used">Used</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color">color</label>
                                    <input type="text" name="color" id="color" class="form-control"
                                        placeholder="color"  value="{{$car->color}}">
                                    <p></p>
                                </div>
                            </div>  
                            {{-- {{$car->year}} --}}

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="year">Year / Month</label>
                                    <input type="date" name="year" id="year" class="form-control"
                                        placeholder="Year / Month"  value="{{$car->year_month}}">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="doors">doors</label>
                                    <input type="number" name="doors" id="doors" class="form-control"
                                        placeholder="doors"  value="{{$car->doors}}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="seats">seats</label>
                                    <input type="number" name="seats" id="seats" class="form-control"
                                        placeholder="seats"  value="{{$car->seats}}">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="m3">m3</label>
                                    <input type="number" name="m3" id="m3" class="form-control"
                                        placeholder="m3" step="0.01" value="{{$car->m3}}" >
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fob_price">fob_price</label>
                                    <input type="number" name="fob_price" id="fob_price" class="form-control"
                                        placeholder="fob_price" step="0.01"  value="{{$car->fob_price}}">
                                    <p></p>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="show_cnf_price">show_cnf_price</label>
                                    <select name="show_cnf_price" id="show_cnf_price" class="form-control">
                                        <option {{ $car->show_cnf_price == 1 ? 'selected' : '' }} value="1">True</option>
                                        <option  {{ $car->show_cnf_price == 0 ? 'selected' : '' }} value="0">False</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fuel">fuel</label>
                                    <input type="text" name="fuel" id="fuel" class="form-control"
                                        placeholder="fuel"  value="{{$car->fuel}}">
                                    <p></p>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mileage">mileage</label>
                                    <input type="number" name="mileage" id="mileage" class="form-control"
                                        placeholder="mileage" step="0.01" value="{{$car->mileage}}">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cc">cc</label>
                                    <input type="number" name="cc" id="cc" class="form-control"
                                        placeholder="cc" step="0.01" value="{{$car->cc}}">
                                    <p></p>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option  {{ $car->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option  {{ $car->status == 0 ? 'selected' : '' }} value="0">Block</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label>Car Image</label>
                                    <input type="file" type="file" class="form-control"
                                        accept=".jpg, .png, image/jpeg, image/png" multiple id="images"
                                        name="images[]">
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="row gx-2 gy-2" id="product-gallery">
                                    @foreach ($car->carImages as $img)
                                    <div class="col-lg-3 col-md-4 col-sm-6" id="image-row-{{ $img->id }}">
                                        <div class="dropzoneimg p-2">
                                            <img src="{{ asset('/images/car/' . $img->image) }}"
                                                class="card-img-top product_image" alt="...">

                                            <input readonly type="text" hidden name="[]"
                                                value="{{ $img->id }}">
                                            <a onclick="deleteOldImage({{ $img->id }})"
                                                class="img-delte-btn">Delete</a>
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status">Show On Home</label>
                                    <select name="showOnHome" id="status" class="form-control" id="">
                                        <option value="Yes">Yes</option>
                                        <option selected value="No">No</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>


                </div>
                <div class="pb-5 pt-3">
                    <button id="btn" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.bodyType.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
        </form>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('customJs')
    <script>
        $(document).ready(function() {
            $('#subcategoryForm').submit('click', function(e) {
                $('#btn').attr('disabled', true)
                const data = $(this).serializeArray()
                let name = document.getElementById('model_grade').value;
                let slug = document.getElementById('slug').value;
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.cars.update',$car->id) }}",
                    type: 'PUT',
                    data: data,
                    success: function(response) {
                        $('#btn').attr('disabled', false)
                        if (response['status'] == true) {
                            window.location.href = " {{ route('admin.cars.index') }}"
                        } else {
                            let errors = response.errors
                         
                            if (errors['body_type']) {
                                $('#category').addClass('is-invalid').next('p').addClass(
                                    'invalid-feedback').html(errors['body_type']);
                            } else {
                                $('#category').removeClass('is-invalid').next('p').removeClass(
                                    'invalid-feedback').html("");
                            }


                            if (errors['chassis_no']) {
                                $('#chassis_no').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['chassis_no'])
                            } else {
                                $('#chassis_no').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }
                            if (errors['model_grade']) {
                                $('#model_grade').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['model_grade'])
                            } else {
                                $('#model_grade').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }


                            if (errors['slug']) {
                                $('#slug').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['slug'])
                            } else {
                                $('#slug').removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html("")
                            }

                        }


                    }
                })
            })
        })


        //slug genrater
        $('#model_grade').on('input', function() {
            element = $(this)
            tittle = element.val()
            $.ajax({
                url: "{{ route('generateSlug') }}",
                type: 'GET',
                data: {
                    title: element.val()
                },
                success: function(response) {
                    if (response['status'] == true) {
                        $('#slug').val(response['slug'])
                    }
                }
            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#images').change(function() {

                var formData = new FormData();
                var files = $(this)[0].files;

                // Append each file to the FormData object
                for (var i = 0; i < files.length; i++) {
                    formData.append('images[]', files[i]);
                }
                document.getElementById("btn").disabled = true;

                $.ajax({
                    url: '{{ route('admin.temp-images-create') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $("#image_id").val(response.image_id);
                    },
                    success: function(response) {
                        document.getElementById("btn").disabled = false;
                        // Handle success response

                        console.log(response);
                        response.images.forEach(element => {

                            let html = `
                            <div class="col-lg-3 col-md-4 col-sm-6  " id="image-row-${element.image_id}">
                            <div class="dropzoneimg p-2" >
                            <img src="${element.image_path}"  class="card-img-top product_image" alt="...">
                            <input readonly type="text" hidden name="images_array[]" value="${element.image_id}">
                            <div class="card-body">
                            <a onclick="deleteImae(${element.image_id})" class="img-delte-btn">Delete</a>
                            </div>
                            </div>
                            </div>
                            `;
                            $('#product-gallery').append(html)

                        });

                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                    }
                });
            });
        });



        function deleteImae(id) {
            $('#image-row-' + id).remove();
        }
        function deleteOldImage(id) {
            $.ajax({
                url: "{{ route('admin.delete_item_image') }}",
                type: 'POST',
                data: {
                    id: id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response)
                    if (response['status'] == true) {
                        $('#image-row-' + id).remove();
                    }
                }
            })
        }
    </script>
@endsection
