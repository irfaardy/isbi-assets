
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
						<th>Status</th>
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
							<td>@if($dt->is_acc == 0)
									<span class="badge badge-secondary">Menunggu</span>
								@elseif($dt->is_acc == 1)
									<span class="badge badge-success">Disetujui</span>
									<br><small>Oleh:  {{$dt->accessor->name}}</small>
								@elseif($dt->is_acc == 2)
									<span class="badge badge-danger">Ditolak</span>
								@endif
							</td>
							<td>
							
								<a href="{{route('pengajuan.aset.details',['id' => $dt->id])}}" class="btn btn-primary">Detail</a>
								@if($dt->is_acc != 1)
								<a href="{{route('pengajuan.aset.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
							
								<a href="{{route('pengajuan.aset.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
<form action="{{route('pengajuan.aset.export')}}" method="post">
<div class="modal fade" id="export" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Export Permintaan Aset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-6">
      			<label>Tipe</label>
        		<select name="tipe" class="form-control">
        			<option value="0">Menunggu Persetujuan</option>
        			<option value="1">Disetujui</option>
        			<option value="2">Ditolak</option>
        		</select>
		    </div>
		    <div class="col-12">
		    </div>
		    <div class="col-md-6">
		    	<label>Tgl Awal</label>
        		<input type="date" name="start" max="{{date('Y-m-d')}}" class="form-control">
		    </div>
		    <div class="col-md-6">
		    	<label>Tgl Akhir</label>
        		<input type="date" name="end" max="{{date('Y-m-d')}}" class="form-control">
		    </div>
		</div>
      </div>
      <div class="modal-footer">
      	@csrf
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Export</button>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready( function () {
    $('#aset').DataTable();

} );
</script>
@endsection
