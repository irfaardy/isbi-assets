@extends('layouts.master_dashboard')
@section('title','Tambahkan Data Aset')
@section('content')
<form action="{{route('data.aset.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Kode barang</label>
			<input class="form-control" type="text" name="kode_barang" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Nama barang</label>
			<input class="form-control" type="text" name="nama_barang" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Kategori</label>
			<input class="form-control" type="text" name="kategori" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Jenis</label>
			<input class="form-control" type="text" name="jenis" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Jumlah</label>
			<input class="form-control" type="number" name="jumlah" required>
		</div>
		
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Tambah Aset</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
