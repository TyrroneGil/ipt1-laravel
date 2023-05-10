<x-layout>
<h1>Login Form</h1>
<form method="POST" action="/authenticate">
@csrf

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


<span>Don't have an account? <a href="/register">Register Here</a></span>
<button class="btn btn-primary">Login</button>
</form>
</x-layout>