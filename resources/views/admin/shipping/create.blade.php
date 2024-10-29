

@extends('admin.layout.app')

@section('title','Shipping - Create')

@section('content')
<section class="section">
    <div class="section-body">
        @include('admin.message')
        <form method="GET" id="shippingForm">
            @csrf
            <div class="row">


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
                            <input type="text" name="port" id="port" placeholder="Port"
                            class="form-control" required>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="number" name="amount" id="amount" placeholder="Amount"
                                                class="form-control" required>
                        </div>
                        </div>
                    
                        
                        <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select name="country" id="country" class="form-control" required>
                                @if ($countries->isNotEmpty())
                                <option value="rest_of_world">Rest Of the world</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
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
            $('#shippingForm').submit('click', function(e) {
                $('#btn').attr('disabled', true)
                const data = $(this).serializeArray()

                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.shipping.store') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        $('#btn').attr('disabled', false)
                        if (response['status'] == true) {
                            window.location.href = " {{ route('admin.shipping.create') }}"
                        } else {
                            let errors = response.errors

                            if (errors['country']) {
                                $('#country').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['country'])
                            } else {
                                $('#country').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }

                            if (errors['amount']) {
                                $('#amount').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['amount'])
                            } else {
                                $('#amount').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }
                            if (errors['port']) {
                                $('#port').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['port'])
                            } else {
                                $('#port').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }


                        }

                    }
                })
            })
        })

        function deleteRecord(id) {
            if (confirm('Are You Sure You Want To delete?')) {
                let url = '{{ route('admin.shipping.destroy', 'id') }}';
                let newUrl = url.replace('id', id);

                $.ajax({
                    url: newUrl,
                    type: "DELETE",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status) {
                            window.location.href = "{{ route('admin.shipping.index') }}";
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        }
    </script>
@endsection