@extends('layouts.master_dashboard')
@section('title','Ubah data Pengguna')
@section('content')
<form action="{{route('pengguna.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$user->id}}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Nama Lengkap</label>
			<input class="form-control" type="text" value="{{$user->name}}" name="name" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Email</label>
			<input class="form-control" type="email" value="{{$user->email}}" name="email" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Password</label>
			<input class="form-control" type="password" name="password" >
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Konfirmasi Password</label>
			<input class="form-control" type="password" name="password_confirmation" >
		</div>
		
		<div class="col-md-6 col-sm-12">
			<label>Role</label>
			<select name="role" class="form-control">
				<option value="admin"  @if($user->role == "member") selected="" @endif>admin</option>
				<option value="ketua_upt"  @if($user->role == "ketua_upt") selected="" @endif>ketua upt</option>
				<option value="unit_kerja"  @if($user->role == "unit_kerja") selected="" @endif>unit kerja</option>
			</select>
		</div>
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Update data Pengguna</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
