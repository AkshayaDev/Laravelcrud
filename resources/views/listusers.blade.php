@extends('master')

@section('content')
<div class="container">
  <h2>Users</h2>
	@if (session('status'))
	<div class="alert alert-success">
	    {{ session('status') }}
	</div>
	@endif        
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
@foreach ($users as $user)
<tr>
<td>{{ $user->name }}</td>
<td>{{ $user->email }}</td>
<td><a href="{{ route('updateuser',$user) }}">Edit</a>/<a href="{{ route('deleteuser',$user->id) }}">Delete</a></td>
</tr>
@endforeach
    </tbody>
  </table>
</div>
@stop