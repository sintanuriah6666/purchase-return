@extends('layouts.app')
@section('content')
    <div class="card-body">
        <h1 class="h3 mb-4 text-gray-800">Check Product</h1>
        <div class="card">
            <div class="card-header">
               Check Product
            </div>
            <div class="card-body">
                @include('layouts.notif')
                <form action="{{ route('check.product') }}" method="POST">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="product_type" id="new_product" value="new" checked>
                        <label class="form-check-label" for="new_product">
                            New Product
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="product_type" id="existing_product" value="existing">
                        <label class="form-check-label" for="existing_product">
                            Product Already Exist
                        </label>
                    </div>
                        <div id="new_product_fields">
                            <div class="form-group">
                                <label for="new_product_code">New Product Code:</label>
                                <input type="text" class="form-control" id="new_product_code" name="product_code">
                            </div>
                            <div class="form-group">
                                <label for="new_name">New Name:</label>
                                <input type="text" class="form-control" id="new_name" name="name">
                            </div>
                        </div>
                        <div id="existing_product_fields" style="display:none;">
                            <div class="form-group">
                                <label for="product">Product:</label>
                                <select class="form-control" name="product_code">
                                    <option value="" disabled selected>Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->product_code }}" data-product-id="{{ $product->id }}">{{ $product->product_code }} - {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    <div class="form-group">
                        <label for="supplier">Supplier:</label>
                        <select class="form-control select2" id="supplier" name="supplier_id" required>
                            <option value="" disabled selected>Select Supplier</option>
                            @foreach ($suppliers as $id => $supplierName)
                                <option value="{{ $id }}" data-supplier-id="{{ $id }}">{{ $supplierName }}</option>
                            @endforeach
                        </select>                        
                    </div>
                    
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter the quantity purchased (e.g., 10)" required>
                    </div>
                    <div class="form-group">
                        <label for="quality">Quality:</label>
                        <select class="form-control select2" id="quality" name="quality" required>
                            <option value="" disabled selected>Select the quality</option>
                            <option value="good">Good</option>
                            <option value="damaged">Damaged</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="note">Note:</label>
                        <textarea class="form-control" id="note" name="note" placeholder="Enter any additional notes (e.g., Item was damaged during delivery)" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
            $(".select2").select2({
                placeholder: "Select an option",
                allowClear: true,
            });

            $('input[type=radio][name=product_type]').change(function() {
            if (this.value === 'new') {
                $('#new_product_fields').show();
                $('#existing_product_fields').hide();
                $('#new_product_code').prop('disabled', false).prop('required', true);
                $('#existing_product_code').prop('disabled', true);
            } else if (this.value === 'existing') {
                $('#new_product_fields').hide();
                $('#existing_product_fields').show();
                $('#new_product_code').prop('disabled', true);
                $('#existing_product_code').prop('disabled', false).prop('required', true);
            }
        });

  

        });
    </script>
@endsection
