
<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 10pt;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .qr-code {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Invoice</h1>
        @if(config('invoice.company_logo'))
            <img src="{{ config('invoice.company_logo') }}" alt="Company Logo" width="150"><br>
        @endif
        <strong>{{ config('invoice.company_name') }}</strong><br>
        {{ config('invoice.company_address') }}<br>
        Phone: {{ config('invoice.company_phone') }}<br>
        Email: {{ config('invoice.company_email') }}<br>
        Website: {{ config('invoice.company_website') }}
    </div>

    <h2>Invoice To:</h2>
    <p>
        <strong>{{ $customer['name'] }}</strong><br>
        {{ $customer['address'] }}<br>
        {{ $customer['email'] }}
    </p>

    <h2>Items:</h2>
    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['description'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>{{ $item["unit_price"] }}</td>
                    <td>{{ $formatCurrency($item["total"]) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Subtotal: {{ $formatCurrency($subtotal) }}</p>
    <p>Tax: {{ $formatCurrency($tax) }}</p>
    <p>Discount: {{ $formatCurrency($discount) }}</p>
    <h3>Total: {{ $formatCurrency($total) }}</h3>

    @if(config('invoice.qr_code.enabled'))
        <div class="qr-code">
            <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(config('invoice.qr_code.size'))->generate($qr_code_link)) }}" alt="QR Code">
        </div>
    @endif
</body>
</html>

