@extends('layout')

@section('content')
<h1>Register new User</h1>
	<form method="post" action="register">
		@csrf
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control" placeholder="Enter Name">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" placeholder="Enter Email">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="text" name="password" class="form-control" placeholder="Enter password">
		</div>
		<div class="form-group">
			<label>Contact</label>
			<input type="text" name="contact" class="form-control" placeholder="Enter Contact Number">
		</div>
		<button type="submit" class="btn btn-primary">Register</button>
	</form>
@stop