@extends('layout')

@section('content')
<form method="POST" action="/product">
@csrf
<div class="row mb-3">
<label for="name" class="col-sm-2 col-form-label">Product Name:</label>
<input type="text"  name="name" class="form-control"/>
</div>
<div class="row mb-3">
<label for="unit" class="col-sm-2 col-form-label">Unit:</label>
<input type="text"  name="unit" class="form-control"/>
</div>
<div class="row mb-3">
<label for="unitPrice" class="col-sm-2 col-form-label">Unit Price:</label>
<input type="text"  name="unitPrice" class="form-control"/>
</div>
<div class="row mb-3">
<label for="category">Category:</label>
<div class="col-sm-10">
    <select name="category" class="col-form-control">
    <option value="Vegetable">Vegetable</option>
    <option value="Meat">Meat</option>
    <option value="Fish">Fish</option>
    </select>
</div>
</div>
<button class="btn btn-primary">Save</button>
</form>
@endsection