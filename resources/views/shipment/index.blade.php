@extends('layouts.app')

@section('content')
    <div class="card-body">
        <h1 class="h3 mb-4 text-gray-800">New Return Nota</h1>
        <div class="card">
           
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
                        @forelse($returnNotes as $returnNote)
                            <tr>
                                <td>{{ $returnNote->id }}</td>
                                <td>{{ $returnNote->created_at }}</td>
                                <td>{{ $returnNote->DamagedProduct->note }}</td>
                                <td>
                                    <a href="{{ route('shipment.return_note', $returnNote->id) }}" class="btn btn-info btn-sm">View Note</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Data return nota not available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>        
        <br>
       
        <div class="card">
            <div class="card-header">
                Process Shipment for Return Nota
            </div>
            <div class="card-body">
                @include('layouts.notif')
                <form action="{{ route('shipment.ship') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="return_note_id">Return Nota ID:</label>
                        <select class="form-control select2" id="return_note_id" name="return_note_id" onchange="populateProductDetails()">
                            <option value="">Select Return Nota</option>
                            @foreach($returnNotes as $returnNote)
                                <option value="{{ $returnNote->id }}" data-product-name="{{ $returnNote->damagedProduct->product->name }}" data-quantity="{{ $returnNote->damagedProduct->quantity }}">{{ $returnNote->id }} - {{ $returnNote->damagedProduct->note }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" readonly>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" readonly>
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
                Stock Out Report
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Return Nota ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
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
                            <td>{{ $shipment->returnNote->damagedProduct->product->name }}</td>
                            <td>{{ $shipment->returnNote->damagedProduct->quantity }}</td>
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

        function populateProductDetails() {
        const returnNoteSelect = document.getElementById('return_note_id');
        const selectedOption = returnNoteSelect.options[returnNoteSelect.selectedIndex];
        const productName = selectedOption.getAttribute('data-product-name');
        const quantity = selectedOption.getAttribute('data-quantity');

        document.getElementById('product_name').value = productName;
        document.getElementById('quantity').value = quantity;
    }
    </script>
@endsection