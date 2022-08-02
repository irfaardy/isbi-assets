
@extends('layouts.master_dashboard')
@section('title','Data Laporan aset')
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
						<th>Judul Laporan</th>
						<th>File Laporan</th>
						<th>Keterangan</th>
						<th>aksi</th>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@foreach($assets as $dt)
						<tr>
							<td>{{$dt->id}}</td>
							<td>{{$dt->tanggal}}</td>
							<td>{{$dt->nama_pengaju}}</td>
							<td>{{$dt->unit_kerja}}</td>
							<td>{{$dt->judul_laporan}}</td>
							<td><a href="{{route('laporan.aset.download',['file' => $dt->file])}}" class="btn btn-xs btn-success">Download</a> </td>
							<td>@if($dt->is_acc == 0)
									<span class="badge badge-secondary">Menunggu</span>
								@elseif($dt->is_acc == 1)
									<span class="badge badge-success">Disetujui</span>
								@elseif($dt->is_acc == 2)
									<span class="badge badge-danger">Ditolak</span>
								@endif
							</td>
							<td>
							
								<a href="{{route('pengajuan.laporan.detail',['id' => $dt->id])}}" class="btn btn-primary">Detail</a>
								@if($dt->is_acc != 1)
								<a href="{{route('pengajuan.laporan.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
							
								<a href="{{route('pengajuan.laporan.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
								@endif
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
