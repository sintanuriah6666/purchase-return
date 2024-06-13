<!DOCTYPE html>
<html>
<head>
    <title>Return Note</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            margin-bottom: 20px;
        }
        .section-title {
            font-weight: bold;
            text-decoration: underline;
        }
        .details, .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details td, .items td, .items th {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .items th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Return Note</h2>
        <p>Date return {{ now()->format('d-m-Y') }}</p>
    </div>

    <div class="content">
        <div class="section-title">Supplier Details</div>
        <table class="details">
            <tr>
                <td>Name</td>
                <td>{{ $returnNote->damagedProduct->supplier->name }}</td>
            </tr>
            <tr>
                <td>Address</td>
                <td>{{ $returnNote->damagedProduct->supplier->address }}</td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>{{ $returnNote->damagedProduct->supplier->phone}}</td>
            </tr>
        </table>

        <div class="section-title">Buyer Details</div>
        <table class="details">
            <tr>
                <td>Name</td>
                <td>{{ $returnNote->customer_name }}</td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>{{ $returnNote->customer_phone_number}}</td>
            </tr>
        </table>

        <div class="section-title">Return Items</div>
        <table class="items">
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
</body>
</html>
<script>
    window.onload = function() {
        window.print();
    }
</script>
