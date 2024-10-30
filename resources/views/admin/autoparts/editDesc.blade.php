@extends('admin.layout.app')

@section('title', 'Autopart - Edit')

@section('content')

    <style>
        .note-editor.note-airframe .note-editing-area .note-editable,
        .note-editor.note-frame .note-editing-area .note-editable {
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

                        <div class="card-body">
                            <form action="{{ route('admin.autoparts.updateDesc', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label> Description</label>
                                            <textarea name="description" required class="summernote">{{ $data->description }}</textarea>
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
