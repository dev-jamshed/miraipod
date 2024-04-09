@extends('admin.layout.app')

@section('title', 'make List')

@section('content')
@include('admin.message')
<br>
<br>
<br>
    <h2>make List</h2>
    <a href="{{ route('admin.make.create') }}" class="btn btn-success">Create New make</a>
 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th width="100">Status</th>
                <th  >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($makes as $make)
            <tr>
                <td>{{ $make->id }}</td>
                <td>{{ $make->name }}</td>
                <td>{{ $make->slug }}</td>
                <td>
                    @if ($make->status == true)
                        <svg class=" text-success"
                            xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    @else
                        <svg class="text-danger h-6 w-6" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.make.edit', $make->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.make.destroy', $make->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this make?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
