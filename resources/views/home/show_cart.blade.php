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
   <title>Famms | Cart</title>
   <!-- bootstrap core css -->
   <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
   <!-- font awesome style -->
   <link href="home/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="home/css/style.css" rel="stylesheet" />
   <!-- responsive style -->
   <link href="home/css/responsive.css" rel="stylesheet" />

   <style>
    .cart-table {
         margin: 30px auto;
         width: 90%;
         max-width: 1200px;
         border: 1px solid #ddd;
         border-collapse: collapse;
         font-size: 1rem;
         text-align: center;
    }

    .cart-table th, .cart-table td {
         padding: 15px;
         text-align: center;
         border: 1px solid #ddd;
         vertical-align: middle;
    }

    .cart-table th {
         background-color: #0180ffb9;
         font-weight: bold;
         font-size: 20px;
    }

    .cart-table td {
        font-size: 18px;
        background-color: rgba(99, 99, 99, 0.171);
    }

    .cart-table .image-cell {
         display: flex;
         justify-content: center;
         align-items: center;
    }

    .cart-table img {
         width: 100px;
         height: 100px;
         object-fit: cover;
         border-radius: 10px;
    }

    .btn-danger {
         background-color: #ff4d4d;
         border-color: #ff4d4d;
    }

    .btn-danger:hover {
         background-color: #e60000;
         border-color: #e60000;
    }

    .sub-total {
         margin: 20px auto;
         width: 90%;
         max-width: 1200px;
         text-align: right;
    }

    .sub-total h1 {
         font-size: 1.5rem;
         font-weight: bold;
    }

    .proceed-to-payment {
         margin: 20px auto;
         width: 90%;
         max-width: 1200px;
         text-align: center;
         padding: 20px;
         background-color: #f8f9fa;
         border-radius: 10px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .proceed-to-payment h1 {
         font-size: 1.5rem;
         font-weight: bold;
         margin-bottom: 20px;
    }

    .proceed-to-payment .btn-dark {
         background-color: #343a40;
         border-color: #343a40;
         color: #fff;
         padding: 10px 20px;
         margin: 0 10px;
         font-size: 1rem;
         border-radius: 5px;
         text-decoration: none;
         transition: background-color 0.3s, border-color 0.3s;
    }

    .proceed-to-payment .btn-dark:hover {
         background-color: #23272b;
         border-color: #23272b;
    }

    .nav-link {
        display: flex;
        align-items: center;
    }

    .badge {
        margin-left: 5px;
    }
   </style>
</head>
<body>
   <div class="hero_area">
      <!-- header section starts -->
      <header class="header_section">
        <div class="container">
           <nav class="navbar navbar-expand-lg custom_nav-container ">
              <a class="navbar-brand" href="{{ url('/') }}"><img width="250" src="images/logo.png" alt="#" /></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <ul class="navbar-nav">
                    <li class="nav-item">
                       <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                   <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                       <ul class="dropdown-menu">
                          <li><a href="{{ url('/about') }}">About</a></li>
                          <li><a href="{{ url('/testimonial') }}">Testimonial</a></li>
                       </ul>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="{{ url('/products') }}">Products</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/show_cart') }}">
                          Cart 
                          @if(isset($cartCount) && $cartCount > 0)
                            <span class="badge badge-pill badge-dark">{{ $cartCount }}</span>
                          @endif
                        </a>
                    </li>                     
                    <form class="form-inline">
                      <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                      <i class="fa fa-search" aria-hidden="true"></i>
                      </button>
                   </form>
    
                    @if (Route::has('login'))
                      @auth
                         <li class="nav-item">
                            <x-app-layout></x-app-layout>
                         </li>
                      @else
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                         </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                         </li>
                      @endauth
                    @endif
    
                 </ul>
              </div>
           </nav>
        </div>
     </header>
      <!-- end header section -->

      @if (session()->has('message'))
         <div class="alert alert-success">
            <button 
               type="button" 
               class="close" 
               data-dismiss="alert" 
               aria-hidden="true"
            >
               x
            </button>
               {{session()->get('message')}}
         </div>
      @endif

      <div>
         <table class="table table-bordered cart-table">
            <thead>
               <tr>
                  <th>Title</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Price</th>
                  <th>Image</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php $totalPrice = 0; ?>
               @foreach($cart as $cart)
               <tr>
                  <td>{{ $cart->product_title }}</td>
                  <td>{{ $cart->quantity }}</td>
                  <td>${{ number_format($cart->price / $cart->quantity, 2) }}</td>
                  <td>${{ number_format($cart->price, 2) }}</td>
                  <td class="image-cell"><img src="/product/{{$cart->image}}" alt="Product Image"></td>
                  <td>
                     <a 
                        class="btn btn-danger" 
                        href="{{url('/remove_cart', $cart->id)}}"
                        onclick="return confirm('Are you sure to remove this item?')"
                     >
                        Remove
                     </a>
                  </td>
               </tr>
               <?php $totalPrice = $totalPrice + $cart->price ?>
               @endforeach
            </tbody>
         </table>

         <div class="sub-total">
            <h1>Sub Total: ${{ number_format($totalPrice, 2) }}</h1>
         </div>

         <div class="proceed-to-payment">
            <h1>Proceed to Payment</h1>
            <a href="{{url('cash_order')}}" class="btn btn-dark">Cash on Delivery</a>
            <a href="{{url('stripe', $totalPrice)}}" class="btn btn-dark">Card Payment</a>
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