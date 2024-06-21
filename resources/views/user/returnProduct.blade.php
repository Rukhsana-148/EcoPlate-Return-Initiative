<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodhub</title>

  <!--
    - custom css link 
  -->
  <link rel="stylesheet" href="./assets/css/foodhub.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!--
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

</head>

<body>

  <!--
    - main container
  -->

  <div class="container">

    <!--
      - #HEADER
    -->

    <header>

      <nav class="navbar">

        <div class="navbar-wrapper">

          @include('user.header')
          <div class="navbar-btn-group">

            @if (Route::has('login'))
            
            @auth
           
            <li class="mt-3 mr-5">  <a href="{{url('/addRent')}}" class=" text-white">Add Rent</a></li>
            <li class="mt-3 mr-5">  <a href="{{url('/myRentPost')}}" class=" text-white">Rent Post</a></li>
            <li class="mt-3 ">  <a href="{{url('/wishlist')}}" class=" text-white">Wishlist</a></li>
            @include('dashboard')
                @else
               <li class="px-4 text-white   text-[15px]  mt-3 font-mono "> <a href="{{ route('login') }}" class="pr-5 pt-10 text-white font-mono text-[17px] ml-5 hover:text-orange-600">Login</a><li>
                 @if (Route::has('register'))
               <li class="px-4 text-white   text-[17px]  mt-3 font-mono "> <a href="{{ route('register') }}" class="pr-5  text-white font-mono text-[17px] ml-5 hover:text-orange-600 pt-10">Register</a></li>
              @endif
        @endauth
        @endif
            <button class="menu-toggle-btn">
              <span class="line one"></span>
              <span class="line two"></span>
              <span class="line three"></span>
            </button>

          </div>

        </div>

      </nav>

      <div class="cart-box">

        <ul class="cart-box-ul">

          <h4 class="cart-h4">Your order.</h4>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu1.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Saumon gravlax</h5>
              <p class="product-price">
                <span class="small">$</span>9
              </p>
            </a>
          </li>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu2.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Chevrefried with honey</h5>
              <p class="product-price">
                <span class="small">$</span>14
              </p>
            </a>
          </li>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu3.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Crispy fish</h5>
              <p class="product-price">
                <span class="small">$</span>4
              </p>
            </a>
          </li>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu4.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Stracciatella</h5>
              <p class="product-price">
                <span class="small">$</span>11
              </p>
            </a>
          </li>

          <li>
            <a href="#" class="cart-item">
              <div class="img-box">
                <img src="./assets/images/menu5.jpg" alt="product image" class="product-img" width="50" height="50"
                  loading="lazy">
              </div>

              <h5 class="product-name">Sea bream carpaccio</h5>
              <p class="product-price">
                <span class="small">$</span>19
              </p>
            </a>
          </li>

        </ul>

        <div class="cart-btn-group">
          <button class="btn btn-secondary">View order</button>
          <button class="btn btn-primary">Checkout</button>
        </div>

      </div>

    </header>





    <main>

      <!--
        - #HOME SECTION
      -->

   
      <table class="table  table-bordered my-[40px]">
        <thead class="thead-dark">
          <tr>
            <th class="border border-yellow-500 w-[150px] px-10 py-1">Food</th>

            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Quantity</th>
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Return</th>
            @foreach($buyP as $item)
             @if($item->rNumber=='')
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Request</th>
              @endif
            @endforeach
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Total</th>
           
          

           
          
          </tr>
        </thead>
        <tbody>
     @foreach($buyP as $item)
        
       <tr>
      <td class="border  border-yellow-500 w-[150px] px-10 py-1">  <img src="/uploadimage/{{$item->food->image}}" alt="product image" class="product-img" loading="lazy" style="width:70px; height:70px">
        <br/><span class="font-bold">{{$item->food->name}}</span></td>
        <td class="border  border-yellow-500 w-[250px] px-10 py-1">You order total {{$item->quantity}}</td>
         @if($item->rNumber=='')
        <td class="border  border-yellow-500 w-[300px] px-10 py-1">
        
            <form action="{{ url('/returnPolicy') }}" method="post">
                @csrf
                <input type="hidden" value="{{$item->id}}"  name="id" class="border border-yellow-500 rounded-lg px-6"/>
           
            <input type="number" min="1" max="{{$item->quantity}}" placeholder="Number of product" name="rNumber" class="border border-yellow-500 rounded-lg px-6"/>
              <input type="submit" name="submit" class="bg-yellow-500 mt-2 text-slate-500  px-5 py-1 rounded-lg" value="Return Request"/>
        </form>
       
        </td>
        @endif
        <td class="border  border-yellow-500 w-[250px] px-10 py-1" > <p>Return {{$item->returnProduct}} Pices {{$item->food->name}}</p>
          </td>
          <td class="border  border-yellow-500 w-[250px] px-10 py-1">You will have {{$item->totalGet}}</td>
        

    </tr>
     @endforeach



      <!--
        - #ABOUT SECTION
      -->

    




      <!--
        - #SERVICES SECTION
      -->

      





      <!--
        - #PRODUCT SECTION
      -->

    

    </main>





    <!--
      - #FOOTER
    -->

    <footer>

      <div class="footer-wrapper">

        <a href="#">
          <img src="./assets/images/logo-footer.svg" alt="logo" class="footer-brand" width="130">
        </a>

        <div class="social-link">

          <a href="#">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>

          <a href="#">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>

          <a href="#">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>

          <a href="#">
            <ion-icon name="logo-youtube"></ion-icon>
          </a>

        </div>

        <p class="copyright">&copy; Copyright 2022 codewithsadee. All Rights Reserved.</p>

      </div>

    </footer>

  </div>





  <!--
    - custom js link
  -->
  <script src="./assets/js/foodhub.js"></script>

  <!--
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
