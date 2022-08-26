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
			<select class="select2 form-control" name="kategori">
				@foreach($kategori as $a)
				<option value="{{$a->id}}" @if($a->id == $assets->kategori) selected @endif>{{$a->kode_kategori}} - {{$a->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Jenis</label>
			<select class="select2 form-control" name="jenis">
				@foreach($jenis as $a)
				<option value="{{$a->id}}" @if($a->id == $assets->jenis) selected @endif>{{$a->kode_jenis}} - {{$a->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Harga Barang satuan</label>
			<input class="form-control" type="number" min="0" name="harga" value="{{$assets->harga}}">
		</div>
		
		<div class="col-md-6 col-sm-12">
			<label>Jumlah</label>
			<div class="row">
				<div class="col-md-10">
					<input class="form-control" type="number" value="{{$assets->jumlah}}" name="jumlah" required>
				</div>
				<div class="col-md-2">
					<select class="form-control" required name="satuan">
						<option>Pilih</option>
						@foreach($satuan as $s)
						<option value="{{$s->id}}" @if($s->id == $assets->satuan_id) selected @endif>{{$s->name}}</option>
						@endforeach
					</select>
				</div>
				</div>
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
