
@extends('admin.layout.app')

@section('title','Model - Create')

@section('content')
<section class="section">
    <div class="section-body">
        <form id='subcategoryForm'>
            @csrf
        <div class="row">


            <div class="col-12">
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between py-3 ">
                  <h4>Create Model</h4>
                  <a href="{{ route('admin.model.index') }}" class="btn btn-primary">Back</a>
                </div>
              </div>
            </div>


            <div class="col-12">
              <div class="card">
              
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Slug</label>
                        <input readonly type="text" name="slug" id="slug" class="form-control"
                                        placeholder="Slug">
                      </div>
                    </div>

                  
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Make</label>
                        <select name="make" id="category" class="form-control" required>
                            <option value="">Please Select Make</option>
                            @if ($makes->isNotEmpty())
                                {
                                @foreach ($makes as $make)
                                    <option value=" {{ $make->id }}"> {{ $make->name }}</option>
                                @endforeach
                                }
                            @endif

                        </select>
                      </div>
                    </div>
                  
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Block</option>
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
                let name = document.getElementById('name').value;
                let slug = document.getElementById('slug').value;
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.model.store') }}",
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        $('#btn').attr('disabled', false)
                        if (response['status'] == true) {
                            window.location.href = " {{ route('admin.model.index') }}"
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
                            if (errors['make']) {
                                $('#category').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['make'])
                            } else {
                                $('#category').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }
                            if (errors['status']) {
                                $('#status').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['status'])
                            } else {
                                $('#status').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html("")
                            }


                            if (errors['slug']) {
                                $('#slug').addClass('is-invalid').siblings('p').addClass(
                                    'invalid-feedback').html(errors['slug'])
                            } else {
                                $('#slug').removeClass('is-invalid').siblings('p').removeClass(
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
