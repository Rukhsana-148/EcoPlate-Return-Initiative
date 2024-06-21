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

      <nav class="navbar ml-7">

        <div class="navbar-wrapper -ml-5">

          <a href="http://127.0.0.1:8000/">
            <img src="./assets/images/logo.svg" alt="logo" width="130">
          </a>

          <ul class="navbar-nav ">

            <li>
              <a href="http://127.0.0.1:8000/" class="nav-link">Home</a>
            </li>


          
            <li>
              <a href="{{url('/createFood')}}" class="nav-link"> Add Food</a>
            </li>
           
            <li>
              <a href="{{url('/editFood')}}" class="nav-link"> Edit Food</a>
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

      <!--
        - #HOME SECTIO
        
      -->
      @php 
      $remain = $totalPrice = $total = $foodTotal =$actualTotal= 0;
      @endphp
      <div class="flex mt-[200px]">

   
    <div class="card bg-slate-400 px-10 py-3 mr-7  mb-[20px] w-[290px] rounded-md">
    
     <p>
      @foreach($sells as $item)
      @php
 
        $total = $total+$item->quantity;
        
        $return = $remain+ $item->returnProduct;
    
      @endphp
      @endforeach

      @foreach($foodItems as $item)
      @php
       
        $foodTotal = $foodTotal+$item->total;
       
        
       
      @endphp
      @endforeach
     
      Remain  : {{$foodTotal}} products

     </p>
    
     <p>Sold : {{$total}} product</p>
     Total Product : @php $actualTotal = $total+$foodTotal; echo $actualTotal; @endphp products

     
      </div>

  


   <div class="card bg-slate-400 px-10 py-2  mb-[20px] w-[270px] rounded-md">
   <p>
    @foreach($sells as $item)
    @php

      
      $totalPrice = $totalPrice+ $item->totalPrice;
      
     
    @endphp
    @endforeach
    Earned Money : {{$totalPrice}} Tk</p>
  </div>
    
    
</div>
<p class="text-center text-xl py-5">My Product Information</p>
  

<table class="table  table-bordered my-[40px]">
  <thead class="thead-dark">
    <tr>
      <th class="border border-yellow-500 w-[150px] px-10 py-1">Food</th>

      <th class="border  border-yellow-500 w-[150px] px-10 py-1">Total</th>
      <th class="border  border-yellow-500 w-[150px] px-10 py-1">offer Type</th>
      <th class="border  border-yellow-500 w-[150px] px-10 py-1">Offer</th>
      
     <th class="border  border-yellow-500 w-[150px] px-10 py-1">Total Price</th>
     
    </tr>
  </thead>
  <tbody>
@foreach($foodItems as $item)
 
 <tr>
<td class="border  border-yellow-500 w-[150px] px-10 py-1">  <img src="/uploadimage/{{$item->image}}" alt="product image" class="product-img" loading="lazy" style="width:70px; height:70px">
  <br/><span class="font-bold">{{$item->name}}</span></td>
  <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->total}}</td>
  
  <td class="border  border-yellow-500 w-[250px] px-10 py-1">
  @php
   if($item->buy!=''){
    echo "Buy & Get";
   }
    else if($item->offerType=='percentage' && $item->buy==''){
     echo 'Percentge discount Per '.$item->name;
    }else{
      echo 'Numeric Discount Per '.$item->name;
    }
   @endphp
  </td>
  <td class="border  border-yellow-500 w-[250px] px-10 py-1">
    @php
    if($item->buy!=''){
     echo "Buy ". $item->buy.
      " Get ". $item->get;
    }
     else if($item->offerType=='percentage' && $item->buy==''){
      echo ' Discount  '.$item->offer.'%';
     }else{
      echo ' Discount  '.$item->offer.'Tk';
     }
    @endphp

  </td>
  <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->price}}</td>
 
  
 </tr>
   @endforeach
  </tbody>
</table>   <!--
        - #ABOUT SECTION
      -->

      <p class="text-center text-xl py-5">Sold Product Information</p>
 
      <table class="table  table-bordered my-[40px]">
        <thead class="thead-dark">
          <tr>
            <th class="border border-yellow-500 w-[150px] px-10 py-1">Food</th>
      
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Sell</th>
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Customer Get</th>
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">offer Type</th>
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Offer</th>
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Back Main Product</th>
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Back With Offer Product</th>
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Total Price</th>
            
            <th class="border  border-yellow-500 w-[150px] px-10 py-1">Return Price</th>
          
          </tr>
        </thead>
        <tbody>
      @foreach($sells as $item)
       
       <tr>
      <td class="border  border-yellow-500 w-[150px] px-10 py-1">  <img src="/uploadimage/{{$item->food->image}}" alt="product image" class="product-img" loading="lazy" style="width:70px; height:70px">
        <br/><span class="font-bold">{{$item->food->name}}</span></td>
        <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->quantity}}</td>
        <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->totalGet}}</td>
        <td class="border  border-yellow-500 w-[250px] px-10 py-1">
        @php
         if($item->food->buy!=''){
          echo "Buy & Get";
         }
          else if($item->food->offerType=='percentage' && $item->food->buy==''){
           echo 'Percentge discount Per '.$item->food->name;
          }else{
            echo 'Numeric Discount Per '.$item->food->name;
          }
         @endphp
        </td>
        <td class="border  border-yellow-500 w-[250px] px-10 py-1">
          @php
          if($item->food->buy!=''){
           echo "Buy ". $item->food->buy.
            " Get ". $item->food->get;
          }
           else if($item->food->offerType=='percentage' && $item->food->buy==''){
            echo ' Discount  '.$item->food->offer.'%';
           }else{
            echo ' Discount  '.$item->food->offer.'Tk';
           }
          @endphp</td>
          <td class="border  border-yellow-500 w-[150px] px-10 py-1">
            
            {{$item->rNumber}}
          
          
          </td>
       
          
        <td class="border  border-yellow-500 w-[450px] px-10 py-1">
          @php 
            $remainproduct = $item->quantity-$item->rNumber;
            if($item->food->buy>0){
            
          
            if($item->rNumber<=$item->food->buy)
            {
              $returnTotal = $item->rNumber+1;
             echo "1 for offer & ". $item->rNumber. " is main product.\n Total = ".$returnTotal;
             
            
   
            }elseif($item->quantity%$item->food->buy==0){
              $divisor =ceil($item->rNumber/$item->food->buy);
          
              $returnProduct=($divisor*$item->food->get);
             $returnTotal= ($divisor*$item->food->get)+$item->rNumber;
             echo  $returnProduct." for offer & ". $item->rNumber. " is main product.\n Total = ".$returnTotal;
            }

              else{
                $divisor = (int)($item->rNumber/$item->food->buy);
          
             
             $returnProduct=($divisor*$item->food->get);
             $returnTotal= ($divisor*$item->food->get)+$item->rNumber;
             echo  $returnProduct." for offer & ". $item->rNumber. " is main product.\n Total = ".$returnTotal;
             
            }
          }
            
            @endphp
         </td>
        <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->totalPrice}}</td>
        <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->returnPrice}}</td>
        
        
       </tr>
         @endforeach
        </tbody>
      </table>



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
