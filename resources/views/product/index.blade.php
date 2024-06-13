@extends('layouts.app')

@section('content')
<div class="card-body">
    <h1 class="h3 mb-4 text-gray-800">Product</h1>
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('export', ['format' => 'excel']) }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Download Excel
            </a>
            <a href="{{ route('export', ['format' => 'pdf']) }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> Download PDF
            </a>
            
        </div>
    </div>
    <div class="row">
        <div class="table-responsive mt-4 mt-xl-0">
            <table id="table-index" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                       <th class="text-center" scope="col">Product Code</th>
                       <th class="text-center" scope="col">Product Name</th>
                       <th class="text-center" scope="col">Quantity</th>
                       <th class="text-center" scope="col">Quality</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $product->product_code }}</td>
                        <td class="text-left">{{ $product->name }}</td>
                        <td class="text-center">{{ $product->quantity }}</td>
                        <td class="text-center">{{ $product->quality }}</td>
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
    $(document).ready(function() {
        $('.table').DataTable();
    });
</script>
@endsection
