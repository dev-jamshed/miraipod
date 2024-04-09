@extends('admin.layout.app')

@section('title', 'make List')

@section('content')
@include('admin.message')
<br>
<br>
<br>
    <h2>make List</h2>
    <a href="{{ route('admin.exchange_rates.create') }}" class="btn btn-success">Create New Exchange Rate</a>
 
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Currency</th>
                <th>Rate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exchangeRates as $exchangeRate)
            <tr>
                <td>{{ $exchangeRate->id }}</td>
                <td>{{ $exchangeRate->currency }}</td>
                <td>{{ $exchangeRate->rate }}</td>
                <td>
                    <a href="{{ route('admin.exchange_rates.edit', $exchangeRate->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('admin.exchange_rates.destroy', $exchangeRate->id) }}" method="POST" style="display: inline;">
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
