@extends('layouts.app')
@section('content')
<style type="text/css">
    .modal-dialog-wide {
        width: 80%;
        max-width: 80%;
    }
</style>
<div class="card-body">
    <h1 class="h3 mb-4 text-gray-800">Damaged Product</h1>
    @include('layouts.notif')
    
    <div class="row">
        <div class="table-responsive mt-4 mt-xl-0">
            <table id="table-index" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($damagedProducts as $damagedProduct)
                    <tr>
                        <td>{{ $damagedProduct->id }}</td>
                        <td>{{ $damagedProduct->product->name }}</td>
                        <td>{{ $damagedProduct->quantity }}</td>
                        <td>
                            @if($damagedProduct->returnNote)
                                @if($damagedProduct->returnNote->status == 'shipped')
                                    <span class="badge badge-success">Shipped</span>
                                @else
                                    <a href="{{ route('print.return.note', ['damageID' => $damagedProduct->id]) }}" class="btn btn-success btn-sm">Print Return Nota</a>
                                @endif
                            @else
                                <button class="btn btn-primary btn-sm create-return-note" data-id="{{ $damagedProduct->id }}">Create Return Nota</button>
                            @endif
                        </td>
                                              
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="returnNoteModal" tabindex="-1" role="dialog" aria-labelledby="returnNoteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-wide" role="document">
        <div class="modal-content">
            <form id="returnNoteForm" action="{{ route('return-note.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="returnNoteModalLabel">Create Return Nota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-muted">Please fill in all the required data in each tab below:</p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="product-tab" data-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="true">Data Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="nota-tab" data-toggle="tab" href="#nota" role="tab" aria-controls="nota" aria-selected="false">Data Nota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="supplier-tab" data-toggle="tab" href="#supplier" role="tab" aria-controls="supplier" aria-selected="false">Data Supplier</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pembeli-tab" data-toggle="tab" href="#pembeli" role="tab" aria-controls="pembeli" aria-selected="false">Data Buyer</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
                            <div class="form-group">
                                <label for="note">Damaged Note</label>
                                <input type="text" class="form-control" id="note" name="note" readonly>
                            </div>
                            <input type="hidden" class="form-control" id="damaged_product_id" name="damaged_product_id">
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control" id="itemName" name="productName" readonly>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" readonly>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price" required>
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="number" class="form-control" id="total" name="total" readonly>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nota" role="tabpanel" aria-labelledby="nota-tab">
                            <div class="form-group">
                                <label for="notaNumber">Nota Number</label>
                                <input type="text" class="form-control" id="notaNumber" name="notaNumber" placeholder="Enter nota number (e.g., NOTA12345)" required>
                            </div>
                            <div class="form-group">
                                <label for="purchaseDate">Purchase Date</label>
                                <input type="date" class="form-control" id="purchaseDate" name="purchaseDate" required>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="supplier" role="tabpanel" aria-labelledby="supplier-tab">
                            <div class="form-group">
                                <label for="supplierName">Supplier Name</label>
                                <input type="text" class="form-control" id="supplierName" name="supplierName" readonly>
                            </div>
                            <div class="form-group">
                                <label for="supplierAddress">Supplier Address</label>
                                <input type="text" class="form-control" id="supplierAddress" name="supplierAddress" readonly>
                            </div>
                            <div class="form-group">
                                <label for="supplierPhoneNumber">Supplier Phone Number</label>
                                <input type="text" class="form-control" id="supplierPhoneNumber" name="supplierPhoneNumber" readonly>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pembeli" role="tabpanel" aria-labelledby="pembeli-tab">
                            <!-- Pembeli Data -->
                            <div class="form-group">
                                <label for="customerName">Buyer Name</label>
                                <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Enter detail buyer" required>
                            </div>
                            <div class="form-group">
                                <label for="customerPhoneNumber">Buyer Phone Number</label>
                                <input type="text" class="form-control" id="customerPhoneNumber" name="customerPhoneNumber" placeholder="Enter detail buyer" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
            
        </div>
    </div>
</div>


@endsection 
@section('scripts')
@section('scripts')

<script>
     $(document).ready(function() {
        $('.table').DataTable();
    });
    $(document).ready(function() {
        $(document).on('click', '.create-return-note', function() {
            var damagedProductId = $(this).data('id');
            $('#damagedProductId').val(damagedProductId);

            $.ajax({
                url: `{{ route('get.product.damaged', '') }}/${damagedProductId}`,
                type: 'GET',
                success: function(data) {
                    $('#note').val(data.note);
                    $('#itemName').val(data.product_name);
                    $('#quantity').val(data.quantity);
                    $('#damaged_product_id').val(data.damaged_product_id);
                    $('#supplierName').val(data.supplier_name);
                    $('#supplierAddress').val(data.supplier_address);
                    $('#supplierPhoneNumber').val(data.supplier_phone_number);
                },
                error: function(xhr, status, error) {
                    alert('Error fetching product details');
                    console.error(xhr.responseText);
                }
            });

            $('#returnNoteModal').modal('show');
        });
    
        $('#price, #quantity').on('input', function() {
            var total = $('#quantity').val() * $('#price').val();
            $('#total').val(total);
        });
    });


    </script>
    
@endsection
