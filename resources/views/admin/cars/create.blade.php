@extends('admin.layout.app')

@section('title', 'Cars - Create')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">


                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                            <h4>Add Car</h4>
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
                                                    <option value="{{ $make->id }}">{{ $make->name }}</option>
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
                                            <input type="text" name="model_grade" id="model_grade" class="form-control"
                                                required placeholder="Model Grade...">
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Year / Month</label>
                                            <input type="month" name="year_month" id="year_month" class="form-control"
                                                placeholder="Year / Month" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>FOB Price</label>
                                            <input type="number" name="fob_price" id="fob_price" class="form-control"
                                                placeholder="Fob Price..." required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Chassis No (Optional)</label>
                                            <input type="text" name="chassis_no" id="chassis_no" class="form-control"
                                                placeholder="Chassis no...">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input readonly type="text" name="slug" id="slug"
                                                class="form-control" placeholder="Slug" required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Engine Type</label>
                                            <input type="text" name="engine_type" id="engine_type" class="form-control"
                                                placeholder="Engine Type..." required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>color</label>
                                            <input type="text" name="color" id="color" class="form-control"
                                                placeholder="Color..." required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Doors</label>
                                            <input type="number" name="doors" id="doors" class="form-control"
                                                placeholder="Doors..." required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Seats</label>
                                            <input type="number" name="seats" id="seats" class="form-control"
                                                placeholder="Seats..." required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>M3</label>
                                            <input type="number" name="m3" id="m3" class="form-control"
                                                placeholder="M3..." required>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fuel</label>
                                            <select name="fuel" id="fuel" class="form-control" required>
                                                <option disabled>Select Fuel</option>
                                                <option value="Petrol">Petrol</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="Gasoline">Gasoline</option>
                                                <option value="Hybrid">Hybrid</option>
                                                <option value="LPG">LPG</option>
                                                <option value="Electric">Electric</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mileage</label>
                                            <input type="number" name="mileage" id="mileage" class="form-control"
                                                placeholder="Mileage..." required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CC</label>
                                            <input type="number" name="cc" class="form-control"
                                                placeholder="cc..." required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Youtube Link</label>
                                            <input type="text" name="yt_link" class="form-control"
                                                placeholder="yt_link...">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Body Type</label>
                                            <select name="body_type" id="category" class="form-control" required>
                                                <option value="">Please Select bodyType</option>
                                                @if ($bodyTypes->isNotEmpty())
                                                    {
                                                    @foreach ($bodyTypes as $bodyType)
                                                        <option value=" {{ $bodyType->id }}"> {{ $bodyType->name }}
                                                        </option>
                                                    @endforeach
                                                    }
                                                @endif

                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Drive</label>
                                            <select name="drive" id="drive" class="form-control" required>
                                                <option value="RHS">RHS</option>
                                                <option value="LHS">LHS</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>wheels</label>
                                            <select name="wheels" id="wheels" class="form-control" required>
                                                <option value="2">2</option>
                                                <option value="4">4</option>
                                                <option value="6">6</option>
                                                <option value="8">8</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Transmission</label>
                                            <select name="transmission" id="transmission" class="form-control" required>
                                                <!-- Loop through all transmissions fetched from the database -->
                                                @foreach ($transmissions as $transmission)
                                                    <option value="{{ $transmission->name }}">{{ $transmission->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Condition</label>
                                            <select name="condition" id="condition" class="form-control" required>
                                                <option value="new">New</option>
                                                <option selected value="Used">Used</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Show CNF Price</label>
                                            <select name="show_cnf_price" id="show_cnf_price" class="form-control"
                                                required>
                                                <option value="1">True</option>
                                                <option value="0">False</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Show Chassis No </label>
                                            <select name="showChassis" id="showChassis" class="form-control" required>
                                                <option value="1">True</option>
                                                <option value="0">False</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Negotiation</label>
                                            <select name="negotiation" id="negotiation" class="form-control" required>
                                                <option value="1">True</option>
                                                <option value="0">False</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Featured</label>
                                            <select name="featured" id="featured" class="form-control" required>
                                                <option value="1">True</option>
                                                <option value="0">False</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="1">Active</option>
                                                <option value="0">Block</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="section-title">Car Image</div>
                                            <div class="custom-file">
                                                <input type="file" type="file" class="form-control"
                                                    accept=".jpg, .png, image/jpeg, image/png" multiple id="images"
                                                    name="images[]" required>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="row gx-2 gy-2" id="product-gallery">


                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-left">
                                    <button id="btn" class="btn btn-primary mr-1" type="submit">Submit</button>
                                </div>
                            </form>

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
                    url: "{{ route('admin.cars.store') }}",
                    type: 'POST',
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


        $('#model_id').on('input', function() {
            let model = $(this).find('option:selected').text();
            let make = $('#make_id').find('option:selected').text();
            let element = make + '-' + model;
            console.log(element);
            $.ajax({
                url: "{{ route('generateSlug') }}",
                type: 'GET',
                data: {
                    title: element
                },
                success: function(response) {
                    if (response.status === true) {
                        $('#slug').val(response.slug);
                    }
                }
            });
        });
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


        function callToModel(id) {
            console.log(id);
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
                        modelSelect.innerHTML = `
                        <option selected disabled>Select Model</option>
                        `; // Clear existing options
                        response.data.forEach(value => {
                            modelSelect.innerHTML += `
                                <option value="${value.id}">${value.name}</option>
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
