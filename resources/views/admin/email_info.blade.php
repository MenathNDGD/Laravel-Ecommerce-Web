<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
      .container-fluid {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .content-wrapper {
        background-color: #fff;
        color: #333;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 1100px;
        min-height: 60vh;
        margin: 0 auto;
      }

      h1 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        color: #4CAF50;
      }

      form div {
        margin-bottom: 20px;
      }

      label {
        display: block;
        font-weight: bold;
        margin-bottom: 8px;
      }

      input[type="text"] {
        width: 100%;
        padding: 12px;
        border-radius: 4px;
        border: 1px solid #ddd;
        box-sizing: border-box;
        font-size: 16px;
        transition: border-color 0.3s;
      }

      input[type="text"]:focus {
        border-color: #4CAF50;
        outline: none;
      }

      input[type="submit"] {
        width: 20%;
        background-color: #4CAF50;
        color: #fff;
        padding: 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 18px;
        transition: background-color 0.3s;
      }

      input[type="submit"]:hover {
        background-color: #45a049;
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

            <form action="{{ url('send_user_email', $order->id) }}" method="POST">

                @csrf

              <h1>Send Email to {{$order->email}}</h1>

              <div>
                <label>Email Greeting</label>
                <input type="text" name="greeting">
              </div>

              <div>
                <label>Email Header</label>
                <input type="text" name="header">
              </div>

              <div>
                <label>Email Body</label>
                <input type="text" name="body">
              </div>

              <div>
                <label>Email Button Name</label>
                <input type="text" name="button">
              </div>

              <div>
                <label>Email URL</label>
                <input type="text" name="url">
              </div>

              <div>
                <label>Email Footer</label>
                <input type="text" name="footer">
              </div>

              <div>
                <input type="submit" value="Send">
              </div>

            </form>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
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
