@extends('layouts.master_dashboard')
@section('title','Ubah data aset')
@section('content')
<form action="{{route('data.aset.update')}}" method="POST">
	@csrf

		<input type="hidden" name="id" value="{{$assets->id}}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Kode barang</label>
			<input class="form-control" type="text" value="{{$assets->kode_barang}}" name="kode_barang" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Nama barang</label>
			<input class="form-control" type="text" value="{{$assets->nama_barang}}" name="nama_barang" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Kategori</label>
			<input class="form-control" type="text" value="{{$assets->kategori}}" name="kategori" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Jenis</label>
			<input class="form-control" type="text" value="{{$assets->jenis}}" name="jenis" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Jumlah</label>
			<input class="form-control" type="number" value="{{$assets->jumlah}}" name="jumlah" required>
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
