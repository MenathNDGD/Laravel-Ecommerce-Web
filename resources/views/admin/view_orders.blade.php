<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .content-wrapper {
            padding: 20px;
        }

        .content-wrapper h1 {
            color: #ffffff;
            margin-bottom: 20px;
            font-size: 35px;
            text-align: center;
            padding-bottom: 10px;
        }

        .content-wrapper table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin: 0 auto;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3535355d;
            color: #333;
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            font-size: 18px;
            color: #666;
            position: relative;
        }

        .content-wrapper img {
            width: 100px;
            border-radius: 10px;
            display: block;
            margin: 0 auto;
        }

        .user-attractive-icon {
            font-size: 28px;
            color: #4caf50;
            transition: transform 0.2s, color 0.2s;
        }        
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1>All Orders</h1>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Product Title</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Product Image</th>
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $order)
                            <tr>
                                <td>{{$order->name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->address}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->product_title}}</td>
                                <td>{{$order->quantity}}</td>
                                <td>${{number_format($order->price, 2)}}</td>
                                <td><img src="/product/{{$order->image}}" alt="Product Image"></td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->delivery_status}}</td>
                                <td>
                                    @if ($order->delivery_status == 'processing')
                                        <a 
                                            href="{{url('delivered', $order->id)}}" 
                                            class="btn btn-primary"
                                            onclick="return confirm('Are you sure to make this change? !!!')"
                                        >
                                            Delivered
                                        </a>
                                    @else
                                        <i class="mdi mdi-checkbox-marked-circle-outline user-attractive-icon"></i>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>
</html>
