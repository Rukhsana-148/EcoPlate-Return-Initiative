<a href="http://127.0.0.1:8000/" class="mr-3">
    <img src="./assets/images/logo.svg" alt="logo" width="130">
  </a>

  <ul class="navbar-nav">

    <li>
      <a href="http://127.0.0.1:8000/" class="nav-link">Home</a>
    </li>

   

    <li>
      <a href="http://127.0.0.1:8000/#menu" class="nav-link">Menu</a>
    </li>

    <li>
      <a href="{{url('/buyFood')}}" class="nav-link">BuyList</a>
    </li>
    <li>
      <a href="{{url('/returnProduct')}}" class="nav-link"> ReturnProduct</a>
    </li>

    <li>
      <a href="http://127.0.0.1:8000/#testimonials" class="nav-link">Testimonials</a>
    </li>

  </ul>
  <div class="navbar-btn-group">
    <button class="shopping-cart-btn">
       <a href="{{url('/cart')}}">
      <img src="./assets/images/cart.svg" alt="shopping cart icon" width="18">
      <span class="count">{{$productCount}}</span>
       </a>
    </button>
