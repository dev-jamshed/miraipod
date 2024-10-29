

@extends('admin.layout.app')

@section('title', 'Exchange Rates')

@section('content')

@include('admin.message')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Exchange Rates </h4>
                <a class="btn btn-primary" href="{{ route('admin.exchange_rates.create') }}">New Exchange Rate</a>
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
                                            <th class="text-center">
                                              #
                                            </th>
                                            <th>Currency</th>
                                            <th>Rate</th>
                                            <th colspan="2" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($exchangeRates as $exchangeRate)
                                        <tr >
                                            <td class="text-center" >{{ $exchangeRate->id }}</td>
                                            <td>{{ $exchangeRate->currency }}</td>
                                            <td>{{ $exchangeRate->rate }}</td>
                                            <td class="action-btns">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('customJs')

@endsection
