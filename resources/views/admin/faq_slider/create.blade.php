@extends('admin.layout.app')

@section('title','Faq Sliders ')

@section('content')

    <section class="section">
      <div class="section-body">
        <form class="needs-validation" action="{{ route('admin.faqs.sliders.update') }}" method="post"
            novalidate="" enctype="multipart/form-data">
            @csrf
            <div class="row">


                <div class="col-12">
                    <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                        <h4>Faq Sliders </h4>
                        {{-- <a href="#" class="btn btn-primary">Back</a> --}}
                    </div>
                    </div>
                </div>


                <div class="col-12">
                    <div class="card">
                    
                    <div class="card-body">
                        <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                            <div class="section-title">Slider Image</div>
                            <div class="custom-file">
                                <input type="file" type="file" class="custom-file-input"
                                accept=".jpg, .png, image/jpeg, image/png" multiple id="images"
                                name="images[]" required>
                                <label class="custom-file-label" for="images">Choose Images </label>
                            </div>
                            </div>
                        </div>



                        <div class="col-12">
                            <div class="row gx-2 gy-2" id="product-gallery">
                                @foreach ($banner_images as $img)
                                    <div class="col-lg-3 col-md-4 col-sm-6" id="image-row-{{ $img->id }}">
                                        <div class="dropzoneimg p-2">
                                            <img src="{{ asset('/images/faq_slider/' . $img->image) }}"
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
                        <button id="btn" class="btn btn-primary mr-1" type="submit">Update</button>
                        </div>
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
                url: "{{ route('admin.faqs.sliders.delete') }}",
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

