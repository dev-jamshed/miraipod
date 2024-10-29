@extends('admin.layout.app')

@section('title', 'Edit - Car')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">


                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                            <h4>Edit Car</h4>
                            <a href="{{ route('admin.bodyType.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <form id='subcategoryForm'>
                                @csrf
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Make</label>
                                            <select onchange="callToModel(this.value)" name="make_id" id="make_id"
                                                class="form-control" required>
                                                <option disabled selected>Select Make</option>
                                                @foreach ($makes as $make)
                                                    <option {{ $make->id == $car->make_id ? 'selected' : '' }}
                                                        value="{{ $make->id }}">{{ $make->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Model</label>
                                            <select name="model_id" id="model_id" class="form-control" required>
                                                <option selected disabled>Select Model</option>
                                            </select>
                                        </div>
                                    </div>





                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Model Grade</label>
                                            <input type="text" name="model_grade" id="model_grade"
                                                value="{{ $car->model_grade }}" class="form-control"
                                                placeholder="model_grade">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Year / Month</label>
                                            <input type="month" name="year_month" id="year" class="form-control"
                                                placeholder="Year / Month" value="{{ $car->year_month }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>FOB Price</label>
                                            <input type="number" name="fob_price" id="fob_price" class="form-control"
                                                placeholder="fob_price" value="{{ $car->fob_price }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Chassis No (Optional)</label>
                                            <input type="text" value="{{ $car->chassis_no }}" name="chassis_no"
                                                id="chassis_no" class="form-control" placeholder="Chassis no">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input readonly type="text" name="slug" id="slug"
                                                class="form-control" placeholder="Slug" value="{{ $car->slug }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Engine Type</label>
                                            <input type="text" name="engine_type" value="{{ $car->engine_type }}"
                                                id="engine_type" class="form-control" placeholder="engine_type">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>color</label>
                                            <input type="text" name="color" id="color" class="form-control"
                                                placeholder="color" value="{{ $car->color }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Doors</label>
                                            <input type="number" name="doors" value="{{ $car->doors }}" id="doors"
                                                class="form-control" placeholder="doors">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Seats</label>
                                            <input type="number" name="seats" id="seats" class="form-control"
                                                placeholder="seats" value="{{ $car->seats }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>M3</label>
                                            <input type="number" value="{{ $car->m3 }}" name="m3"
                                                id="m3" class="form-control" placeholder="m3">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fuel</label>
                                            <input type="text" name="fuel" value="{{ $car->fuel }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mileage</label>
                                            <input type="number" name="mileage" id="mileage" class="form-control"
                                                placeholder="mileage" value="{{ $car->mileage }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>cc</label>
                                            <input type="number" name="cc" class="form-control"
                                                value="{{ $car->cc }}">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Youtube Link</label>
                                            <input type="text" name="yt_link" class="form-control"
                                                value="{{ $car->yt_link }}" placeholder="yt_link...">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Body Type</label>
                                            <select name="body_type" id="category" class="form-control">
                                                <option value="">Please Select bodyType</option>
                                                @if ($bodyTypes->isNotEmpty())
                                                    {
                                                    @foreach ($bodyTypes as $bodyType)
                                                        <option {{ $car->body_type == $bodyType->id ? 'selected' : '' }}
                                                            value="{{ $bodyType->id }}"> {{ $bodyType->name }}</option>
                                                    @endforeach
                                                    }
                                                @endif

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Drive</label>
                                            <select name="drive" id="drive" class="form-control">
                                                <option {{ $car->drive == 'RHS' ? 'selected' : '' }} value="RHS">RHS
                                                </option>
                                                <option {{ $car->drive == 'LHS' ? 'selected' : '' }} value="LHS">LHS
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>wheels</label>
                                            <select name="wheels" id="wheels" class="form-control" required>
                                                <option value="2" {{ $car->wheels == 2 ? 'selected' : '' }}>2
                                                </option>
                                                <option value="4" {{ $car->wheels == 4 ? 'selected' : '' }}>4
                                                </option>
                                                <option value="6" {{ $car->wheels == 6 ? 'selected' : '' }}>6
                                                </option>
                                                <option value="8" {{ $car->wheels == 8 ? 'selected' : '' }}>8
                                                </option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Transmission</label>
                                            <select name="transmission" id="transmission" class="form-control" required>
                                                <!-- Loop through all transmissions fetched from the database -->
                                                @foreach ($transmissions as $transmission)
                                                    <option value="{{ $transmission->name }}"
                                                        @if ($car->transmission == $transmission->name) selected @endif>
                                                        {{ $transmission->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Condition</label>
                                            <select name="condition" id="condition" class="form-control">
                                                <option {{ $car->condition == 'new' ? 'selected' : '' }} value="new">
                                                    New</option>
                                                <option {{ $car->condition == 'Used' ? 'selected' : '' }} value="Used">
                                                    Used</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Show CNF Price</label>
                                            <select name="show_cnf_price" id="show_cnf_price" class="form-control">
                                                <option {{ $car->show_cnf_price == 1 ? 'selected' : '' }} value="1">
                                                    True</option>
                                                <option {{ $car->show_cnf_price == 0 ? 'selected' : '' }} value="0">
                                                    False</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Show Chassis No </label>
                                            <select name="showChassis" id="showChassis" class="form-control" required>
                                                <option {{ $car->showChassis == 1 ? 'selected' : '' }} value="1">True
                                                </option>
                                                <option {{ $car->showChassis == 0 ? 'selected' : '' }} value="0">
                                                    False</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Negotiation</label>
                                            <select name="negotiation" id="negotiation" class="form-control">
                                                <option {{ $car->negotiation == 1 ? 'selected' : '' }} value="1">True
                                                </option>
                                                <option {{ $car->negotiation == 0 ? 'selected' : '' }} value="0">
                                                    False</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Featured</label>
                                            <select name="featured" id="featured" class="form-control">
                                                <option {{ $car->featured == 1 ? 'selected' : '' }} value="1">True
                                                </option>
                                                <option {{ $car->featured == 0 ? 'selected' : '' }} value="0">False
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option {{ $car->status == 1 ? 'selected' : '' }} value="1">Active
                                                </option>
                                                <option {{ $car->status == 0 ? 'selected' : '' }} value="0">Block
                                                </option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="section-title">Car Image</div>
                                            <div class="custom-file">
                                                <input type="file" type="file" class="form-control"
                                                    accept=".jpg, .png, image/jpeg, image/png" multiple id="images"
                                                    name="images[]">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="row gx-2 gy-2" id="product-gallery">
                                            @foreach ($car->carImages as $img)
                                                <div class="col-lg-3 col-md-4 col-sm-6"
                                                    id="image-row-{{ $img->id }}">
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

                                </div>
                                <div class="card-footer text-left">
                                    <button id="btn" class="btn btn-primary mr-1" type="Update">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>




            </div>
        </div>
    </section>
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
                    url: "{{ route('admin.cars.update', $car->id) }}",
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

        var make_id = {{ $car->make_id }}
        callToModel(make_id)

        function callToModel(id) {

            let modelSelect = document.getElementById('model_id');
            $.ajax({
                url: '{{ route('admin.fetchModels') }}',
                method: 'POST',
                data: {
                    id: id
                }, // Pass id as an object
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    if (response.status !== 404 && response.data.length > 0) {
                        modelSelect.innerHTML = ''; // Clear existing options

                        response.data.forEach(value => {
                            let selected = ''
                            if (value.id == make_id) {
                                selected = 'selected'
                            }

                            modelSelect.innerHTML += `
                                <option ${selected} value="${value.id}">${value.name}</option>
                            `;
                        });
                    } else {
                        modelSelect.innerHTML = `
                            <option selected disabled>No Model Available</option>
                        `;
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
@endsection
