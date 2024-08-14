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
               <li class="nav-item active">
                  <a class="nav-link" href="{{ url('/products') }}">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/blog') }}">Blog</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/show_cart') }}">
                    Cart 
                    @if(isset($cartCount) && $cartCount > 0)
                      <span class="badge badge-pill badge-dark">{{ $cartCount }}</span>
                    @endif
                  </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{ url('/my_orders') }}">Orders</a>
              </li>
               <form class="form-inline">
                 <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                 <i class="fa fa-search" aria-hidden="true"></i>
                 </button>
              </form>

               @if (Route::has('login'))
                 @auth
                  <li class="nav-item dropdown">
                     <a id="navbarDropdown" class="nav-link dropdown-toggle userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('/dashboard') }}">
                           Profile
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                           @csrf
                           <button type="submit" class="dropdown-item">
                              Logout
                           </button>
                        </form>
                     </div>
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

<style>
   .nav-link {
      display: flex;
      align-items: center;
   }

   .badge {
      margin-left: 5px;
   }

   .nav-item .nav-link {
      color: white;
      text-decoration: none;
      font-weight: bold;
   }

   .nav-item .nav-link:hover {
      color: #d4e157;
   }

   .nav-item.dropdown {
      position: relative;
   }

   .userDropdown {
      border: 2px solid #dbd5d5;
      margin-left: 20px;
   }

   .dropdown-menu {
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
      background-color: #ffffff;
      border: 1px solid #ddd;
      border-radius: 0.25rem;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      z-index: 1000;
   }

   .dropdown-menu .dropdown-item {
      padding: 10px 15px;
      color: #333;
      text-decoration: none;
      display: block;
   }

   .dropdown-menu .dropdown-item:hover {
      background-color: #f1f1f1;
   }

   .nav-item.dropdown.show .dropdown-menu {
      display: block;
   }
 </style>