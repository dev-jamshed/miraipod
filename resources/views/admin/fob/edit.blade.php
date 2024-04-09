@extends('admin.layout.app')
@section('content')
    {{-- {{$categories.id}} --}}

    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>update fob</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.fob.index') }}" class="btn btn-primary">Back</a>
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
                        <input type="number" name="id" hidden value="{{$fob->id}}" id="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="min">Min</label>
                                    <input type="number" value="{{$fob->min_price}}" name="min" id="min" class="form-control"
                                        placeholder="min">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="max">Max</label>
                                    <input type="number" value="{{$fob->max_price}}" name="max" id="max" class="form-control"
                                        placeholder="max">
                                    <p></p>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="pb-5 pt-3">
                    <button id="btn" class="btn btn-primary">update</button>
                    <a href="{{ route('admin.fob.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
               
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.fob.update', $fob->id) }}",
                    type: 'PUT',
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
