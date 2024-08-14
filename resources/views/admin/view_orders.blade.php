<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style>
        .content-wrapper form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .content-wrapper input[type="text"] {
            width: 300px;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px 0 0 5px;
            border: 1px solid #ddd;
            border-right: none;
            outline: none;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s;
            color: #333;
            background-color: #fff;
        }

        .content-wrapper input[type="text"]:focus {
            border-color: #4caf50;
            color: #333;
        }

        .content-wrapper input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4caf50;
            border: 1px solid #4caf50;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .content-wrapper input[type="submit"]:hover {
            background-color: #45a049;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

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
            table-layout: auto;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin: 0 auto;
        }

        th, td {
            padding: 10px;
            font-size: 14px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3535355d;
            color: #333;
            font-weight: 800;
            font-size: 16px;
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

        .empty-data-message {
            text-align: center;
            margin-top: 20px;
            padding: 15px;
            font-size: 20px;
            color: #ff6347;
            background-color: #fff8f8;
            border: 1px solid #ff6347;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .viewOrders {
            text-align: center;
            margin-top: 20px;
        }

        .viewOrders .btn {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #4caf50;
            border: 1px solid #4caf50;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .viewOrders .btn:hover {
            background-color: #45a049;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th:nth-child(11), td:nth-child(11), /* Action Column */
        th:nth-child(12), td:nth-child(12), /* PDF Column */
        th:nth-child(13), td:nth-child(13) { /* Email Column */
            width: 120px; /* Adjust width as necessary */
            white-space: nowrap; /* Prevent wrapping */
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
                    <div>
                        <form action="{{ url('search') }}" method="GET">
                            @csrf
                            <input type="text" name="search" placeholder="Search for Items..." value="{{ old('search', isset($searchText) ? $searchText : '') }}">
                            <input type="submit" value="Search" class="btn btn-outline-primary">
                        </form>
                    </div>
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
                                <th>PDF</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order as $order)
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
                                    @if ($order->delivery_status == 'Processing')
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
                                <td>
                                    <a href="{{url('order_detail_pdf', $order->id)}}" class="btn btn-success">Download PDF</a>
                                </td>
                                <td><a href="{{ url('send_email', $order->id) }}" class="btn btn-info">Send</a></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="13">
                                        <div class="empty-data-message">
                                            <p>No Data Found</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @if(isset($searchText))
                        <div class="viewOrders">
                            <a href="{{ url('/view_orders') }}" class="btn btn-primary">View All Orders</a>
                        </div>
                    @endif
                </div>
                @include('admin.footer')
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
