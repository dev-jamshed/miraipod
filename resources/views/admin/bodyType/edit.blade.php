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
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit bodyType</h1>
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


                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{ $bodyType->name }}" name="name" id="name"
                                        class="form-control" placeholder="Name">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Slug</label>
                                    <input readonly value="{{ $bodyType->name }}" type="text" name="slug"
                                        id="slug" class="form-control" placeholder="Slug">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" value="1"
                                            {{ $bodyType->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" value="1"
                                            {{ $bodyType->status == 0 ? 'selected' : '' }}>Block</option>
                                    </select>
                                    <p></p>
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="showOnHome">Show On Home</label>
                                    <select name="showOnHome" id="status" class="form-control" id="">
                                        <option value="Yes" {{($subCategory->showOnHome=='Yes') ? 'selected' : ''}}>Yes</option>
                                        <option value="No" {{($subCategory->showOnHome=='No') ? 'selected' : ''}} >No</option>
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Car Image</label>
                            <input type="file" type="file" class="form-control" accept=".jpg, .png, image/jpeg, image/png"
                                multiple id="images" name="images[]">
            
            
            
                        </div>
            
                    </div>
            
                    <div class="col-12">
                        <div class="row gx-2 gy-2" id="product-gallery">
                            @foreach ($bodyType->typeImages as $img)
                            <div class="col-lg-3 col-md-4 col-sm-6" id="image-row-{{ $img->id }}">
                                <div class="dropzoneimg p-2">
                                    <img src="{{ asset('/images/bodyType/' . $img->image) }}"
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
                let name = document.getElementById('name').value;
                let slug = document.getElementById('slug').value;
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.bodyType.update', $bodyType->id) }}",
                    type: 'PUT',
                    data: data,
                    success: function(response) {
                        $('#btn').attr('disabled', false)
                        if (response['status'] == true) {
                            window.location.href = " {{ route('admin.bodyType.index') }}"
                            $('#name').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("")
                            $('#slug').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("")
                        } else {
                            let errors = response.errors
                            if (errors['name']) {
                                $('#name').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['name'])
                            } else {
                                $('#name').removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html("")
                            }

                            if (errors['status']) {
                                $('#status').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['status'])
                            } else {
                                $('#status').removeClass('is-invalid').siblings('p')
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
