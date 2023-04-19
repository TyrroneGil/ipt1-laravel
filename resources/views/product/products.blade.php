@extends('layout')

@section('content')
<style>
	td,th,tr{
		border:solid 1px;
	}
	</style>
<center>
 <table class ='table table-striped'>

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
			<td><a href="/product/{{$product->id}}">View Details</td>
		</tr>

	@endforeach

	 </table>
	 <nav>
		{{$products->links()}}
	 </nav>
	 <button class="btn-primary"><a href="create">View Form</a></button>
<center>
	@endsection