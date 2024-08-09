<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')

    <style>  
        .main-panel {
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
      
        .content-wrapper {
            padding: 20px;
        }
  
        .div_center {
            text-align: center;
            margin-bottom: 20px;
        }
      
        .h2_font {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
            color: #ffffff;
        }
  
        .input_color {
            color: #333;
            padding: 10px;
            width: 60%;
            max-width: 400px;
            margin: 10px auto;
            border-radius: 5px;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }
  
        .input_color:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
            outline: none;
        }

        .div_design label {
            font-size: 20px;
            color: #484b4e;
            margin-right: -20%;
        }
  
        label {
            display: inline-block;
            width: 700px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #495057;
            text-align: right;
            padding-right: 10px;
        }
  
        .div_design {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
  
        select.input_color, 
        input[type="file"].input_color {
            width: calc(60% + 22px);
        }
  
        input[type="submit"] {
            background-color: #007bff;
            border: none;
            padding: 12px 25px;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: block;
            margin: 20px auto 0;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
  
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
  
        .alert {
            position: relative;
            padding: 1rem 1.5rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.375rem;
        }
    
        .alert-success {
            color: #0f5132;
            background-color: #d1e7dd;
            border-color: #badbcc;
        }
    
        .close {
            position: absolute;
            top: 0.75rem;
            right: 1.25rem;
            background: none;
            border: none;
            font-size: 1.25rem;
            line-height: 1;
            color: #000;
            opacity: 0.5;
        }
    
        .close:hover {
            opacity: 0.75;
        }

        .current_image {
            width: 300px;
            height: 300px;
            border-radius: 10px;
            margin: auto;
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
    
                <div class="div_center">
                  <h2 class="h2_font">Update Product Details</h2>
    
                  <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
    
                    @csrf
    
                    <div class="div_design">
                        <label>Product Title</label>
                        <input 
                          type="text"
                          name="title"
                          class="input_color"
                          placeholder="Add a Product Title"
                          required
                          value="{{$product->title}}"
                        >
                    </div>
      
                    <div class="div_design">
                        <label>Product Description</label>
                        <input 
                          type="text"
                          name="description"
                          class="input_color"
                          placeholder="Add a Description Of The Product"
                          required
                          value="{{$product->description}}"
                        >
                    </div>
      
                    <div class="div_design">
                        <label>Product Price</label>
                        <input 
                          type="number"
                          name="price"
                          class="input_color"
                          placeholder="Add The Price Of The Product"
                          required
                          value="{{$product->price}}"
                        >
                    </div>
      
                    <div class="div_design">
                        <label>Discount Price</label>
                        <input 
                          type="number"
                          name="discount_price"
                          class="input_color"
                          placeholder="Add a Discount Price"
                          value="{{$product->discount_price}}"
                        >
                    </div>
      
                    <div class="div_design">
                        <label>Product Quantity</label>
                        <input 
                          type="number"
                          name="quantity"
                          min="0"
                          class="input_color"
                          placeholder="Add the No. Of Product Items"
                          required
                          value="{{$product->quantity}}"
                        >
                    </div>
      
                    <div class="div_design">
                        <label>Product Category</label>
                        <select 
                          name="category" 
                          class="input_color"
                          required
                        >
                          <option value="{{$product->category}}" selected>{{$product->category}}</option>
    
                          @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                          @endforeach
                        </select>
                    </div>
    
                    <div class="div_design">
                        <label>Current Product Image</label>
                        <img class="current_image" src="/product/{{$product->image}}" alt="Product Image">
                    </div>
      
                    <div class="div_design">
                        <label>Change Product Image</label>
                        <input 
                          type="file"
                          name="image"
                          class="input_color"
                        >
                    </div>
      
                    <div class="div_design">
                        <input type="submit" value="Update Product">
                    </div>
    
                  </form>
                    
                </div>
            </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>