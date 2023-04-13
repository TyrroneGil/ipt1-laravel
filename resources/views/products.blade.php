@extends('layout')

@section('content')
<center>
 <table class ='table table-striped'>
	<tr>
		<th>ID</th>
		<th>Product Name</th>
		<th>Description</th>	
		<th>Unit Price</th>
		<th>Unit</th>
		<th>View Details</th>
		
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

	 </table>
    
<center>
	@endsection