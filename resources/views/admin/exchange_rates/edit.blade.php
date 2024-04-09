@extends('admin.layout.app')
@section('content')
    {{-- @php
    print_r($categories);
    die();
@endphp --}}
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit exchange_rates</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.exchange_rates.index') }}" class="btn btn-primary">Back</a>
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
                                    <input type="text" value="{{ $exchangeRate->currency }}" name="currency" id="currency"
                                        class="form-control" placeholder="currency">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Slug</label>
                                    <input value="{{ $exchangeRate->rate }}" type="number" name="rate"
                                        id="rate" class="form-control" placeholder="rate" step="0.01">
                                    <p></p>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>

                </div>
                <div class="pb-5 pt-3">
                    <button id="btn" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.exchange_rates.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
                let currency = document.getElementById('currency').value;
                let rate = document.getElementById('rate').value;
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.exchange_rates.update', $exchangeRate->id) }}",
                    type: 'PUT',
                    data: data,
                    success: function(response) {
                        $('#btn').attr('disabled', false)
                        if (response['status'] == true) {
                            window.location.href = " {{ route('admin.exchange_rates.index') }}"
                            $('#currency').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("")
                            $('#rate').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("")
                        } else {
                            let errors = response.errors
                            if (errors['currency']) {
                                $('#currency').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['currency'])
                            } else {
                                $('#currency').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }

                            if (errors['rate']) {
                                $('#rate').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['rate'])
                            } else {
                                $('#rate').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }

                        }

                    }
                })
            })
        })
    </script>
@endsection
