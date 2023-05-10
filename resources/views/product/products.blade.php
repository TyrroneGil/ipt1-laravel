<x-layout>
	<h1>Product Catalogue</h1>
	
		<form action="">
			<div class="input-group">
	<input type="text" name="search" class="form-control">
	<button class="btn btn-primary" type="submit">Search</button>
	</form>
	</div>
	@if(session()->has('success'))
	<x-notify type="success" title="Success" content="{{session('success')}}"/>
	@endif

 
<div class="row">
			
		
	@foreach($products as $product)
	<div class="col-4">
		<div class="card h-100 shadow-sm">
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
					<a href="#" class="btn btn-info">Add to Cart</a>
				</div>
			</div>
		
			</div>
		</div>


	@endforeach
</div>
</div>
	 <nav>
		{{$products->links()}}
	 </nav>
	 <a href="create"> <button class="btn btn-primary">View Form</button></a>

</x-layout>