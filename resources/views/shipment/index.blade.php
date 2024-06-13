@extends('layouts.app')

@section('content')
    <div class="card-body">
        <h1 class="h3 mb-4 text-gray-800">Shipment</h1>
        <div class="card">
            <div class="card-header">
                Ship Product
            </div>
            <div class="card-body">
                @include('layouts.notif')
                <form action="{{ route('shipment.ship') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="return_note_id">Return Note ID:</label>
                        <select class="form-control select2" id="return_note_id" name="return_note_id">
                            <option value="">Select Return Note</option>
                            @foreach($returnNotes as $returnNote)
                                <option value="{{ $returnNote->id }}">{{ $returnNote->id }} - {{ $returnNote->DamagedProduct->note }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="shipment_date">Shipment Date:</label>
                        <input type="date" class="form-control" id="shipment_date" name="shipment_date">
                    </div>
                    <button type="submit" class="btn btn-primary">Ship Product</button>
                </form>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header">
                Return Notes
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Date return</th>
                            <th>Note</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($returnNotes as $returnNote)
                            <tr>
                                <td>{{ $returnNote->id }}</td>
                                <td>{{ $returnNote->created_at }}</td>
                                <td>{{ $returnNote->DamagedProduct->note }}</td>
                                <td>
                                    <a href="{{ route('shipment.return_note', $returnNote->id) }}" class="btn btn-info btn-sm">View Note</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        
        <br>
        <div class="card">
            <div class="card-header">
                Shipment Report
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

@section('scripts')
    <script>
   $(".select2").select2({
            placeholder: "Select an option",
            allowClear: true,
        });
    </script>
@endsection