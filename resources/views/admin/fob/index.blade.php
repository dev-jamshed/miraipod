@extends('admin.layout.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1> fob</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('admin.fob.create') }}" class="btn btn-primary">New fob</a>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                @include('admin.message')
                <form action="">
                    <div class="card-header">
                        <div class="card-title">
                            <button class="btn btn-default btn-sm" type="button"
                                onclick="window.location.href='{{ route('admin.fob.index') }}'">Reset</button>
                        </div>
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" value="{{ Request::get('keyword') }}" name="keyword"
                                    class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @if ($fobs->isNotEmpty())
                                @foreach ($fobs as $fob)
                                    <tr>
                                        <td>{{ $fob->id }}</td>
                                        <td>{{ $fob->min_price }}</td>
                                        <td>{{ $fob->max_price }}</td>
                                        <td>
                                            <a href="{{ route('admin.fob.edit', $fob->id) }}"
                                                class="btn btn-primary">Edit</a>
                                                <button type="submit" class="btn btn-danger"
                                                onclick="deletefob({{$fob->id}})">Delete</button>
                                        </td>



                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6">
                                        Records Not Found
                                    </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $fobs->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
@endsection
@section('customJs')
    <script>
        function deletefob(id) {
            let url = '{{ route('admin.fob.destroy', 'id') }}';
            let newUrl = url.replace('id', id)
            if (confirm('Are You Sure You want To Delete'))
                $.ajax({
                    url: newUrl,
                    type: "delete",
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status) {
                            window.location.href = "{{ route('admin.fob.index') }}"
                        }
                    }
                })
        }
    </script>
@endsection
