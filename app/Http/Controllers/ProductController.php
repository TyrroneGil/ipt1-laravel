<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
   public function index(){
    return view('product.products',[
        'products'=> Product::paginate(5)
			
       
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
    $product->update($formFields);
			
    return redirect('/')->with('success','New product updated');
       
   
   }
public function destroy(Product $product){
    $product->delete();
    return redirect('/')->with('success','New product deleted');
}

public function scopeFilter($query,array $filters){
    if($filters['search'] ?? false){
        $query->where('name','like','%'.$filters['search'].'%')
        ->orWhere('category','like','%'.$filters['search'].'%')
        ->orWhere('description','like','%'.$filters['search'].'%');
    }
}
}