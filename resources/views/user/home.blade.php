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
           
            @if (Route::has('login'))
            
            @auth
            <x-app-layout>
    
            </x-app-layout>
                @else
               <li > <a href="{{ route('login') }}" class="nav-link">Login</a><li>
                 @if (Route::has('register'))
               <li> <a href="{{ route('register') }}" class="nav-link">Register</a></li>
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

      <section class="home" id="home">

        <div class="home-left">

          <p class="home-subtext">Hi, new friend!</p>

          <h1 class="main-heading">We do not cook, we create your emotions!</h1>

          <p class="home-text">
            Consectetur numquam poro nemo veniam eligendi rem adipisci quo modi
          </p>

          <div class="btn-group">

            <button class="btn btn-primary btn-icon">
              <img src="./assets/images/menu.svg" alt="menu icon">
              Our menu
            </button>

            <button class="btn btn-secondary btn-icon">
              <img src="./assets/images/arrow.svg" alt="menu icon">
              About us
            </button>

          </div>

        </div>

        <div class="home-right">

          <img src="./assets/images/food1.png" alt="food image" class="food-img food-1" width="200" loading="lazy">
          <img src="./assets/images/food2.png" alt="food image" class="food-img food-2" width="200" loading="lazy">
          <img src="./assets/images/food3.png" alt="food image" class="food-img food-3" width="200" loading="lazy">

          <img src="./assets/images/dialog-1.svg" alt="dialog" class="dialog dialog-1" width="230">
          <img src="./assets/images/dialog-2.svg" alt="dialog" class="dialog dialog-2" width="230">

          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-1" width="25">
          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-2" width="15">
          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-3" width="30">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-4" width="60">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-5" width="40">

        </div>

      </section>





      <!--
        - #ABOUT SECTION
      -->

      <section class="about" id="about">

        <div class="about-left">

          <div class="img-box">
            <img src="./assets/images/about-image.jpg" alt="about image" class="about-img" width="250">
          </div>

          <div class="abs-content-box">
            <div class="dotted-border">
              <p class="number-lg">17</p>
              <p class="text-md">Years <br> Experiense</p>
            </div>
          </div>

          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-6" width="20">
          <img src="./assets/images/circle.svg" alt="circle shape" class="shape shape-7" width="30">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-8" width="35">
          <img src="./assets/images/ring.svg" alt="ring shape" class="shape shape-9" width="80">

        </div>

        <div class="about-right">

          <h2 class="section-title">We are doing more than
            you expect</h2>

          <p class="section-text">
            Faudantium magnam error temporibus ipsam aliquid neque quibusdam dolorum, quia ea numquam assumenda mollitia
            dolorem
            impedit. Voluptate at quis exercitationem officia temporibus adipisci quae totam enim dolorum, assumenda.
            Sapiente
            soluta nostrum reprehenderit a velit obcaecati facilis vitae magnam tenetur neque vel itaque inventore eaque
            explicabo
            commodi maxime! Aliquam quasi, voluptates odio.
          </p>

          <p class="section-text">
            Consectetur adipisicing elit. Cupiditate nesciunt amet facilis numquam, nam adipisci qui voluptate voluptas
            enim
            obcaecati veritatis animi nulla, mollitia commodi quaerat ex, autem ea laborum.
          </p>

          <img src="./assets/images/signature.png" alt="signature" class="signature" width="150">

        </div>

      </section>





      <!--
        - #SERVICES SECTION
      -->

      <section class="services" id="services">

        <div class="service-card">

          <p class="card-number">01</p>

          <h3 class="card-heading">We are located in the city center</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">02</p>

          <h3 class="card-heading">Fresh ingredients from organic farms</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">03</p>

          <h3 class="card-heading">Own fast delivery. 30 min Maximum</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">04</p>

          <h3 class="card-heading">Professional, experienced chefs</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.
          </p>

        </div>

        <div class="service-card">

          <p class="card-number">05</p>

          <h3 class="card-heading">The highest standards of service</h3>

          <p class="card-text">
            Porro nemo veniam necessitatibus praesentium eligendi rem temporibus adipisci quo modi numquam.
          </p>

        </div>

      </section>





      <!--
        - #PRODUCT SECTION
      -->
       


      <section class="product" id="menu">

        <h2 class="section-title">Most popular dishes</h2>

        <p class="section-text">
          Consectetur numquam poro nemo veniam
          eligendi rem adipisci quo modi.
        </p>

        <div class="products-grid">
        @foreach($foods as $food)
          <a href="#">

            <div class="product-card">

              <div class="img-box">
                <img src="uploadimage\{{$food->image}}" alt="product image" class="product-img"  loading="lazy" style="width:300px; height:300px">
              </div>

              <div class="product-content">

                <div class="wrapper">
                  <h3 class="product-name">{{$food->name}}</h3>

      @php 
      $foodCount = $riceCount =  0;
    @endphp

   @foreach($buyP as $item)
   @if($foodCount==1)
   @php 
   break;
   @endphp
     
@elseif($item->food->name=='Beef Burger')
@php
   $foodCount++;
   @endphp

 @endif              
    @endforeach
   @foreach($buyP as $item)
      @if($riceCount==1)
        @php break;
        @endphp
          
     @elseif($item->food->name=='Fried Rice')
     @php
        $riceCount++;
        @endphp
   
      @endif
   @endforeach
@if($food->name=='Egg Burger')
@if($foodCount==1 && $riceCount==1)
<p class="font-bold text-sm text-orange-500">You will Free This Items</p>
@else
<p>COndition is not fillup.</p>
{{$foodCount}}-{{$riceCount}}

