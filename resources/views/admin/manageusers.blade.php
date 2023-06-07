<x-layout>
	<h1>User Table</h1>
	
	
	
	@if(session()->has('success'))
	<x-notify type="success" title="Success" content="{{session('success')}}"/>
	@endif
 @unless($users->isEmpty())
<table class="table table-dark">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Created At</th>
		<th>Role</th>
        <th>Status</th>
        <th>Action</th>
	</tr>
			@foreach($users as $user)
	<tr>
		<td>{{$user['name']}}</td>
		<td>{{$user['email']}}</td>
		<td>{{$user['created_at']}}</td>
		<td>{{$user['role']}}</td>
        <td>{{$user['status']}}</td>
		<td>
			<div class="row">
				
				<div class="col-4">
				<form action="/user/{{$user['id']}}/edit" method="post">
                    @csrf
                    @method('PUT')
                <input name="name" type="hidden" value="{{$user['name']}}">
                <input  name="email"type="hidden" value="{{$user['email']}}">
                <input name="created_at" type="hidden" value="{{$user['created_at']}}">
                    <input name="status" type="hidden" value='{{$user->status == "activated" ? "deactivated" : "activated"}}'>
                    <input name="role" type="hidden" value="{{$user['role'] == 'user' ? '2' : '0'}}">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-power"></i></button>
                </form>
				</div>
				<div class="col-4">
					<form method="POST"action="/user/{{$user['id']}}/delete">
						@csrf
						@method('DELETE')
						<button class="btn btn-primary" type submit><i class="bi bi-trash"></i></button>
					</form>
				</div>
				
			</div>
		</td>
	</tr>



	@endforeach
</table>
	@else
	<div class="row">
		<h3>No Users Found</h3>
	</div>
	@endunless
</div>
</div>
	 <nav>
		{{$users->links()}}
	 </nav>
	 

</x-layout>