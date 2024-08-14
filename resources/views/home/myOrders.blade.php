<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms | The Fashion Zone</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #f8f9fa;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            margin: 0 auto;
            margin-top: 3%;
        }
    
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }
    
        th {
            background-color: #343a40;
            color: #ffffff;
            font-weight: bold;
            font-size: 18px;
        }
    
        td {
            font-size: 16px;
            color: #495057;
        }
    
        tr:nth-child(even) {
            background-color: #e9ecef;
        }
    
        tr:hover {
            background-color: #dee2e6;
            transform: scale(1.01);
            transition: all 0.2s ease-in-out;
        }
    
        td img {
            width: 80px;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s;
        }
    
        td img:hover {
            transform: scale(1.2);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }
    
        .btn-danger:hover {
            background-color: #c82333;
            color: #fff;
        }
    </style>
    
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

         <div>
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Payment Status</th>
                    <th>Delivery Status</th>
                    <th>Action</th>
                </tr>
    
                @foreach ($order as $order)
                    <tr 
                        @if ($order->delivery_status == 'You Canceled the Order') 
                            style="text-decoration: line-through; background-color: #e0e0e0; color: #888;" 
                        @endif
                    >
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>${{ number_format($order->price, 2) }}</td>
                        <td><img src="product/{{ $order->image }}"></td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        <td>
                            @if ($order->delivery_status == 'Delivered')
                                <span style="color: green; font-size: 24px;">&#10003;</span>
                            @elseif ($order->delivery_status == 'You Canceled the Order')
                                <span style="color: red; font-weight: bold;">Canceled</span>
                            @else
                                <a
                                    onclick="return confirm('Are You Sure to Cancel This Order?')"
                                    class="btn btn-danger" 
                                    href="{{ url('cancel_order', $order->id) }}"
                                >
                                    Cancel
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
          </div>
      </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="#">LEOCHEMEZZ</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
