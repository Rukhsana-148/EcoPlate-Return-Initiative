<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Food;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BotMan\BotMan\BotMan;
use App\Models\Sell;
use Illuminate\Support\Facades\Log;
use BotMan\BotMan\Messages\Incoming\Answer;

class NewController extends Controller
{
    //

    public function welcome(){
        if(Auth::id()){

            $userType=Auth::user()->userType;
            $userId=Auth::user()->id;
            $productCount = Cart::where('userId', $userId)->count();
            $cartItems = Cart::select('foodId', DB::raw('MIN(id) as id'), DB::raw('COUNT(foodId) as quantity'))
            ->where('userId', $userId)
            ->groupBy('foodId')
            ->with('food')->get();
            $foods = Food::all();

            $buyP = Sell::where('buyId', $userId)->with(['food', 'user'])->get();
            $sellP = Sell::where('createId', $userId)->with('food')->get();

            if($userType=='user'){
                
                return view('user.home', compact('foods','buyP','cartItems', 'userId', 'productCount'));
                
            }else{
                $foodItems = Food::where('createId', $userId)->get();
                $sells = Sell::where('createId', $userId)->with('food')->get();
                $totalProductItems = Food::where('createId', $userId)->count();
                return view('admin.home', compact('userId', 'foodItems', 'sells', 'totalProductItems'));
            }
        }else{
            $foods = Food::all();
            return view('welcome', compact('foods'));
        }
    }

    public function addFood(Request $request){
       $data = new Food;
       $data->name = $request->name;
       $data->createId = $request->user_id;
       $data->price = $request->price;
       $data->total = $request->quantity;
       $data->productType = $request->type; 
       $image = $request->file('image');
       $imageName = time() . '.' . $image->getClientOriginalExtension();
       $image->move('uploadImage', $imageName);
       $data->image = $imageName;
       $data->save();
       return redirect()->back();
        
    }

    public function addCart(Request $request){
        $data = new Cart;
        $data->userId = $request->userId;
        $data->foodId = $request->foodId;
        $data->save();
        return redirect()->back();
    }

public function offerFix(Request $request){

$id = $request->foodId;
		  
		    Food::where('name', $id)->update([
          'offerType' => $request->offerType,
		  'offer' => $request->offer,
          'buy'=>$request->buy,
          'get'=>$request->get,
		        ]);
	  
	  return redirect()->back();
}


public function buy(Request $request){

     $data = new Sell;
     $foodId = $request->foodId;
     $data->foodId = $request->foodId;
     $data->buyId = $request->buyId;
     $data->createId = $request->createId;
     $data->quantity = $request->quantity;
     $data->totalGet = $request->totalGet;
     $data->totalPrice = $request->totalPrice;
     $data->save();

     $id = $request->id;
     Food::where('id', $foodId)->update([
        'total' => $request->remain,
        
              ]);



     $cartItem = Cart::find($id);

              if ($cartItem) {
                $cartItem->delete();
                       } 
            return redirect()->back();
        
         }

         public function returnPolicy(Request $request){
            $id = $request->id;
		  
		    Sell::where('id', $id)->update([
                'rNumber'=>$request->rNumber,
          'returnPolicy' => 'Want To Return',
		        ]);
	  
	  return redirect()->back();

         }

         public function accepted(Request $request){
            $id = $request->id;
		  
		    Sell::where('id', $id)->update([
          'returnPolicy' => 'Accepted',
          'totalGet'=>$request->totalGet,
          'totalPrice'=>$request->price,
          'returnPrice'=>$request->returnPrice,
           'returnProduct'=>$request->nReturn,

		        ]);
              $foodId = $request->foodId;

              Food::where('id', $foodId)->update([
                    'total'=>$request->total,
              ]);
              
	  return redirect()->back();

         }


         public function buyNow($id){
           
           
            $item = Cart::find($id);
            
            $userId=Auth::user()->id;
            $productCount = Cart::where('userId', $userId)->count();
           
            return view('user.cartItem', compact('item', 'userId', 'productCount'));
         }

         public function buyList(){
            $userId=Auth::user()->id;
            $productCount = Cart::where('userId', $userId)->count();
           
            $buyP = Sell::where('buyId', $userId)->with('food')->get();
            return view ('user.buyFood', compact('buyP', 'userId', 'productCount'));
         }
         public function returnProduct(){
            $userId=Auth::user()->id;
            $productCount = Cart::where('userId', $userId)->count();
           
            $buyP = Sell::where('buyId', $userId)->with('food')->get();
            return view ('user.returnProduct', compact('buyP', 'userId', 'productCount'));
         }

         public function cart(){
            $userId=Auth::user()->id;

            $cartItems = Cart::select('foodId', DB::raw('MIN(id) as id'), DB::raw('COUNT(foodId) as quantity'))
            ->where('userId', $userId)
            ->groupBy('foodId')
            ->with('food')->get();
            $productCount = Cart::where('userId', $userId)->count();
           
            return view ('user.itemCart', compact('cartItems', 'userId', 'productCount'));
        

         }

         public function food(){
            $userId=Auth::user()->id;
            return view('admin.addFood', compact('userId'));
         }

         public function addOffer(){
            $userId=Auth::user()->id;
            $foods = Food::all();
            return view('admin.addOffer', compact('userId', 'foods'));
         }
         public function return(){
            $userId=Auth::user()->id;
            $sellP = Sell::where('createId', $userId)->with('food')->get();

            return view('admin.return', compact('userId', 'sellP'));
         }

         public function deleteCart(Request $request){
            $id = $request->id;
            $data = Cart::find($id);
            $data->delete();
            return redirect()->back();

         }
         public function editFood(){
            $userId =Auth::user()->id;

            $foodItems = Food::where('createId', $userId)->get();
            return view('admin.editFood', compact('userId', 'foodItems'));
         }
          public function editThisFood(Request $request){
            $id = $request->id;

            
            $image = $request->file('image');
            if($image){
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploadImage', $imageName);
          }else{
            $food = Food::find($id);
           $imageName = $food->image;
          }
            Food::where('id', $id)->update([
               'name'=>$request->name,
                'productType'=>$request->type,
                 'price'=>$request->price,
                 'total'=>$request->total,
                'image' => $imageName,
               
                     ]);
               return redirect()->back();
            }
}




