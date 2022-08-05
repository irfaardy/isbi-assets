@extends('layouts.master_dashboard')
@section('title','Tambahkan jenis')
@section('content')
<form action="{{route('jenis.aset.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Kode Jenis</label>
			<input class="form-control" type="text" name="kode_jenis" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Nama Jenis</label>
			<input class="form-control" type="text" name="name" required>
		</div>
		
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Tambah jenis</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
