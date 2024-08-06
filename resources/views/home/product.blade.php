<style>
   .save {
      text-align: right;
      margin-top: 5px;
      font-weight: 500;
   }
</style>

<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <div class="row">

        @foreach ($product as $products)

         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="" class="option1">
                     Men's Shirt
                     </a>
                     <a href="" class="option2">
                     Buy Now
                     </a>
                  </div>
               </div>
               <div class="img-box">
                  <img src="product/{{$products->image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{$products->title}}
                  </h5>
                  
                  @if ($products->discount_price != null)
                    <h6>
                       ${{$products->discount_price}}
                    </h6>

                    <h6 style="text-decoration: red line-through">
                       ${{$products->price}}
                    </h6>

                 @else

                    <h6>
                       ${{$products->price}}
                    </h6>
                  @endif
               </div>

               @if ($products->discount_price != null)
                  <div class="save">
                     @php
                        $percentage_save = (($products->price - $products->discount_price) / $products->price) * 100;
                     @endphp

                     <h6 style="color: green;">
                        Save {{ round($percentage_save, 2) }}%!
                     </h6>
                  </div>
               @endif
            </div>
         </div>
         
        @endforeach

      <div class="btn-box">
         <a href="">
            View All products
         </a>
      </div>
   </div>
</section>
