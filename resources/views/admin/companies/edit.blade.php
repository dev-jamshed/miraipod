@extends('admin.layout.app')

@section('title', 'Company - Update')

@section('content')


@include('admin.message')
<section class="section">
    <div class="section-body">
        <form id="companyForm" enctype="multipart/form-data" method="POST" action="{{ route('admin.companies.update', $company->id) }}">
            @csrf
            @method('PUT') <!-- Ya 'PATCH' use kar sakte hain -->
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h4>Update Company</h4>
                            <a href="{{ route('admin.companies.edit',1) }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email 1</label>
                                        <input type="email" name="email_1" id="email_1" class="form-control" value="{{ $company->email_1 }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email 2</label>
                                        <input type="email" name="email_2" id="email_2" class="form-control" value="{{ $company->email_2 }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email 3</label>
                                        <input type="email" name="email_3" id="email_3" class="form-control" value="{{ $company->email_3 }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email 4</label>
                                        <input type="email" name="email_4" id="email_4" class="form-control" value="{{ $company->email_4 }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone 1</label>
                                        <input type="text" name="phone_1" id="phone_1" class="form-control" value="{{ $company->phone_1 }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone 2</label>
                                        <input type="text" name="phone_2" id="phone_2" class="form-control" value="{{ $company->phone_2 }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone 3</label>
                                        <input type="text" name="phone_3" id="phone_3" class="form-control" value="{{ $company->phone_3 }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone 4</label>
                                        <input type="text" name="phone_4" id="phone_4" class="form-control" value="{{ $company->phone_4 }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Office Address</label>
                                        <textarea name="office_address" id="office_address" class="form-control">{{ $company->office_address }}</textarea>
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
    $(document).ready(function () {
        $('#companyForm').submit(function (e) {
            $('#btn').attr('disabled', true);
            const data = new FormData(this);
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.companies.update', $company->id) }}",
                type: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('#btn').attr('disabled', false);
                    if (response.status) {
                        window.location.href = "{{ route('admin.companies.edit',1) }}";
                    } else {
                        let errors = response.errors;
                        if (errors.email_1) {
                            $('#email_1').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.email_1);
                        } else {
                            $('#email_1').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }
                        if (errors.phone_1) {
                            $('#phone_1').addClass('is-invalid').siblings('p').addClass('invalid-feedback').html(errors.phone_1);
                        } else {
                            $('#phone_1').removeClass('is-invalid').siblings('p').removeClass('invalid-feedback').html("");
                        }
                        // Aap aur errors yahan par add kar sakte hain agar aapne aur fields add ki hain
                    }
                }
            });
        });
    });
</script>
@endsection
