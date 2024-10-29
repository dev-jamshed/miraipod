@extends('admin.layout.app')

@section('title','Cars - Create')

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
              <h4>Add Car</h4>
              <a href="{{ route('admin.autoparts.index') }}" class="btn btn-primary">Back</a>
            </div>
          </div>
        </div>


        <div class="col-12">
          <div class="card">
           
            <div class="card-body">
                <form action="{{route('admin.autoparts.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"
                            placeholder="Autopart Name..." required>
                        </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea name="short_description" required class="form-control" ></textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Long Description</label>
                            <textarea name="long_description" required class="summernote"></textarea>
                        </div>
                        </div>

                        
                        <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <div class="section-title">* Image 1 </div>
                            <div class="custom-file">
                                <input type="file" class="form-control"
                                    accept=".jpg, .png, image/jpeg, image/png" name="img_1" required>
                            </div>
                        </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <div class="section-title">Image 2</div>
                            <div class="custom-file">
                                <input type="file" class="form-control"
                                    accept=".jpg, .png, image/jpeg, image/png" name="img_2" >
                            </div>
                        </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <div class="section-title">Image 3 </div>
                            <div class="custom-file">
                                <input type="file" class="form-control"
                                    accept=".jpg, .png, image/jpeg, image/png" name="img_3" >
                            </div>
                        </div>
                        </div>



                    </div>
                    <div class="card-footer text-left">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
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



