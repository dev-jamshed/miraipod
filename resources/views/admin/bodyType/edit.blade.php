@extends('admin.layout.app')

@section('title','Body Type - Edit')

@section('content')
<section class="section">
    <div class="section-body">
      <div class="row">


        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3 ">
              <h4>Edit Body Type</h4>
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
                            <label>Name</label>
                            <input type="text" value="{{ $bodyType->name }}" name="name" id="name" class="form-control" required>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Slug</label>
                            <input  readonly type="text" value="{{ $bodyType->name }}" name="slug" id="slug" class="form-control" required>
                        </div>
                        </div>

                    
                    
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" value="1"
                                    {{ $bodyType->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" value="1"
                                    {{ $bodyType->status == 0 ? 'selected' : '' }}>Block</option>
                            </select>
                        </div>
                        </div>



                        <div class="col-md-12">
                        <div class="form-group">
                            <div class="section-title">Car Image</div>
                            <div class="custom-file">
                            <input type="file" class="custom-file-input" id="images"  accept=".jpg, .png, image/jpeg, image/png" multiple name="images[]"  required>
                            <label class="custom-file-label" for="images">Choose Images </label>
                            </div>
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
                                            value="{{ $img->id }}" required>
                                        <a onclick="deleteOldImage({{ $img->id }})"
                                            class="img-delte-btn">Delete</a>
                                    </div>
                                </div>
                                @endforeach
                
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-left">
                        <button id="btn" class="btn btn-primary mr-1" type="submit">Update</button>
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
    