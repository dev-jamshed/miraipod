@extends('admin.layout.app')

@section('title', 'Transmissions')

@section('content')

    @include('admin.message')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Transmissions</h4>
                <a class="btn btn-primary" href="{{ route('admin.transmission.create') }}">Create Transmission</a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th colspan="2" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transmissions as $transmission)
                                            <tr>
                                                <td class="text-center">{{ $transmission->id }}</td>
                                                <td>{{ $transmission->name }}</td>
                                                <td class="action-btns">
                                                    <a href="{{ route('admin.transmission.edit', $transmission->id) }}"
                                                        class="btn btn-primary">Edit</a>

                                                    <form
                                                        action="{{ route('admin.transmission.destroy', $transmission->id) }}"
                                                        method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJs')
<script>
    // Optional: if you want to handle delete confirmation in a more advanced way
    document.querySelectorAll('.btn-danger').forEach(function (button) {
        button.addEventListener('click', function (event) {
            const confirmation = confirm('Are you sure you want to delete this transmission?');
            if (!confirmation) {
                event.preventDefault(); // Prevent form submission if not confirmed
            }
        });
    });
</script>
@endsection
