<x-layout>
<h1>Product Update | {{$product->name}}</h1>
<form method="POST" action="/products/{{$product->id}}">
@csrf
@method('PUT')
<div class="row mb-3">
<label for="name" class="col-sm-2 col-form-label">Product Name:</label>
<input type="text" value="{{$product->name}}"  name="name" class="form-control @error('name') is-invalid @enderror"/>
<div class="text-danger">
    @error('name')
            {{$message}}
    @enderror
</div>
</div>
<div class="row mb-3">
<label for="unit" class="col-sm-2 col-form-label">Unit:</label>
<input type="text" value="{{$product->unit}}"  name="unit" class="form-control @error('unit') is-invalid @enderror"/>
<div class="text-danger">
    @error('unit')
            {{$message}}
    @enderror
</div>
</div>
<div class="row mb-3">
<label for="unitPrice" class="col-sm-2 col-form-label">Unit Price:</label>
<input type="text" value="{{$product->unitPrice}}"   name="unitPrice" class="form-control @error('unitPrice') is-invalid @enderror"/>
<div class="text-danger">
    @error('unitPrice')
            {{$message}}
    @enderror
</div>
</div>
<div class="row mb-3">
<label for="category">Category:</label>
<div class="col-sm-10">
    <select name="category" class="col-form-control">
    <option {{$product->category == "vegetable" ? "selected" : ""}} value="vegetable">Vegetable</option>
    <option {{$product->category == "meat" ? "selected" : ""}} value="meat">Meat</option>
    <option {{$product->category == "fish" ? "selected" : ""}} value="fish">Fish</option>
    </select>
</div>
</div>
<button class="btn btn-primary">Save</button>
</form>
</x-layout>