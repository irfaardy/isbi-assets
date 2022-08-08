@extends('layouts.master_dashboard')
@section('title','Tambahkan Data Aset')
@section('content')
<form action="{{route('data.aset.masuk.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Tanggal</label>
			<input class="form-control" type="date" name="tanggal" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Pilih Barang</label>
			<select class="select2 form-control" name="asset_id">
				@foreach($aset as $a)
				<option value="{{$a->id}}">{{$a->kode_barang}} - {{$a->nama_barang}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Harga Barang satuan</label>
			<input class="form-control" type="number" min="0" name="harga">
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
					<button type="submit" class="btn btn-primary btn-block">Tambah Aset Masuk</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
