@extends('layouts.master_dashboard')
@section('title','Tambahkan Data Aset')
@section('content')
<form action="{{route('pengajuan.aset.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<label>Nama Pengaju</label>
			<input class="form-control" type="text" name="nama_pengaju" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Unit Kerja</label>
			<input class="form-control" type="text" name="unit_kerja" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Nama Barang</label>
			<select class="select2 form-control" name="asset_id">
				@foreach($aset as $a)
				<option value="{{$a->id}}">{{$a->kode_barang}} - {{$a->nama_barang}}</option>
				@endforeach
			</select>
		</div>
		
		<div class="col-md-6 col-sm-12">
			<label>Jumlah</label>
			<input class="form-control" type="number" name="jumlah" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Kepentingan</label>
			<textarea class="form-control"  name="kepentingan" required></textarea>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Keterangan</label>
			<textarea class="form-control"  name="keterangan"></textarea>
		</div>
		
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Ajukan</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
