@extends('layouts.master_dashboard')
@section('title','Ubah Data Laporan')
@section('content')
<form action="{{route('pengajuan.laporan.update')}}" method="POST" enctype="multipart/form-data">
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
			<label>Tanggal</label>
			<input class="form-control" type="date" value="{{$data->tanggal}}" name="tanggal" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Judul Laporan</label>
			<input class="form-control" type="text" name="judul_laporan" value="{{$data->judul_laporan}}" required>
		</div>
		
		<div class="col-md-6 col-sm-12">
			<label>File Laporan</label><br>
			File:<br>
			<b>{{$data->file}}</b>
			<input class="form-control" type="file" name="file" >
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
