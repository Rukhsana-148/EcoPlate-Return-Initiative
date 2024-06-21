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
    
<div class="pt-[70px]">
    <p class="font-bold py-[30px] text-center text-[20px] text-blue-500">Update Offer</p>
<!- Add -Offer->
<table class="table  table-bordered mb-5">
        <thead class="thead-dark">
          <tr>
            <th class="border border-black w-[150px] px-8 py-3">Product Name</th>
           <th class="border  border-black w-[100px] px-8 py-3">Offer Type</th>
            <th class="border  border-black w-[70px] px-8 py-3">Offer</th>
            <th class="border  border-black w-[70px] px-8 py-3">Buy</th>
            <th class="border  border-black w-[70px] px-8 py-3">Get</th>
          
            <th class="border  border-black w-[150px] px-8 py-3">Submit</th>
           
          
          </tr>
        </thead>
        <tbody>
          @foreach($foods as $food)
          <tr>
            <td class="border text-black border-black w-[150px] px-8 py-3">{{$food->name}}</td>

            <td class="border text-black border-black w-[100px] px-8 py-3"><form action="{{url('/offerFix')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name='foodId' value="{{$food->name}}" required class=" rounded-md w-[250px] font-mono my-3 ml-[25px] py-2 "/></br>

  <select name="offerType" class="py-1 px-3 rounded-lg">
<option name="offerType" value="percentage">Percentage</option>
<option name="offerType"   value="numeric">Numeric</option>


</select>
</td>
<td class="border text-black border-black w-[70px] px-8 py-3"  >        <input type="text" name='offer' Placeholder="Enter your discount/offer"  class=" rounded-md w-[170px] font-mono my-3 ml-[25px] py-2 "/></td>
<td class="border text-black border-black w-[70px] px-8 py-3"  >        <input type="text" name='buy' Placeholder="Enter your discount/offer"  class=" rounded-md w-[170px] font-mono my-3 ml-[25px] py-2 "/></td>
<td class="border text-black border-black w-[70px] px-8 py-3"  >        <input type="text" name='get' Placeholder="Enter your discount/offer"  class=" rounded-md w-[170px] font-mono my-3 ml-[25px] py-2 "/></td>

<td class="border text-black border-black w-[150px] px-8 py-3" ><input type="submit" value="Ok" />
</td>

</form>

          </tr>
         @endforeach
        </tbody>
      </table>



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
