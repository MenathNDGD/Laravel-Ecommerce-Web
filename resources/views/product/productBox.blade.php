<style>
   .save {
      text-align: right;
      margin-top: 8px;
      font-weight: 600;
   }
   
   .allProduct {
      margin: 0 auto;
   }
   
   .row {
      margin: 0 auto;
      align-items: center;
      padding-top: 15px;
      text-transform: none;
   }
   
   .amountAdd {
      margin: 0;
      border-radius: 30px;
      border: 1px solid #ccc;
      font-size: 16px;
      text-align: center;
      width: 100%;
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
   
   .option1 {
      display: block;
      padding: 10px 20px;
      background-color: #0275d8;
      color: #fff;
      text-decoration: none;
      border-radius: 30px;
      text-align: center;
      margin-bottom: 10px;
      transition: background-color 0.3s ease;
   }
   
   .option1:hover {
      background-color: #025aa5;
   }
   
   .option1:active {
      background-color: #014682;
   }
   
   .box {
      border: 1px solid #e0e0e0;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
   }
   
   .box:hover {
      transform: translateY(-5px);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
   }

   .product-detail {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-top: 10px;
      font-weight: bold;
   }

   .product-category {
      text-align: left;
      display: flex;
      align-items: center;
      font-size: 16px;
   }

   .product-category i {
      margin-right: 8px;
   }

   .save {
      text-align: right;
      color: green;
      font-size: 16px;
      font-weight: bold;
      margin-top: 0;
   }
</style>

<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>Products</span>
         </h2>
      </div>
      <div class="row">

         @foreach($product as $product)

            <div class="col-sm-6 col-md-4 col-lg-3">
               <div class="box">
                  <div class="option_container">                      
                     <div class="options">
                         <a href="{{url('product_details', $product->id)}}" class="option1">
                             {{$product->title}}
                         </a>
                         <a href="" class="option2">
                            Buy Now
                         </a>
                     </div>
                  </div>
                  <div class="img-box">
                     <img src="{{ asset('product/'.$product->image) }}" alt="">
                  </div>
                  <div class="detail-box">                     
                     @if ($product->discount_price != null)
                         <h6>${{number_format($product->discount_price, 2)}}</h6>
                         <h6 style="text-decoration: red line-through">
                             ${{number_format($product->price, 2)}}
                         </h6>
                     @else
                         <h6>${{number_format($product->price, 2)}}</h6>
                     @endif
                  </div>
                  <div class="product-detail">
                     <div class="product-category">
                        <i class="fa fa-tags"></i>
                        {{$product->category}}
                     </div>
               
                     @if ($product->discount_price != null)
                        <div class="save">
                           @php
                              $percentage_save = (($product->price - $product->discount_price) / $product->price) * 100;
                           @endphp
                           Save {{ round($percentage_save, 2) }}%!
                        </div>
                     @endif
                  </div>
               </div>
            </div>

         @endforeach
      </div>
   </div>
</section>
