@extends('layouts.master_dashboard')
@section('title','Tambahkan Pengguna')
@section('content')
<form action="{{route('pengguna.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Nama Lengkap</label>
			<input class="form-control" type="text" name="name" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Email</label>
			<input class="form-control" type="email" name="email" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Password</label>
			<input class="form-control" type="password" name="password" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Konfirmasi Password</label>
			<input class="form-control" type="password" name="password_confirmation" required>
		</div>
		
		<div class="col-md-6 col-sm-12">
			<label>Role</label>
			<select name="role" class="form-control">
				<option value="admin">admin</option>
				<option value="ketua_upt">ketua upt</option>
				<option value="unit_kerja">unit kerja</option>
			</select>
		</div>
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Tambah Pengguna</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
