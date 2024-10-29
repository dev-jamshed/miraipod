@extends('admin.layout.app')

@section('title', 'Transmission - Update')

@section('content')
<section class="section">
    <div class="section-body">
        <form id='transmissionForm' enctype="multipart/form-data" method="POST" action="{{ route('admin.transmission.update', $transmission->id) }}">
            @csrf
            @method('PUT') <!-- Ya 'PATCH' use kar sakte hain -->
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                            <h4>Update Transmission</h4>
                            <a href="{{ route('admin.transmission.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ $transmission->name }}" required>
                                    </div>
                                </div>
                                <!-- Aap yahan par aur fields bhi add kar sakte hain jaise slug ya status agar zaroorat ho -->
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
    $(document).ready(function () {
        $('#transmissionForm').submit(function (e) {
            $('#btn').attr('disabled', true);
            const data = new FormData(this);
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.transmission.update', $transmission->id) }}",
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#btn').attr('disabled', false);
                    if (response.status) {
                        window.location.href = "{{ route('admin.transmission.index') }}";
                    } else {
                        let errors = response.errors;
                        if (errors.name) {
                            $('#name').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.name);
                        } else {
                            $('#name').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }
                        // Aap aur errors yahan par add kar sakte hain agar aapne aur fields add ki hain
                    }
                }
            });
        });
    });
</script>
@endsection
