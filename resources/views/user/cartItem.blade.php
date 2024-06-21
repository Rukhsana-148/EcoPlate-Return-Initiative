<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Foodhub</title>

  <link rel="stylesheet" href="./assets/css/foodhub.css">
  <link rel="stylesheet" href="./assets/css/media_query.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Monoton&family=Rubik:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
</head>

<body>
  <div class="container mx-[50px]">
  @php
    $price=0;
  @endphp
    <section>
      <a href="http://127.0.0.1:8000/"><span  class="text-center text-[30px] text-yellow-500">X</span></a>
      
      @if($item)
      <h2 class="section-title text-[40px] py-[40px] px-[30px]">My Cart Item Product</h2>
      <div class="flex mx-[100px] py-[40px]">

        <div class="img-box">
        
          <img src="/uploadimage/{{$item->food->image}}" alt="product image" class="product-img" loading="lazy" style="width:200px; height:200px">
        </div>

        <div class="px-[20px]">
          <p>{{$item->food->name}}</p>
          
          <p>Price {{$item->food->price}} Tk. </p>
         
          @php
          if($item->food->offerType=='percentage' && $item->food->buy==''){
            $price = ($item->food->price*(100-$item->food->offer))/100;
           
          }elseif($item->food->offerType=='numeric'){
            $price = ($item->food->price-$item->food->offer);
            
          }else{
            
          }

          @endphp
          @if($item->food->buy!='')
          <p id="price" class="hidden mt-3">{{$item->food->price}}</p>
          @else
          <p id="price" class="hidden mt-3">{{$price}}</p>
          @endif
          @if($item->food->buy!='')
          <p  class="mt-3">Buy {{$item->food->buy}} Get {{$item->food->get}}</p>
          <p id="buy" ckass="hidden">{{$item->food->buy}}</p>
          <p id="get" class="hidden">{{$item->food->get}}</p>
          @elseif($item->food->offerType=='percentage' && $item->food->buy=='')
          <p >Discount - {{$item->food->offer}}%</p>
          @else 
          <p >Discount - {{$item->food->offer}}Tk</p>
          @endif
          <p id="total" class="hidden">{{$item->food->total}}</p>
          <form action="{{ url('/buy') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}" />
            <input type="hidden" name="buyId" value="{{$userId}}" />
            <input type="hidden" name="createId" value="{{$item->food->createId}}" />
            <input type="hidden" name="foodId" value="{{$item->food->id}}" />
            <p class="flex my-4">
              <span class="minus mr-1 px-3 py-1 rounded-lg bg-yellow-500 text-black">-</span>
              <input type="text" id="show" value="1" name="quantity" readonly class="w-[70px] border-none mr-1 px-3 py-1 rounded-lg bg-yellow-500 text-black">
              <span class="plus mr-1 px-3 py-1 rounded-lg bg-yellow-500 text-black">+</span>
            </p>
            Total Price : <input type="text" name="totalPrice" id="totalPrice" readonly class="border-none" />
        </br>
            You get: <input type="text" name="totalGet" id="totalGet" readonly class="border-none" />
            <input type="hidden" name="remain" id="remainingTotal" readonly />
            <br />
            <input type="submit" name="submit" value="Buy" class="bg-slate-500 mt-2 text-yellow-500 px-7 py-1 rounded-lg" />
          </form>
        </div>
      </div>
      @else
      <a href="http://127.0.0.1:8000/" class="mx-[200px] my-[200px]">Buy is confirmed!</a>
      @endif
    </section>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <script src="./assets/js/foodhub.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
  $(document).ready(function () {
    let buy = parseInt($('#buy').text());
    let get = parseInt($('#get').text());
    let total = parseInt($('#total').text());
    let price = parseFloat($('#price').text());
    let show = parseInt($('#show').val());

    function updateValues() {
        let totalGet = show;
        if (show >= buy) {
            totalGet += Math.floor(show / buy) * get;
        }
        
        if (totalGet > total) {
            totalGet = total;  // Ensure totalGet does not exceed total
            show = total - (Math.floor(total / (buy + get)) * get);
            $('#show').val(show);
        }

        $('#totalGet').val(totalGet);
        $('#remainingTotal').val(total - totalGet);

        let totalPrice = show * price;
        $('#totalPrice').val(totalPrice.toFixed(2));

        return totalGet;
    }

    $('.plus').click(function () {
        let totalGet = updateValues();
        if (totalGet < total) {
            show++;
            $('#show').val(show);
            updateValues();
        } else {
            alert('TotalGet is greater than or equal to the total limit!');
        }
    });

    $('.minus').click(function () {
        if (show > 1) {
            show--;
            $('#show').val(show);
            updateValues();
        }
    });

    updateValues();
});

</script>
</body>

</html>
