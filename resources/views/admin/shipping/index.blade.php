@extends('admin.layout.app')

@section('title', 'Shippings')

@section('content')

@include('admin.message')

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Shipping Charges </h4>
                <a class="btn btn-primary" href="{{ route('admin.shipping.create') }}">New Shipping Charges </a>
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
                                            <th>Port</th>
                                            <th>Amount</th>
                                            <th>Country</th>
                                            <th colspan="2" class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($shippings->isNotEmpty())
                                        @foreach ($shippings as $shipping)
                                            <tr>
                                                <td class="text-center">{{ $shipping->id }}</td>
                                                <td>{{ $shipping->port }}</td>
                                                <td>{{ $shipping->amount }}</td>
                                                <td>{{ $shipping->name }}</td>
                                                <td class="action-btns">
                                                    <a href="{{ route('admin.shipping.edit', $shipping->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                        <button type="submit" class="btn btn-danger"
                                                        onclick="deleteshipping({{$shipping->id}})">Delete</button>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
