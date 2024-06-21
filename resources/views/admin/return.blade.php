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
        <p class="font-bold pt-[190px] text-center text-[20px] text-yellow-500">Return Request</p>
      <div class="">
       
        <table class="table  table-bordered my-[40px]">
            <thead class="thead-dark">
              <tr>
                <th class="border border-yellow-500 w-[150px] px-10 py-1">Food</th>
    
                <th class="border  border-yellow-500 w-[150px] px-10 py-1">Quantity</th>
                <th class="border  border-yellow-500 w-[150px] px-10 py-1">Total</th>
                <th class="border  border-yellow-500 w-[150px] px-10 py-1">Return Number</th>
                <th class="border  border-yellow-500 w-[150px] px-10 py-1">Total Price</th>
                
                <th class="border  border-yellow-500 w-[150px] px-10 py-1">Back Price</th>
                
                <th class="border  border-yellow-500 w-[150px] px-10 py-1">Request</th>
              
    
               
              
              </tr>
            </thead>
            <tbody>
         @foreach($sellP as $item)
            
           <tr>
          <td class="border  border-yellow-500 w-[150px] px-10 py-1">  <img src="/uploadimage/{{$item->food->image}}" alt="product image" class="product-img" loading="lazy" style="width:70px; height:70px">
            <br/><span class="font-bold">{{$item->food->name}}</span></td>
            <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->quantity}}</td>
            <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->totalGet}}</td>
            <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->rNumber}}</td>
            <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->totalPrice}}</td>
            <td class="border  border-yellow-500 w-[150px] px-10 py-1">{{$item->returnPrice}}</td>
            
            
            <td class="border  border-yellow-500 w-[150px] px-10 py-1">
                @if($item->returnPolicy=='Accepted')
              <p class="py-2 bg-blue-500 text-white px-5  rounded-lg">Accepted</p>
              @elseif($item->returnPolicy != 'Accepted')
              @php
                  $remainProduct = $item->quantity - $item->rNumber;
                  $returnProduct = 0;
                  $returnPrice = 0;
                  $price = 0;
                  $total = 0;
                  
                  if ($item->food->buy != '') {
                     
                      if ($item->rNumber <= $item->food->buy) {
                          $returnProduct = $item->rNumber + 1;
                          $remainProduct = $item->totalGet - $returnProduct;
                          $returnPrice = $item->rNumber * $item->food->price;
                          $price = $item->totalPrice - $returnPrice;
                          $total = $item->food->total + $returnProduct;
                      } else if($item->quantity%$item->food->buy==0){
                        $divisor = ceil($item->rNumber / $item->food->buy);
                        
                          $returnProduct = ($divisor * $item->food->get) + $item->rNumber;
                          $remainProduct = $item->totalGet - $returnProduct;
                          $returnPrice = $item->rNumber * $item->food->price;
                          $price = $item->totalPrice - $returnPrice;
                          $total = $item->food->total + $returnProduct;
                      }else{
                        $divisor = (int)($item->rNumber / $item->food->buy);
          
                          $returnProduct = ($divisor * $item->food->get) + $item->rNumber;
                          $remainProduct = $item->totalGet - $returnProduct;
                          $returnPrice = $item->rNumber * $item->food->price;
                          $price = $item->totalPrice - $returnPrice;
                          $total = $item->food->total + $returnProduct;
                      }
                  } elseif ($item->food->offerType == 'percentage' && $item->food->buy == '') {
                      $returnProduct = $item->rNumber;
                      $remainProduct = $item->totalGet - $returnProduct;
                      $returnPrice = $item->rNumber * (($item->food->price * (100 - $item->food->offer)) / 100);
                      $price = $item->totalPrice - $returnPrice;
                      $total = $item->food->total + $returnProduct;
                  } elseif ($item->food->offerType == 'numeric') {
                      $returnProduct = $item->rNumber;
                      $remainProduct = $item->totalGet - $returnProduct;
                      $returnPrice = $item->rNumber * ($item->food->price - $item->food->offer);
                      $price = $item->totalPrice - $returnPrice;
                      $total = $item->food->total + $returnProduct;
                  }
              @endphp
          
              <form action="{{ url('/accepted') }}" method="post">
                  @csrf
                  <input type="hidden" value="{{ $item->id }}" name="id" class="border border-yellow-500 rounded-lg px-6"/>
                  <input type="hidden" value="{{ $item->food->id }}" name="foodId" class="border border-yellow-500 rounded-lg px-6"/>
                  <input type="hidden" min="1" value="{{ $returnProduct }}" name="nReturn" class="border border-yellow-500 rounded-lg px-6"/>
                  <input type="hidden" min="1" value="{{ $remainProduct }}" name="totalGet" class="border border-yellow-500 rounded-lg px-6"/>
                  <input type="hidden" min="1" value="{{ $returnPrice }}" name="returnPrice" class="border border-yellow-500 rounded-lg px-6"/>
                  <input type="hidden" min="1" value="{{ $total }}" name="total" class="border border-yellow-500 rounded-lg px-6"/>
                  <input type="hidden" min="1" value="{{ $price }}" name="price" class="border border-yellow-500 rounded-lg px-6"/>
                  <input type="submit" name="submit" class="bg-yellow-500 mt-2 text-slate-100 px-5 py-1 rounded-lg" value="Accept Return Request"/>
              </form>
    
          
        @else 
        <p class="py-2 bg-red-500 text-white px-5  rounded-lg">No Request</p>
        @endif
    </tr>
      @endforeach
            </tbody>
        </table>

    

    </main>



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

    <!--
      - #FOOTER
    -->


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
