@extends('layout')

@section('content')
<style>
	td,th,tr{
		border:solid 1px;
	}
	</style>
<center>
 <table class ='table table-striped'>
	<tbody>
	<tr>
		<th>ID</th>
		<th>Product Name</th>
		<th>Description</th>	
		<th>Unit Price</th>
		<th>Unit</th>
		<th>View Detail</th>
		
	</tr>
	

	@foreach($products as $product)
		<tr>
			<td>{{$product['id']}}</td>
			<td>{{$product['name']}}</td>
			<td>{{$product['description']}}</td>
			<td>{{$product['unitPrice']}}</td>
			<td>{{$product['unit']}}</td>
			<td><a href="/product/{{$product->id}}">View Details</td>
		</tr>
	@endforeach
</tbody>
	 </table>
    
<center>
	@endsection