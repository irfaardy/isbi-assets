@extends('layouts.master_dashboard')
@section('title','Edit Data Aset')
@section('content')
<form action="{{route('data.aset.masuk.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$aset->id}}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Tanggal</label>
			<input class="form-control" type="date" value="{{$aset->tanggal}}" name="tanggal" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Pilih Barang</label>
			<select class="select2 form-control" name="asset_id">
				@foreach($aset_list as $a)
				<option value="{{$a->id}}" @if($a->id == $aset->asset_id) selected="selected" @endif>{{$a->kode_barang}} - {{$a->nama_barang}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Harga Barang satuan</label>
			<input class="form-control" type="number" min="0" name="harga" value="{{$aset->harga}}">
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Jumlah</label>
			<input class="form-control" type="number" value="{{$aset->jumlah}}" name="jumlah" required>
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
