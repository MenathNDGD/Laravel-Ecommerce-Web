<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style>    
        .main-panel {
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          overflow: hidden;
        }
      
        .content-wrapper {
          padding: 20px;
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
          color: #000000;
          padding: 10px;
          width: 60%;
          max-width: 400px;
          margin: 10px auto;
          border-radius: 4px;
          border: 1px solid #252424;
          box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
      
        .btn-primary {
          background-color: #007bff;
          border: none;
          padding: 10px 20px;
          color: #fff;
          border-radius: 4px;
          cursor: pointer;
          transition: background-color 0.3s;
          margin-left: 15px;
        }
      
        .btn-primary:hover {
          background-color: #0056b3;
        }
      
        .center {
          width: 100%;
          max-width: 800px;
          margin: 0 auto;
          border-collapse: collapse;
          background-color: #fff;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          border-radius: 8px;
          overflow: hidden;
        }
      
        .center th, .center td {
          padding: 12px;
          text-align: center;
        }
      
        .center th {
          background-color: #007BFF;
          color: #fff;
          font-size: 20px;
        }
      
        .center td {
          border-bottom: 1px solid #000000;
          color: #000;
          font-size: 16px;
        }
        
        .btn-danger {
          background-color: #dc3545;
          padding: 8px 16px;
          border-radius: 4px;
          color: #fff;
          text-decoration: none;
          transition: background-color 0.3s ease;
        }
      
        .btn-danger:hover {
          background-color: #c82333;
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
    
                <div class="div_center">
                    <h2 class="h2_font">Add Category</h2>
                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                        <input 
                          type="text" 
                          name="category_name" 
                          class="input_color" 
                          placeholder="Add a Category Name"
                          required
                        >
                        <input 
                          type="submit" 
                          name="submit" 
                          class="btn btn-primary" 
                          value="Add Category"
                        >
                    </form>
                </div>
    
                <table class="center">
                  <thead>
                    <tr>
                      <th>Category Name</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $data)
                    <tr>
                      <td>{{$data->category_name}}</td>
                      <td>
                        <a 
                          onclick="return confirm('Are you sure to delete this category?')"
                          class="btn btn-danger" 
                          href="{{url('delete_category', $data->id)}}"
                        >
                          Delete
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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