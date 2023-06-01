<x-layout2>
	<h1>User Page</h1>
	
		<form>
			<div class="input-group">
	<input type="text" name="search" class="form-control">
	<button class="btn btn-primary" type="submit">Search</button>
	</form>
	</div>
	@if(session()->has('success'))
	<x-notify type="success" title="Success" content="{{session('success')}}"/>
	@endif
 @unless($products->isEmpty())
<div class="row">
			@foreach($products as $product)
	<div class="col-4">
		<div class="card h-100 shadow-sm my-2">
			<img src="{{$product->image_url ? asset('storage/'.$product->image_url):asset('/images/iconhome.png')}}" class="card-img-top">
			<div class="card-body">
				<center>
				<div class="row">
					<div class="col-6">
						<h5>{{$product->name}}</h5>
					</div>
					<div class="col-6">
						<h5>{{$product->unitPrice}}/{{$product->unit}}</h5>
					</div>
				</div>
				</center>
				<div class="text-center">
					<form action="/cart/{{$product['id']}}">
						<input type="hidden" name="name" value="{{$product['name']}}">
						<input type="hidden" name="unit" value="{{$product['unit']}}">
						<input type="hidden" name="unitPrice" value="{{$product['unitPrice']}}">
						<input type="hidden" name="category" value="{{$product['category']}}">
						<input type="hidden" name="image_url" value="{{$product['image_url']}}">
						<button type="submit" class="btn btn-info">Add to Cart</button>
					</form>
					
				</div>
			</div>
		
			</div>
		</div>


	@endforeach
	@else
	<div class="row">
		<h3>No Products Found</h3>
	</div>
	@endunless
</div>
</div>
	 <nav>
		{{$products->links()}}
	 </nav>
	 

</x-layout2>