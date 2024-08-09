<!DOCTYPE html>
<html lang="en">
  <head>
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
  
        .h2_font {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin: 20px 0;
            color: #ffffff;
        }
  
        .table-container {
            overflow-x: auto;
        }
  
        .center {
            margin: auto;
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }
  
        .center th, .center td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
  
        .center th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            font-size: 25px;
        }
  
        .center td {
            background-color: #f9f9f9;
            color: #333;
            font-size: 20px;
        }
  
        .center img {
            width: 150px;
            height: auto;
            border-radius: 5px;
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
                          aria-hidden="true">
                          x
                        </button>
                        {{session()->get('message')}}
                    </div>
                @endif
    
                <h2 class="h2_font">All Products</h2>
                <div class="table-container">
                  <table class="center">
                    <tr>
                      <th>Product Title</th>
                      <th>Description</th>
                      <th>Quantity</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Discount Price</th>
                      <th>Product Image</th>
                      <th>Delete Item</th>
                      <th>Edit Item</th>
                    </tr>
    
                    @foreach($product as $product)
                    <tr>
                      <td>{{$product->title}}</td>
                      <td>{{$product->description}}</td>
                      <td>{{$product->quantity}}</td>
                      <td>{{$product->category}}</td>
                      <td>${{number_format($product->price, 2)}}</td>
                      <td>${{number_format($product->discount_price, 2)}}</td>
                      <td><img src="/product/{{$product->image}}" alt="Product Image"></td>
                      <td>
                        <a 
                          class="btn btn-dark" 
                          onclick="return confirm('Are you sure to delete this item?')" 
                          href="{{url('delete_product', $product->id)}}"
                        >
                          Delete
                        </a>
                      </td>
                      <td>
                        <a 
                          class="btn btn-dark" 
                          href="{{url('update_product', $product->id)}}"
                        >
                          Edit
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </table>
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