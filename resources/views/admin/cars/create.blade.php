@extends('admin.layout.app')
@section('content')
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
                                                <option value=" {{ $bodyType->id }}"> {{ $bodyType->name }}</option>
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
                                        placeholder="chassis_no">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="model_grade">model_grade</label>
                                    <input type="text" name="model_grade" id="name" class="form-control"
                                        placeholder="model_grade">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="slug">Slug</label>
                                    <input readonly type="text" name="slug" id="slug" class="form-control"
                                        placeholder="Slug">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="engine_type">engine_type</label>
                                    <input type="text" name="engine_type" id="engine_type" class="form-control"
                                        placeholder="engine_type">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status">drive</label>
                                    <select name="drive" id="drive" class="form-control">
                                        <option value="RHS">RHS</option>
                                        <option  value="LHS">LHS</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="transmission">transmission</label>
                                    <select name="transmission" id="transmission" class="form-control">
                                        <option value="automatic">automatic</option>
                                        <option  value="manual">manual</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="condition">condition</label>
                                    <select name="condition" id="condition" class="form-control">
                                        <option value="new">New</option>
                                        <option  selected value="Used">Used</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color">color</label>
                                    <input type="text" name="color" id="color" class="form-control"
                                        placeholder="color">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="color">Year / Month</label>
                                    <input type="month" name="color" id="color" class="form-control" placeholder="color">

                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="doors">doors</label>
                                    <input type="number" name="doors" id="doors" class="form-control"
                                        placeholder="doors">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="seats">seats</label>
                                    <input type="number" name="seats" id="seats" class="form-control"
                                        placeholder="seats">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="m3">m3</label>
                                    <input type="number" name="m3" id="m3" class="form-control"
                                        placeholder="m3" step="0.01">
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fob_price">fob_price</label>
                                    <input type="number" name="fob_price" id="fob_price" class="form-control"
                                        placeholder="fob_price" step="0.01">
                                    <p></p>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="show_cnf_price">show_cnf_price</label>
                                    <select name="show_cnf_price" id="show_cnf_price" class="form-control">
                                        <option value="1">True</option>
                                        <option value="0">False</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="fuel">fuel</label>
                                    <input type="text" name="fuel" id="fuel" class="form-control"
                                        placeholder="fuel">
                                    <p></p>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="mileage">mileage</label>
                                    <input type="number" name="mileage" id="mileage" class="form-control"
                                        placeholder="mileage" step="0.01">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cc">cc</label>
                                    <input type="number" name="cc" id="cc" class="form-control"
                                        placeholder="cc" step="0.01">
                                    <p></p>
                                </div>
                            </div>

                            
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Block</option>
                                    </select>
                                    <p></p>
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
                    <button id="btn" class="btn btn-primary">Create</button>
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
                let name = document.getElementById('name').value;
                let slug = document.getElementById('slug').value;
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.cars.store') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        $('#btn').attr('disabled', false)
                        // if (response['status'] == true) {
                        //     window.location.href = " {{ route('admin.bodyType.index') }}"
                        //     $('#name').removeClass('is-invalid').siblings('p').removeClass(
                        //         'invalid-feedback').html("")
                        //     $('#slug').removeClass('is-invalid').siblings('p').removeClass(
                        //         'invalid-feedback').html("")
                        // } else {
                        //     let errors = response.errors
                        //     if (errors['name']) {
                        //         $('#name').addClass('is-invalid').siblings('p').addClass(
                        //             'invalid-feedback').html(errors['name'])
                        //     } else {
                        //         $('#name').removeClass('is-invalid').siblings('p').removeClass(
                        //             'invalid-feedback').html("")
                        //     }
                        //     if (errors['bodyType']) {
                        //         $('#category').addClass('is-invalid').siblings('p').addClass(
                        //             'invalid-feedback').html(errors['bodyType'])
                        //     } else {
                        //         $('#category').removeClass('is-invalid').siblings('p')
                        //             .removeClass(
                        //                 'invalid-feedback').html("")
                        //     }
                        //     if (errors['status']) {
                        //         $('#status').addClass('is-invalid').siblings('p').addClass(
                        //             'invalid-feedback').html(errors['status'])
                        //     } else {
                        //         $('#status').removeClass('is-invalid').siblings('p')
                        //             .removeClass(
                        //                 'invalid-feedback').html("")
                        //     }


                        //     if (errors['slug']) {
                        //         $('#slug').addClass('is-invalid').siblings('p').addClass(
                        //             'invalid-feedback').html(errors['slug'])
                        //     } else {
                        //         $('#slug').removeClass('is-invalid').siblings('p').removeClass(
                        //             'invalid-feedback').html("")
                        //     }
                        // }

                    }
                })
            })
        })


        //slug genrater
        $('#name').on('input', function() {
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
@endsection
