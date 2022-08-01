@extends('layouts.master_dashboard')
@section('title','Detail pengajuan Aset')
@section('content')
<div class="row">
	<div class="col-md-12">
		<b>Status</b><br>
		@if($data->is_acc == 0)
			<span class="badge badge-secondary">Menunggu</span>
		@elseif($data->is_acc == 1)
			<span class="badge badge-success">Disetujui</span>
		@elseif($data->is_acc == 2)
			<span class="badge badge-danger">Ditolak</span>
		@endif
	</div>
	<div class="col-md-12">
		<b>Nama Pengaju</b><br>
		{{$data->nama_pengaju}}
	</div>
	<div class="col-md-12">
		<b>Unit Kerja</b><br>
		{{$data->unit_kerja}}
	</div>
	<div class="col-md-12">
		<b>Nama Barang</b><br>
		{{$data->aset->kode_barang}} - {{$data->aset->nama_barang}}
	</div>
	<div class="col-md-12">
		<b>Kepentingan</b><br>
		<pre>{{$data->kepentingan}}</pre>
	</div>
	<div class="col-md-12">
		<b>Keterangan</b><br>
		<pre>{{$data->keterangan}}</pre>
	</div>
	<div class="col-md-6">
	</div>
	<div class="col-md-6">
		@if($data->is_acc != 1)
			<div class="row">
				<div class="col-md-6">
					<a href="{{route('pengajuan.aset.acc',['id' => $data->id])}}" class="btn btn-success btn-block">Setuju</a>
								
				</div>
				<div class="col-md-6">
						<a href="{{route('pengajuan.aset.tolak',['id' => $data->id])}}" class="btn btn-danger btn-block">Tolak</a>
				</div>
			</div>
		@endif
	</div>
</div>

@endsection
@section('javascript')

@endsection
