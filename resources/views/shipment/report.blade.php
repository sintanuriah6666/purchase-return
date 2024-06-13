@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Shipment Report</h1>
        <div class="card">
            <div class="card-header">
                Shipment Records
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Return Note ID</th>
                            <th>Shipment Date</th>
                            <th>Supplier Name</th>
                            <th>Supplier Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($shipments as $shipment)
                            <tr>
                                <td>{{ $shipment->id }}</td>
                                <td>{{ $shipment->return_note_id }}</td>
                                <td>{{ $shipment->shipment_date }}</td>
                                <td>{{ $shipment->supplier_name }}</td>
                                <td>{{ $shipment->supplier_address }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
