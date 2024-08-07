<!DOCTYPE html>
<html>
   <head>
      <base href="/public">
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
      <title>Famms - Product Details</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

    <style>
        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 80vh;
            flex-direction: column;
        }

        .box {
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            padding: 40px 20px;
        }

        .box:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
        }

        .img-box {
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f8f8;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .img-box img {
            max-height: 100%;
            max-width: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .img-box:hover img {
            transform: scale(1.1);
        }

        .detail-box h5 {
            font-size: 1.8rem;
            color: #333;
            margin: 10px 0;
            text-align: center;
            font-weight: bold;
        }

        .detail-box h6 {
            font-size: 1.4rem;
            margin: 5px 0;
            text-align: center;
            line-height: 1.5em;
        }

        .normal_price {
            text-decoration: red line-through;
            font-style: italic;
        }

        .save h6 {
            text-align: right;
            margin-top: 5px;
            color: green;
        }

        .option_container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            bottom: 10px;
            width: 100%;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .box:hover .option_container {
            opacity: 1;
        }

        .options {
            margin: 5px auto;
        }

        .options a {
            display: block;
            padding: 10px 20px;
            color: #fff;
            background: linear-gradient(145deg, #007bff, #0056b3);
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            margin: 0 5px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .options a:hover {
            background: linear-gradient(145deg, #0056b3, #007bff);
            transform: scale(1.1);
        }

        .centered-btn-box {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .centered-btn-box a {
            padding: 15px 30px;
            background: linear-gradient(145deg, #007bff, #0056b3);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .centered-btn-box a:hover {
            background: linear-gradient(145deg, #0056b3, #007bff);
            transform: scale(1.1);
        }

        .go-back-btn {
            padding: 10px 20px;
            background: linear-gradient(145deg, #f44336, #d32f2f);
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            transition: background 0.3s ease, transform 0.3s ease;
            margin-bottom: 20px;
        }

        .go-back-btn:hover {
            background: linear-gradient(145deg, #d32f2f, #f44336);
            transform: scale(1.1);
            color: #fff;
        }

        .row .amountAdd {
            margin: 0;
            border-radius: 30px;
            border: 1px solid #ccc;
            font-size: 16px;
            text-align: center;
            width: 80%;
            box-sizing: border-box;
        }

        .amountAdd:focus {
            outline: none;
            border-color: #5cb85c;
            box-shadow: 0 0 5px rgba(92, 184, 92, 0.5);
        }

        .option2 {
            border-radius: 30px;
            padding: 10px 20px;
            background-color: #5cb85c;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            box-sizing: border-box;
        }

        .option2:hover {
            background-color: #4cae4c;
        }

        .option2:active {
            background-color: #449d44;
        }

        .row {
            margin: 0 auto;
            align-items: center;
            padding-top: 15px;
            text-transform: none;
        }
    </style>

   </head>
   <body>
      <div class="hero_area">

         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->      

        <div class="container-center">
            <a href="javascript:history.back()" class="go-back-btn">Go Back</a>
          <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="box">
                  
                  <div class="img-box">
                      <img src="product/{{$product->image}}" alt="">
                  </div>
                  <div class="detail-box">
                      <h5>
                            {{$product->title}}
                      </h5>

                      <h6>
                            {{$product->description}}
                      </h6>
                      
                      @if ($product->discount_price != null)
                          <h6>
                                Discount Price: ${{$product->discount_price}}
                          </h6>

                          <h6 class="normal_price">
                                Normal Price: ${{$product->price}}
                          </h6>

                      @else

                          <h6>
                                Price: ${{$product->price}}
                          </h6>
                      @endif
                        
                        <h6>
                            Category: {{$product->category}}
                        </h6>

                        <h6>
                            Available: {{$product->quantity}}
                        </h6>
                  </div>

                  <div class="option_container">
                    <div class="options">
                        <form action="{{url('add_cart', $product->id)}}" method="POST">

                            @csrf
    
                            <div class="row">
                               <div class="col-md-4">
                                  <input type="number" name="quantity" value="1" min="1" class="amountAdd">
                               </div>
                               <div class="col-md-4">
                                  <input type="submit" class="option2" value="Add to Cart">
                               </div>
                            </div>
                        </form>
                    </div>
                </div>

                  @if ($product->discount_price != null)
                      <div class="save">
                          @php
                              $percentage_save = (($product->price - $product->discount_price) / $product->price) * 100;
                          @endphp

                          <h6 style="color: green;">
                              Save {{ round($percentage_save, 2) }}%!
                          </h6>
                      </div>
                  @endif
              </div>
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
