<x-layout>

<form method="POST" action="/product" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
<label for="name" class="col-sm-2 col-form-label">Product Name:</label>
<input type="text" value="{{old('name')}}" name="name" 
class="form-control @error('name') is-invalid @enderror"/>
<div class="text-danger">
    @error('name')
            {{$message}}
    @enderror
</div>
</div>
<div class="row mb-3">
<label for="unit" class="col-sm-2 col-form-label">Unit:</label>
<input type="text" value="{{old('unit')}}" name="unit" 
class="form-control @error('unit') is-invalid @enderror"/>
<div class="text-danger">
    @error('unit')
            {{$message}}
    @enderror
</div>
</div>
<div class="row mb-3">
<label for="unitPrice" class="col-sm-2 col-form-label">Unit Price:</label>
<input type="text"  name="unitPrice" value="{{old('unitPrice')}}" name="unitPrice" 
class="form-control @error('unitPrice') is-invalid @enderror"/>
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
    <option  value="vegetable">Vegetable</option>
    <option value="meat">Meat</option>
    <option value="fish">Fish</option>
    </select>
</div>
</div>
<div class="row mb-3">
    <label for="image_url">Image</label>
    <input type="file" name="image_url" class="form-control">
</div>
<button class="btn btn-primary">Save</button>
</form>
</x-layout>