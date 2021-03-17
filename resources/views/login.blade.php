@extends('layout')

@section('content')
<h1>Login User</h1>
	<form method="post" action="login">
		@csrf
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" placeholder="Enter Name">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="text" name="password" class="form-control" placeholder="Enter password">
		</div>
		<button type="submit" class="btn btn-primary">Login</button>
	</form>
@stop