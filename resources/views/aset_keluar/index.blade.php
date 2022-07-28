
@extends('layouts.master_dashboard')
@section('title','Kelola Aset Keluar')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('data.aset.keluar.create')}}" class="btn btn-primary btn-block">Tambah data aset Keluar</a>
				</div>
			</div>
		</div>
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="aset" class="table table-stripped table-bordered">
					<thead>
						<th>No</th>
						<th>Tanggal</th>
						<th>Kode Barang</th>
						<th>nama barang</th>
						<th>kategori</th>
						<th>jenis</th>
						<th>jumlah</th>
						<th>aksi</th>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@foreach($assets as $dt)
						<tr>
							<td>{{$i++}}</td>
							<td>{{$dt->tanggal}}</td>
							<td>{{$dt->aset->kode_barang}}</td>
							<td>{{$dt->aset->nama_barang}}</td>
							<td>{{$dt->aset->kategori}}</td>
							<td>{{$dt->aset->jenis}}</td>
							<td>{{$dt->jumlah}}</td>
							<td>
								<a href="{{route('data.aset.keluar.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
								<a href="{{route('data.aset.keluar.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready( function () {
    $('#aset').DataTable();

} );
</script>
@endsection
