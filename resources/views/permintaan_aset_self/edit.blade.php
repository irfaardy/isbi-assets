@extends('layouts.master_dashboard')
@section('title','Ubah pengajuan Aset')
@section('content')
<form action="{{route('pengajuan.aset.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$data->id}}">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<label>Nama Pengaju</label>
			<input class="form-control" value="{{$data->nama_pengaju}}" type="text" name="nama_pengaju" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Unit Kerja</label>
			<input class="form-control" value="{{$data->unit_kerja}}" type="text" name="unit_kerja" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Nama Barang</label>
			<select class="select2 form-control" name="asset_id">
				@foreach($aset_list as $a)
				<option value="{{$a->id}}" @if($data->asset_id == $a->id) selected @endif>{{$a->kode_barang}} - {{$a->nama_barang}}</option>
				@endforeach
			</select>
		</div>
		
		<div class="col-md-6 col-sm-12">
			<label>Jumlah</label>
			<input class="form-control" value="{{$data->jumlah}}" type="number" name="jumlah" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Kepentingan</label>
			<textarea class="form-control"  name="kepentingan" required>{{$data->kepentingan}}</textarea>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Keterangan</label>
			<textarea class="form-control"  name="keterangan">{{$data->keterangan}}</textarea>
		</div>
		
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Ubah Data</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
