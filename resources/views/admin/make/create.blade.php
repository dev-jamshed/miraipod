@extends('admin.layout.app')

@section('title', 'Create make')

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
    <h2>Create make</h2>
    <form action="{{ route('admin.make.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">make Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter make name">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">make Slug</label>
            <input type="text" readonly class="form-control" id="slug" name="slug" placeholder="Enter Slug">
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


            </div>
        </div>

        {{-- <div class="col-md-12"> --}}
        <div class="mb-3">
            <label for="status">status</label>
            <select name="status" id="status" class="form-control" id="">
                <option value="1">Active</option>
                <option value="0">Blocked</option>
            </select>
        </div>
        {{-- </div> --}}
        <button type="submit" id="btn" class="btn btn-primary">Submit</button>
    </form>
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
