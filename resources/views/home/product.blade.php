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
</style>

<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>Products</span>
         </h2>
      </div>
      <div class="row">

        @foreach ($product as $products)

         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">

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

                  <div class="options">
                     <a href="{{url('product_details', $products->id)}}" class="option1">
                     {{$products->title}}
                     </a>
                     <form action="{{url('add_cart', $products->id)}}" method="POST">

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

      <div class="btn-box allProduct">
         <a href="">
            View All products
         </a>
      </div>
   </div>
</section>
