<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;



class ProductController extends Controller
{

    
   public function index(){
    return view('product.product2',[
        'products'=> Product::latest()->filter(request(['search']))->simplePaginate(3)
			
       
    ]);
   }
   public function index2(){
    return view('product.products',[
        'products'=> Product::latest()->filter(request(['search']))->simplePaginate(5)
			
       
    ]);
   }
   public function show(Product $product){
    return view('product.product',[
        'product'=>$product
    ]);
			
       
   
   }
   public function create(){
    return view('product.create');
			
       
   
   }
   public function store(Request $request){
    $formFields = $request->validate([
        'name'=>'required',
        'unit'=>'required',
        'category'=>'required',
        'unitPrice'=>'required',
       
    ]);
    if($request->hasFile('image_url')){
        $formFields['image_url']=$request->file('image_url')->store('images','public');
        }
    Product::create($formFields);
			
    return redirect('/')->with('success','New product save');
       
   
   }
   public function edit(Product $product){
    return view('product.edit',[
        'product'=>$product
    ]);
    
    
}
public function update(Product $product,Request $request){
    $formFields = $request->validate([
        'name'=>'required',
        'unit'=>'required',
        'category'=>'required',
        'unitPrice'=>'required',
    
       
    ]);
    
      if($request->hasFile('image_url')){
         File::delete('storage/'.$product->image_url);
         $formFields['image_url']=$request->file('image_url')->store('images','public');
        }else{
            
        }
    $product->update($formFields);

			
    return redirect('/')->with('success','New product updated');
       
   
   }
public function destroy(Product $product){
     if(File::exists('storage/'.$product->image_url)){
    File::delete('storage/'.$product->image_url);

   }
   $product->delete();
    
   return redirect('/index2')->with('success','New product deleted');
   
}
public function addProducttoCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('product.cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "unit"=>$product->unit,
                "quantity" => 1,
                "unitPrice" => $product->unitPrice,
                "image" => $product->image_url
            ];
        }
        session()->put('product.cart', $cart);
        return redirect()->back()->with('success', 'Book has been added to cart!');
    }
     public function ProductCart()
    {
        return view('product.cart');
    }

}