<x-layout>
	<h1>Product Catalogue</h1>
	
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
<table class="table table-dark">
	<tr>
		<th>Name</th>
		<th>Unit</th>
		<th>UnitPrice</th>
		<th>Category</th>
		<th>Action</th>
	</tr>
			@foreach($products as $product)
	<tr>
		<td>{{$product['name']}}</td>
		<td>{{$product['unit']}}</td>
		<td>{{$product['unitPrice']}}</td>
		<td>{{$product['category']}}</td>
		<td>
			<div class="row">
				<div class="col-4">
					<a href="/product/{{$product['id']}}"><button class="btn btn-primary"><i class="bi bi-eye"></i></button></a>
				</div>
				<div class="col-4">
					<a href="/product/{{$product['id']}}/edit"><button class="btn btn-primary"><i class="bi bi-pencil"></i></button></a>
				</div>
				<div class="col-4">
					<form method="POST"action="/products/{{$product['id']}}/delete">
						@csrf
						@method('DELETE')
						<button class="btn btn-primary" type submit><i class="bi bi-trash"></i></button>
					</form>
				</div>
				
			</div>
		</td>
	</tr>



	@endforeach
</table>
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
	 

</x-layout>