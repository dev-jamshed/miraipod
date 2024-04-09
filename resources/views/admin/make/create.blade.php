@extends('admin.layout.app')

@section('title', 'Create make')

@section('content')
    <h2>Create make</h2>
    <form action="{{ route('admin.make.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name"  class="form-label">make Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter make name">
        </div>
        <div class="mb-3">
            <label for="name"  class="form-label">make Slug</label>
            <input type="text" readonly class="form-control" id="slug" name="slug" placeholder="Enter Slug">
        </div>
        {{-- <div class="col-md-12"> --}}
            <div class="mb-3">
                <label for="status">status</label>
                <select name="status" id="status" class="form-control" id="">
                    <option value="1">Active</option>
                    <option value="0">Blocked</option>
                </select>
            </div>
        {{-- </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

<script>
   document.addEventListener('DOMContentLoaded', function() {
    var nameInput = document.getElementById('name');
    var slugInput = document.getElementById('slug');

    if (nameInput && slugInput) {
        nameInput.addEventListener('input', function() {
            var title = this.value;

            var xhr = new XMLHttpRequest();
            xhr.open('GET', "{{ route('generateSlug') }}?title=" + encodeURIComponent(title), true);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === true) {
                            slugInput.value = response.slug;
                        }
                    }
                }
            };
            xhr.send();
        });
    } else {
        console.error('Input element not found.');
    }
});




</script>


