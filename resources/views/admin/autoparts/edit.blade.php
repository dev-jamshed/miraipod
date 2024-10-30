@extends('admin.layout.app')

@section('title','Autopart - Edit')

@section('content')

<style>
.note-editor.note-airframe .note-editing-area .note-editable, .note-editor.note-frame .note-editing-area .note-editable {
    padding: 50px 10px 10px 10px;
    overflow: auto;
    word-wrap: break-word;
}
</style>

<section class="section">
    <div class="section-body">
      <div class="row">

        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between py-3 ">
              <h4>Edit Car</h4>
              <a href="{{ route('admin.autoparts.index') }}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
           
            <div class="card-body">
                <form action="{{route('admin.autoparts.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="row">
                        
                      <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="section-title">    Image 1 </div>
                            <div class="custom-file">
                                <input type="file" class="form-control"
                                    accept=".jpg, .png, image/jpeg, image/png" name="img_1">
                                <img src="{{ asset($data->img_1) }}" alt="Image 1" class="img-thumbnail mt-2" style="max-width: 100px;">
                            </div>
                        </div>
                        </div>

                        <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <div class="section-title">Image 2</div>
                            <div class="custom-file">
                                <input type="file" class="form-control"
                                    accept=".jpg, .png, image/jpeg, image/png" name="img_2">
                                    @if ($data->img_2)
                                    <img src="{{ asset($data->img_2) }}" alt="Image 2" class="img-thumbnail mt-2" style="max-width: 100px;">
                                    @endif
                            </div>
                        </div>
                        </div>

                        {{-- <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <div class="section-title">Image 3 </div>
                            <div class="custom-file">
                                <input type="file" class="form-control"
                                    accept=".jpg, .png, image/jpeg, image/png" name="img_3">
                                    @if ($data->img_3)
                                    <img src="{{ asset($data->img_3) }}" alt="Image 3" class="img-thumbnail mt-2" style="max-width: 100px;">
                                    @endif
                            </div>
                        </div>
                        </div> --}}

                        {{-- <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $data->title }}"
                            placeholder="Autopart Name..." required>
                        </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="short_description" required class="form-control">{{ $data->short_description }}</textarea>
                        </div>
                        </div> --}}

                        <div class="col-md-12">
                        <div class="form-group">
                            <label> Description</label>
                            <textarea name="long_description" required class="summernote">{{ $data->long_description }}</textarea>
                        </div>
                        </div>

                    

                    </div>
                    <div class="card-footer text-left">
                        <button class="btn btn-primary mr-1" type="submit">Update</button>
                    </div>
                </form>

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
@section('customJs')

@endsection
