<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout></x-app-layout>
<div class="mx-[500px] my-[50px]">
<p class="font-bold py-[30px] text-center text-[20px] text-blue-500">Add Product</p>
<form action="{{url('/addFood')}}" method="post" enctype="multipart/form-data" >
    @csrf
    <input type="hidden" name='user_id' value="{{$userId}}" required class=" rounded-md w-[250px] font-mono my-3 ml-[25px] py-2 "/></br>
    <label>Product Type</label>
    <input type="text" name='type' placeholder="Enter product name" required class="placeholder:text-blue-900 border-2 border-blue-700 rounded-md w-[250px] font-mono my-3 ml-[25px] py-2 pl-5 "/></br>
   
    <label>Product Name</label>
    <input type="text" name='name' placeholder="Enter product name" required class="placeholder:text-blue-900 border-2 border-blue-700 rounded-md w-[250px] font-mono my-3 ml-[25px] py-2 pl-5 "/></br>
   
    <label>Food Price</label>
    <input type="text" name='price' placeholder="Enter product price" required class="placeholder:text-blue-900 border-2 border-blue-700 rounded-md w-[250px] font-mono my-3 ml-[10px] py-2 pl-5 "/></br>
    <label>Food Image</label>
    <input type="file" name='image' placeholder="Enter product image" required class="placeholder:text-blue-900 border-2 border-blue-700 rounded-md w-[250px] font-mono my-3 ml-[23px] py-2 pl-5 "/></br>
    
     <input type="submit" name="submit" value="submit" class="btn bg-blue-500 px-7 py-2 ml-[100px] rounded-lg text-white w-[255px]"/>
</form>
<p class="font-bold py-[30px] text-center text-[20px] text-blue-500">Update Offer</p>
<!- Add -Offer->
<table class="table  table-bordered">
        <thead class="thead-dark">
          <tr>
            <th class="border border-black w-[150px] px-8 py-3">Product Name</th>
           <th class="border  border-black w-[150px] px-8 py-3">Offer Type</th>
            <th class="border  border-black w-[150px] px-8 py-3">Offer</th>
            <th class="border  border-black w-[150px] px-8 py-3">Buy</th>
            <th class="border  border-black w-[150px] px-8 py-3">Get</th>
          
            <th class="border  border-black w-[150px] px-8 py-3">Submit</th>
           
          
          </tr>
        </thead>
        <tbody>
          @foreach($foods as $food)
          <tr>
            <td class="border text-black border-black w-[150px] px-8 py-3">{{$food->name}}</td>

            <td class="border text-black border-black w-[150px] px-8 py-3"><form action="{{url('/offerFix')}}" method="post" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name='foodId' value="{{$food->name}}" required class=" rounded-md w-[250px] font-mono my-3 ml-[25px] py-2 "/></br>

  <select name="offerType" class="py-1 px-3 rounded-lg">
<option name="offerType" value="percentage">Percentage</option>
<option name="offerType"   value="numeric">Numeric</option>


</select>
</td>
<td class="border text-black border-black w-[150px] px-8 py-3"  >        <input type="text" name='offer' Placeholder="Enter your discount/offer"  class=" rounded-md w-[250px] font-mono my-3 ml-[25px] py-2 "/></td>
<td class="border text-black border-black w-[150px] px-8 py-3"  >        <input type="text" name='buy' Placeholder="Enter your discount/offer"  class=" rounded-md w-[250px] font-mono my-3 ml-[25px] py-2 "/></td>
<td class="border text-black border-black w-[150px] px-8 py-3"  >        <input type="text" name='get' Placeholder="Enter your discount/offer"  class=" rounded-md w-[250px] font-mono my-3 ml-[25px] py-2 "/></td>

<td class="border text-black border-black w-[150px] px-8 py-3" ><input type="submit" value="Ok" />
</td>

</form>

          </tr>
         @endforeach
        </tbody>
      </table>  
    <p class="font-bold py-[30px] text-center text-[20px] text-blue-500">Return Request</p>
      <div class="">
        <table class="table  table-bordered">
            <thead>
                <tr>
                  <th class="border text-black border-black w-[290px] px-8 py-3">Food Name</th>
                    <th class="border text-black border-black w-[290px] px-8 py-3">Request of Return</th> <!-- Empty header for the button column -->
                </tr>
            </thead>
            <tbody>
              @foreach($sellP as $item)
              <tr>
                <td class="border text-black border-black w-[290px] px-8 py-3">{{ $item->food->name }}</td>
                <td class="border text-black border-black w-[290px] px-8 py-3">{{ $item->quantity }}</td>
                <td class="border text-black border-black w-[290px] px-8 py-3">{{ $item->rNumber }}</td>
                
                
                <td class="border text-black border-black w-[290px] px-8 py-3">
                      @if($item->returnPolicy == 'Want to Return')
                      <form action="{{ url('/accepted') }}" method="post">
                          @csrf
                          <input type="hidden" name="id" value="{{ $item->id }}"/>
                          <input type="hidden" name="returnPolicy" value="Accepted"/>
                          <button type="submit" class="px-5 py-2 bg-blue-500 rounded-md text-white">Accept Request</button>
                      </form>
                      @else
                      <!-- If not 'Want to Return', show an empty cell -->
                      </td><td>
                      @endif
                  </td>
              </tr>
              @endforeach


            </tbody>
        </table>
    </div>
</div>
    
        

