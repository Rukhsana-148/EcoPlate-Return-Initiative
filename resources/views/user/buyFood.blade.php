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

     

    </header>





    <main>

      <!--
        - #HOME SECTION
      -->
       
     
      <div class="grid grid-cols-3 mt-[190px] ">
    @foreach($buyP as $item)
        @php
       $offer = $buy = $total=$divisor = 0;
       
       @endphp
      <div class="flex mr-7 mb-[30px]  text-md bg-slate-400 py-4 px-3 rounded-xl">
        <div class="img-box pt-[30px] mr-6 text-sm">
          <img src="uploadimage\{{$item->food->image}}" alt="product image" class="product-img "  loading="lazy" style="width:110px; height:90px">
          {{$item->food->name}}
        </div>
        <div class="w-[350px]  pt-20px] text-[16px] font-normal">
          Dear Customer<br/>
          <span class="text-orange-600 text-md">{{$item->user->name}}, </span>
              <p class="flex"><span>Main Product : </span><span class=" pl-1 text-orange-600"> {{$item->quantity}} Pices</span> </p>
             @if($item->food->buy=='' && $item->food->offerType!='')
              <p class="flex"><span> Price : </span><span class="line-through pl-1 text-orange-600"> {{$item->food->price}} Tk.</span> </p>
             @else 
             <p class="flex"><span> Price : </span><span class=" pl-1 text-orange-600"> {{$item->food->price}} Tk.</span> </p>
           @endif
              @if($item->food->buy!='')

             <p class="flex"><span>You use  </span><span class=" pl-1 text-orange-600"> Buy {{$item->food->buy}} Get {{$item->food->get}} Offer</span> </p>
               @elseif($item->food->buy==''&&$item->food->offerType=='percentage')
               @php
               $price = ($item->food->price*(100-$item->food->offer))/100;
               @endphp
               <p class="flex"><span>Offer:  </span>  <span class=" pl-1 text-orange-600"> Discount {{$item->food->offer}} % </span></p>
                <p class="flex">Price :  <span class="text-lg font-semibold text-orange-500">{{$price}}Tk.</span>
               @else 
               <p class="flex"><span>Offer:  </span><span class=" pl-1 text-orange-600">Discount {{$item->food->offer}} Tk. </span> </p>
             @endif
              @php

              if($item->food->buy!=''){
              $buy = $item->food->buy;
              $offer = $item->food->offer;
              $divisor = (int)($item->quantity/$item->food->buy);
              $total = $item->quantity+($item->food->get)*$divisor;
              }
              
              
              @endphp
              @if($item->food->buy!='')
              <p class="flex">You get Total :<span class=" px-1 text-orange-600 ">{{$total}} pieces.</span></p>
             @else
             <p class="flex">You get Total :<span class=" px-1 text-orange-600 ">{{$item->totalGet}} pieces.</span></p>
             @endif 

              @if($item->rNumber!=''&&$item->returnPolicy=='Accepted')
              Beacuse
              <p class="flex"><span>You want to return </span><span class=" pl-1 text-orange-600"> {{$item->rNumber}} Pices</span></p>
        
         <p class="flex"><span>You have to  return total </span><span class=" pl-1 text-orange-600"> {{$item->returnProduct}} Pices</span> </p>

         <p class="flex"><span>You get back  </span><span class=" px-1 text-orange-600 ">{{$item->returnPrice}} Tk.</span></p>
         <p class="flex">At the last, you have only <span class="px-1 text-orange-600 ">{{$item->totalGet}} pieces.</span></p>
        @endif
        <p class="flex">Total Price: <span class="px-1 text-orange-600 ">{{$item->totalPrice}} Tk.</span></p>
       
        </div>
      </div>
      
      @endforeach
      </div>
    


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
