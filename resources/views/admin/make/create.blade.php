


@extends('admin.layout.app')

@section('title','Make - Create')

@section('content')
<section class="section">
    <div class="section-body">
        <form action="{{ route('admin.make.store') }}" method="POST">
            @csrf
            <div class="row">


                <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                    <h4>Create Make</h4>
                    <a href="#" class="btn btn-primary">Back</a>
                    </div>
                </div>
                </div>


                <div class="col-12">
                <div class="card">
                
                    <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Make Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter make name" required>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Make Slug</label>
                            <input type="text" readonly class="form-control" id="slug" name="slug" placeholder="Enter Slug">
                        
                        </div>
                        </div>
                    
                    
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control" id="">
                                <option value="1">Active</option>
                                <option value="0">Blocked</option>
                            </select>
                        </div>
                        </div>

                    
                        
                        <div class="col-md-12">
                        <div class="form-group">
                            <div class="section-title">Make Image</div>
                            <div class="custom-file">
                                <input type="file" type="file" class="form-control" accept=".jpg, .png, image/jpeg, image/png"
                                multiple id="images" name="images[]">
                            <label class="custom-file-label" for="images">Choose Images </label>
                            </div>
                        </div>
                        </div>

                    </div>
                    <div class="card-footer text-left">
                        <button id="btn" class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>

                </div>
                </div>




            </div>
        </form>
    </div>
  </section>
@endsection

@section('customJs')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var nameInput = document.getElementById('name');
            var slugInput = document.getElementById('slug');

            if (nameInput && slugInput) {
                nameInput.addEventListener('input', function() {
                    var title = this.value;

                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', "{{ route('generateSlug') }}?title=" + encodeURIComponent(title), true);
                    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                var response = JSON.parse(xhr.responseText);
                                if (response.status === true) {
                                    slugInput.value = response.slug;
                                }
                            }
                        }
                    };
                    xhr.send();
                });
            } else {
                console.error('Input element not found.');
            }
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
    </script>
@endsection