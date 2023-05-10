<x-layout>
<h1>Register Form</h1>
<form method="POST" action="/users">
@csrf
<div class="row mb-3">
<label for="name" class="col-sm-2 col-form-label">Username:</label>
<input type="text" value="{{old('name')}}" name="name" 
class="form-control @error('name') is-invalid @enderror"/>
<div class="text-danger">
    @error('name')
            {{$message}}
    @enderror
</div>
</div>
<div class="row mb-3">
<label for="email" class="col-sm-2 col-form-label">Email:</label>
<input type="text" value="{{old('email')}}" name="email" 
class="form-control @error('email') is-invalid @enderror"/>
<div class="text-danger">
    @error('email')
            {{$message}}
    @enderror
</div>
</div>
<div class="row mb-3">
<label for="password" class="col-sm-2 col-form-label">Password:</label>
<input type="text"  name="password" value="{{old('password')}}" name="password" 
class="form-control @error('password') is-invalid @enderror"/>
<div class="text-danger">
    @error('password')
            {{$message}}
    @enderror
</div>
</div>

<div class="row mb-3">
<label for="password-confirmation" class="col-sm-2 col-form-label">Confirm Password:</label>
<input type="password"  name="password-confirmation" value="{{old('password-confirmation')}}" name="password-confirmation" 
class="form-control @error('password-confirmation') is-invalid @enderror"/>
<div class="text-danger">
    @error('password-confirmation')
            {{$message}}
    @enderror
</div>
</div>

<span>Already Have an account? <a href="/login">Login Here</a></span>
<button class="btn btn-primary">Register</button>
</form>
</x-layout>