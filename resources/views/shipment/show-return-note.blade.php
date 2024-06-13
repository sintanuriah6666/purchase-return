@extends('layouts.app')

@section('content')
    <div class="card-body">
    
    <div class="header">
        <h2>Return Nota</h2>
        <p>Date return {{ now()->format('d-m-Y') }}</p>
    </div>

    <div class="content">
        <div class="section-title">Supplier Details</div>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $returnNote->damagedProduct->supplier->name }}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{ $returnNote->damagedProduct->supplier->address }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $returnNote->damagedProduct->supplier->phone }}</td>
            </tr>
        </table>

        <div class="section-title">Buyer Details</div>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $returnNote->customer_name }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $returnNote->customer_phone_number }}</td>
            </tr>
        </table>

        <div class="section-title">Return Items</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Purchase Date</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $returnNote->purchase_date }}</td>
                    <td>{{ $returnNote->damagedProduct->product->name }}</td>
                    <td>{{ $returnNote->damagedProduct->quantity }}</td>
                    <td>Rp {{ number_format($returnNote->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($returnNote->total, 0, ',', '.') }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="5">Total Return</td>
                    <td>Rp {{ number_format($returnNote->total, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
