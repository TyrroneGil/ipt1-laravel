<x-layout>
	<h1>Product Catalogue</h1>
	@if(session()->has('success'))
	<x-notify type="success" title="Success" content="{{session('success')}}"/>
	@endif

 <table class ='table table-dark '>

	<tr>
		<th>ID</th>
		<th>Product Name</th>
			
		<th>Unit Price</th>
		<th>Unit</th>
		<th>Category</th>
		<th>View Detail</th>
		
	</tr>
	

	@foreach($products as $product)
		<tr>
			<td>{{$product['id']}}</td>
			<td>{{$product['name']}}</td>
			
			<td>{{$product['unitPrice']}}</td>
			<td>{{$product['unit']}}</td>
			<td>{{$product['category']}}</td>
			<td>
				<div class="row">
					<div class="col-2">
						<a href="/product/{{$product->id}}"> <button class="btn btn-primary"><i class="bi-eye"></i></button></a>
					</div>
					<div class="col-2">
						<a href="/product/{{$product->id}}/edit"> <button class="btn btn-primary"><i class="bi-pencil"></i></button></a>
					</div>
					<div class="col-2">
						<form method="POST" action="/products/{{$product->id}}/delete">
						@csrf
						@method('DELETE')
							<button class="btn btn-primary" type="submit">
								<i class="bi-trash"></i>
							</button>
				</form>
			
					</div>
				</div>
				
				
				
		    </td>
		</tr>

	@endforeach

	 </table>
	 <nav>
		{{$products->links()}}
	 </nav>
	 <a href="create"> <button class="btn btn-primary">View Form</button></a>

</x-layout>