@endif
@endif
 
                  @if($food->buy=='' && $food->offerType!='')
                  <p class="line-through px-[16px] py-1 rounded-md mt-2 text-yellow-700 font-semibold">
                   {{$food->price}} Tk.
                  </p>
                  @else
                  <p class=" px-[16px] py-1 rounded-md mt-2 text-yellow-700 font-semibold">
                    {{$food->price}} Tk.
                   </p>
                   @endif
                </div>

               

   @if($food->offerType=='percentage' && $food->buy=='')
   @php
   $price = ($food->price*(100-$food->offer))/100;
   @endphp
    <p class="">Discount: {{$food->offer}}% <br/><span class="text-lg font-semibold text-orange-500"> Price : {{$price}}</span></p>
   @elseif($food->offerType=='numeric' && $food->buy=='')
   @php 
      $price = ($food->price-$food->offer);
   @endphp
   <p class="">Discount: {{$food->offer}} Taka <br/><span class="text-lg font-semibold text-orange-500"> Price : {{$price}}</span></p>
   @elseif($food->buy!='')
   <button class="bg-yellow-500 text-white px-5 ml-2  mt-2 py-2 text-[15px] rounded-md">Buy {{$food->buy}} Get {{$food->get}}</button>
  @else

   <p class=""></p>
  
  @endif
  <form action="{{ url('/addToCart') }}" method="post">
    @csrf
    <input type="hidden" name="foodId" value="{{$food->id}}"/>
    <input type="hidden" name="userId" value="{{$userId}}"/>
    <input type="submit" name="submit"  value="Add To Cart" class="cart px-7 py-2 mt-2 rounded-lg text-[15px] bg-slate-700 text-white hover:bg-yellow-600 hover:text-black"/>
  </form>

               

              </div>

            </div>

          </a>

@endforeach

        </div>

        

      </section>
<section>
  <h2 class="section-title">My Cart Items</h2>
  
         <table class="table  table-bordered my-[40px]">
          <thead class="thead-dark">
            <tr>
              <th class="border border-yellow-500 w-[150px] px-10 py-1">Product Name</th>
             <th class="border  border-yellow-500 w-[150px] px-10 py-1">Price</th>
              <th class="border  border-yellow-500 w-[150px] px-10 py-1">Offer</th>
              <th class="border  border-yellow-500 w-[150px] px-10 py-1">Image</th>
              <th class="border  border-yellow-500 w-[150px] px-10 py-1">Get</th>
            

             
            
            </tr>
          </thead>
          <tbody>
          @foreach($cartItems as $item)
          <tr>
            <td class="border text-black border-yellow-500 w-[250px] px-10 py-1">{{$item->food->name}}</td>
            <td class="border text-black border-yellow-500 w-[250px] px-10 py-1">{{$item->food->price}}Tk</td>
            @if($item->food->buy!='')
            <td class="border text-black border-yellow-500 w-[250px] px-10 py-1">Buy {{$item->food->buy}}  Get {{$item->food->get}}</td>
             @elseif($item->food->buy=='' & $item->food->offerType=='percentage')
             <td class="border text-black border-yellow-500 w-[250px] px-10 py-1"> {{$item->food->offer}}%  </td>
             @else
             <td class="border text-black border-yellow-500 w-[250px] px-10 py-1"> {{$item->food->offer}}Tk  </td>
                @endif
             <td class="border text-black border-yellow-500 w-[250px] px-10 py-1"><img src="uploadimage\{{$item->food->image}}" alt="product image" class="product-img"  loading="lazy" style="width:70px; height:70px">
            </td>
            <td class="border text-black border-yellow-500 w-[250px] px-10 py-1"> <a href="{{url('/buyNow', $item->id)}}">Buy</a></td>
          </tr>
         @endforeach
          </tbody>
         </table>
</section>

      


      <!--
        - #TESTIMONIALS SECTION
      -->

      <section class="testimonials" id="testimonials">

        <h2 class="section-title">What our customers say?</h2>

        <p class="section-text">
          Consectetur numquam poro nemo veniam
          eligendi rem adipisci quo modi.
        </p>

        <div class="testimonials-grid">

          <div class="testimonials-card">

            <h4 class="card-title">Very tasty</h4>

            <div class="testimonials-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
            </div>

            <p class="testimonials-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis fugiat totam nobis quas unde excepturi
              inventore possimus
              laudantium provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
              tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem accusamus! Quibusdam
              labore,
              aliquam dolor harum!
            </p>

            <div class="customer-info">
              <div class="customer-img-box">
                <img src="./assets/images/testimonials1.jpg" alt="customer image" class="customer-img" width="100" loading="lazy">
              </div>

              <h5 class="customer-name">Emma Newman</h5>
            </div>

          </div>

          <div class="testimonials-card">
          
            <h4 class="card-title">I have lunch here every day</h4>
          
            <div class="testimonials-rating">
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
              <ion-icon name="star"></ion-icon>
            </div>
          
            <p class="testimonials-text">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis fugiat totam nobis quas unde excepturi
              inventore possimus
              laudantium provident, rem eligendi velit. Aut molestias, ipsa itaque laborum, natus
              tempora, ut soluta animi ducimus dignissimos deserunt doloribus in reprehenderit rem accusamus! Quibusdam
              labore,
              aliquam dolor harum!
            </p>
          
            <div class="customer-info">
              <div class="customer-img-box">
                <img src="./assets/images/testimonials2.jpg" alt="customer image" class="customer-img" width="100" loading="lazy">
              </div>
          
              <h5 class="customer-name">Paul Trueman</h5>
            </div>
          
          </div>

        </div>

      </section>

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
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      var number = $('.count').val();
    console.log(number);
    $('.cart').click(function() {
        number++;
        $('.count').text(number);
    });


    
});
  </script>
</body>

</html>
