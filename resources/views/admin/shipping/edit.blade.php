
@extends('admin.layout.app')

@section('title','Shipping - Edit')

@section('content')
<section class="section">
    <div class="section-body">
        @include('admin.message')
        <form method="GET" id="shippingForm">
            <div class="row">
                @csrf

                <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                    <h4>Add Shipping </h4>
                    <a href="{{route('admin.shipping.index')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
                </div>


                <div class="col-12">
                <div class="card">
                
                    <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Port</label>
                            <input type="text" value="{{ $shippingCharge->port }}" name="port" id="port" placeholder="Port"
                            class="form-control" required>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" value="{{ $shippingCharge->amount }}" name="amount" id="amount" placeholder="Amount"
                                                class="form-control" required>
                        </div>
                        </div>
                    
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country" id="country" class="form-control" required>
                                <option value="">Select a Country</option>
                                @if ($countries->isNotEmpty())
                                    @foreach ($countries as $country)
                                        <option
                                            {{ $shippingCharge->country_id == $country->id ? 'selected' : '' }}
                                            value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                    <option {{ $shippingCharge->country_id == 'rest_of_world' ? 'selected' : '' }}
                                        value="rest_of_world">Rest of the World</option>
                                @endif
                            </select>
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
        $(document).ready(function() {
            $('#shippingForm').on('submit', function(e) {
                $('#btn').attr('disabled', true);
                const data = $(this).serializeArray();

                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.shipping.update', $shippingCharge->id) }}",
                    type: 'POST',
                    data: data,
                    beforeSend: function(xhr) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr(
                            'content'));
                        xhr.setRequestHeader('X-HTTP-Method-Override',
                        'PUT'); // or 'PATCH' depending on your setup
                    },
                    success: function(response) {
                        $('#btn').attr('disabled', false);
                        if (response.status == true) {
                            window.location.href = "{{ route('admin.shipping.index') }}";
                        } else {
                            let errors = response.errors;

                            if (errors['country']) {
                                $('#country').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['country']);
                            } else {
                                $('#country').removeClass('is-invalid').siblings('p')
                                    .removeClass('invalid-feedback').html("");
                            }

                            if (errors['port']) {
                                $('#port').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['port'])
                            } else {
                                $('#port').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }

                            if (errors['amount']) {
                                $('#amount').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['amount']);
                            } else {
                                $('#amount').removeClass('is-invalid').siblings('p')
                                    .removeClass('invalid-feedback').html("");
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection

