
@extends('layouts.master_dashboard')
@section('title','Data Aset Masuk')
@section('content')
	<div class="row">
		@if(auth()->user()->role == 'admin')
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('data.aset.masuk.create')}}" class="btn btn-primary btn-block">Tambah data aset masuk</a>
				</div>
			</div>
		</div>
		@endif
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
						<th>Harga barang</th>
						<th>jumlah</th>
						<th>Total</th>
						@if(auth()->user()->role == 'admin')
						<th>aksi</th>
						@endif
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
							<td>Rp{{number_format($dt->harga)}}</td>
							<td>{{$dt->jumlah}} {{empty($dt->aset->satuan)?null:$dt->aset->satuan->name}}</td>
							<td>Rp{{number_format($dt->jumlah * $dt->harga)}}</td>
							@if(auth()->user()->role == 'admin')
							<td>
								<a href="{{route('data.aset.masuk.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
								<a href="{{route('data.aset.masuk.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
							</td>
							@endif
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
