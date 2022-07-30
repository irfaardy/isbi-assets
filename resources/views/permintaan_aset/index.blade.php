
@extends('layouts.master_dashboard')
@section('title','Data Permintaan aset')
@section('content')
	<div class="row">
		
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="aset" class="table table-stripped table-bordered">
					<thead>
						<th>ID</th>
						<th>Tanggal</th>
						<th>Nama Pengaju</th>
						<th>Unit Kerja</th>
						<th>nama barang</th>
						<th>jumlah</th>
						<th>aksi</th>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@foreach($assets as $dt)
						<tr>
							<td>{{$dt->id}}</td>
							<td>{{date("Y-m-d",strtotime($dt->created_at))}}</td>
							<td>{{$dt->nama_pengaju}}</td>
							<td>{{$dt->unit_kerja}}</td>
							<td>{{$dt->aset->nama_barang}}</td>
							<td>{{$dt->jumlah}}</td>
							<td>
								
								<a href="{{route('pengajuan.aset.edit',['id' => $dt->id])}}" class="btn btn-primary">Detail</a>
								<a href="{{route('pengajuan.aset.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
								<a href="{{route('pengajuan.aset.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
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
