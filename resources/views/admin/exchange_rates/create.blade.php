
@extends('admin.layout.app')

@section('title','Exchange Rate - Create')

@section('content')
<section class="section">
    <div class="section-body">
      <form  id='subcategoryForm'>
        @csrf
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                <h4>Create Exchange Rate</h4>
                <a href="{{ route('admin.exchange_rates.index') }}" class="btn btn-primary">Back</a>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="card">
            
              <div class="card-body">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Currency</label>
                      <input type="text" name="currency" id="currency" class="form-control"
                      placeholder="currency"  required>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Rate</label>
                      <input type="number" name="rate" id="rate" class="form-control" placeholder="rate" step="0.01" required>
                    </div>
                  </div>
                  

                </div>
                <div class="card-footer text-left">
                  <button id="btn" class="btn btn-primary mr-1" type="submit">Submit</button>
                </div>

            </div>
          </div>




        </div>
        </div>
    </form>

  </section>
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
                    url: "{{ route('admin.exchange_rates.store') }}",
                    type: 'POST',
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
