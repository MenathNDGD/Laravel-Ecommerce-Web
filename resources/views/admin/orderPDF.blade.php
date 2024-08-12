<!doctype html>
<html lang="en">
<head>
    <base href="/public">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <style>
        h4 {
            margin: 0;
        }
    
        .w-full {
            width: 100%;
        }
    
        .margin-top {
            margin-top: 1.25rem;
        }
    
        .footer {
            font-size: 0.875rem;
            padding: 1rem;
            background-color: rgb(241 245 249);
        }
    
        table {
            width: 100%;
            border-spacing: 0;
        }
    
        table.products {
            font-size: 0.875rem;
        }
    
        table.products th {
            color: #ffffff;
            padding: 0.5rem;
            background-color: rgb(96 165 250);
            text-align: center;
        }
        
        table.products td {
            padding: 0.5rem;
            text-align: center;
        }
    
        table tr.items {
            background-color: rgb(241 245 249);
        }
    
        .total {
            text-align: right;
            margin-top: 1rem;
            font-size: 0.875rem;
        }
    
        .w-half {
            width: 50%;
            padding: 1rem;
            box-sizing: border-box;
        }
    
        .w-half h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
            color: rgb(34, 34, 34);
            text-align: left;
        }
    
        .w-half h1 + h1 {
            margin-top: 0.5rem;
        }
    </style>  

</head>
<body>
    <table class="w-full">
        <tr>
            <td class="w-half">
                <h1>Famms</h1>
                <h1>The Fashion Zone</h1>
                <h1>Your Order Details</h1>
            </td>
            <td class="w-half">
                <h2>Invoice ID: {{ $order->id }}</h2>
            </td>
        </tr>
    </table>
 
    <div class="margin-top">
        <table class="w-full">
            <tr>
                <td class="w-half">
                    <div><h4>To:</h4></div>
                    <div>{{ $order->name }}</div>
                    <div>{{ $order->address }}</div>
                    <div>{{ $order->phone }}</div>
                    <div>{{ $order->email }}</div>
                </td>
                <td class="w-half">
                    <div><h4>From:</h4></div>
                    <div>Famms | Shopping Zone</div>
                    <div>No. 22/B, St. John ST, LA.</div>
                </td>
            </tr>
        </table>
    </div>
 
    <div class="margin-top">
        <table class="products">
            <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            <tr class="items">
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->product_title }}</td>
                <td>${{ number_format($order->price, 2) }}</td>
            </tr>
        </table>
    </div>
 
    <div class="total">
        Total: ${{ number_format($order->price, 2) }} USD
    </div>
 
    <div class="footer margin-top">
        <div>Thank you for your order!</div>
        <div>&copy; Famms | Shopping Zone</div>
    </div>
</body>
</html>
