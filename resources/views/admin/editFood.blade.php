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

            <a href="http://127.0.0.1:8000/">
                <img src="./assets/images/logo.svg" alt="logo" width="130">
              </a>
    
              <ul class="navbar-nav ml-7">
    
                <li>
                  <a href="http://127.0.0.1:8000/" class="nav-link">Home</a>
                </li>
    
    
              
                <li>
                  <a href="{{url('/createFood')}}" class="nav-link"> Add Food</a>
                </li>
               
    
                <li>
                  <a href="{{url('/returnFood')}}" class="nav-link"> Return</a>
                </li>
                <li>
                  <a href="{{url('/addOffer')}}" class="nav-link"> Offer</a>
                </li>
            
    
              </ul>

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

     

    </header>
    <main>
        <p class="font-bold pt-[140px] text-center text-[20px] text-slate-500">Add Food</p>
<div class="grid grid-cols-2">

    @foreach($foodItems as $item)
    
<div class="px-5 py-3 bg-yellow-400 rounded-lg mx-5 my-3">
    <form action="{{url('/editThisFood')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name='id' value="{{$item->id}}" required class="placeholder:text-yellow-900 border-2 border-yellow-500 rounded-md w-[250px] font-mono my-3 ml-[30px] py-2 pl-5 "/></br>
       
        <label>Product Type</label>
        <input type="text" name='type' value="{{$item->productType}}" required class="placeholder:text-yellow-900 border-2 border-yellow-500 rounded-md w-[250px] font-mono my-3 ml-[30px] py-2 pl-5 "/></br>
       
        <label>Product Name</label>
        <input type="text" name='name' value="{{$item->name}}" required class="placeholder:text-yellow-900 border-2 border-yellow-500 rounded-md w-[250px] font-mono my-3 ml-[28px] py-2 pl-5 "/></br>
       
        <label>Food Price</label>
        <input type="text" name='price' value="{{$item->price}}" required class="placeholder:text-yellow-900 border-2 border-yellow-500 rounded-md w-[250px] font-mono my-3 ml-[50px] py-2 pl-5 "/></br>
        <label>Food Image</label>
        <img src="/uploadimage/{{$item->image}}" alt="product image" class="product-img ml-5 py-2" loading="lazy" style="width:70px; height:70px"/>
        <input type="file" name='image' placeholder="Enter product image"  class="placeholder:text-yellow-900 border-2 border-yellow-500 rounded-md w-[250px] font-mono my-3 ml-[40px] py-2 pl-5 "/></br>
      
        <label>Quantity</label>
        <input type="number" name='total' value='{{$item->total}}' required class="placeholder:text-yellow-900 border-2 border-yellow-500 rounded-md w-[250px] font-mono my-3 ml-[40px] py-2 pl-5 "/></br>
        
         <input type="submit" name="submit" value="submit" class=" bg-slate-500 px-7 py-2 ml-[120px] mb-[40px] rounded-lg text-white w-[255px]"/>
    </form>
</div>
   @endforeach



</div>

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
