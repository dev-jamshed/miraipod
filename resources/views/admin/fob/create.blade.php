
@extends('admin.layout.app')

@section('title','Fob - Create')

@section('content')

<section class="section">
    <div class="section-body">
        <form id='subcategoryForm'>
            @csrf
        <div class="row">


          <div class="col-12">
            <div class="card">
              <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                <h4>Create FOB</h4>
                <a href="{{ route('admin.fob.index') }}" class="btn btn-primary">Back</a>
              </div>
            </div>
          </div>


          <div class="col-12">
            <div class="card">
            
              <div class="card-body">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Min</label>
                      <input type="number" name="min" id="min" class="form-control"
                      placeholder="min" required>
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Max</label>
                      <input type="number" name="max" id="max" class="form-control"
                      placeholder="max" required>
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
               
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.fob.store') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        $('#btn').attr('disabled', false)
                        if (response['status'] == true) {
                            window.location.href = " {{ route('admin.fob.index') }}"
                            $('#name').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("")
                            $('#slug').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html("")
                        } else {
                            let errors = response.errors

                            if (errors['name']) {
                                $('#name').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['name'])
                            } else {
                                $('#name').removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html("")
                            }
                            if (errors['min']) {
                                $('#min').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['min'])
                            } else {
                                $('#min').removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html("")
                            }
                            if (errors['max']) {
                                $('#max').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['max'])
                            } else {
                                $('#max').removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html("")
                            }
                        }

                    }
                })
            })
        })


        //slug genrater
        $('#name').on('input', function() {
            element = $(this)
            tittle = element.val()
            $.ajax({
                url: "{{ route('generateSlug') }}",
                type: 'GET',
                data: {
                    title: element.val()
                },
                success: function(response) {
                    if (response['status'] == true) {
                        $('#slug').val(response['slug'])
                    }
                }
            })
        })
    </script>
@endsection
