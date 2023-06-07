<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public $cart,$totalPrice=0;

    public function ProductCart(Product $product,Request $request){
        
        $formFields = $request->validate([
          
            'name'=>'required',
            'unit'=>'required',
            'category'=>'required',
            'unitPrice'=>'required',
       
           
        ]);
        $formFields['user_id']=auth()->id();
       Cart::create($formFields);
       return redirect('/userproducts')->with('success','New product has been added to cart');
}

public function shoppingCart(){
    return view('user.cart',[
        'products'=> auth()->user()->products()->paginate(5)
			
       
    ]);
   }
   public function remove(Cart $product){
    if(auth()->id()==$product->user_id){
         $product->delete();
   
  
    }else{
        abort(403,'Invalid Acton');
    }
 return redirect('/cart')->with('success','Product Has been Removed');
  
}
public function destroyall()
{
    Cart::whereNotNull('id')->delete();
    return redirect('/cart')->with('success','The Product Has been Shipped');
}
public function updateQuant(Cart $product,Request $request)
{
    if(auth()->id()==$product->user_id){
        $formFields = $request->validate([
            'quantity'=>'required'
        
           
        ]);
        $product->update($formFields);
        return redirect('/cart')->with('success','The product has been updated');

   
    }
}
public function checkOut(Request $request){
        $formFields=$request->validate([
            'address'=>'required',
            'totalPrice'=>'required',
            'totalOrder'=>'required',
            'orderNum'=>'required',
       
         ]);
        $formFields['user_id']=auth()->id();
        Cart::where('user_id', auth()->id())->delete();
        Order::create($formFields);
        return redirect('/cart')->with('success','The product has been updated');
        
        }
}
