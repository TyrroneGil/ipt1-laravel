<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
            'image_url'=>'required'
           
        ]);
       Cart::create($formFields);
       return redirect('/')->with('success','New product has been added to cart');
}

public function shoppingCart(){
    return view('product.cart',[
        'products'=> Cart::all()
			
       
    ]);
   }
   public function remove(Cart $product){
    
  $product->delete();
   
  return redirect('/cart')->with('success','Product Has been Removed');
  
}
public function destroyall()
{
    Cart::whereNotNull('id')->delete();
    return redirect('/cart')->with('success','The Product Has been Shipped');
}
}
