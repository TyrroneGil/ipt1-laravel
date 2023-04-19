@extends('layout')

@section('content')
<style>
	td,th,tr{
		border:solid 1px;
	}
	</style>
<center>
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
			<td><a href="/product/{{$product->id}}"> <button class="btn btn-primary">View Details</button></td>
		</tr>

	@endforeach

	 </table>
	 <nav>
		{{$products->links()}}
	 </nav>
	 <a href="create"> <button class="btn btn-primary">View Form</button></a>
<center>
	@endsection