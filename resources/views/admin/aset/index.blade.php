
@extends('layouts.master_dashboard')
@section('title','Data Aset')
@section('content')
	<div class="row">
		<div class="col-md-6">
			@if(auth()->user()->role == 'admin')
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('data.aset.create')}}" class="btn btn-primary btn-block">Tambah data aset</a>
				</div>
				<div class="col-sm-12 col-md-6">
					<a href="#" class="btn btn-success btn-block"  data-toggle="modal" data-target="#import" >Import Data</a>
				</div>
			</div>
			@endif
		</div>
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="aset" class="table table-stripped table-bordered">
					<thead>
						<th>kode barang</th>
						<th>nama barang</th>
						<th>kategori</th>
						<th>jenis</th>
						<th>jumlah</th>
						@if(auth()->user()->role == 'admin')
						<th>aksi</th>
						@endif
					</thead>
					<tbody>
						@foreach($assets as $dt)
						<tr>
							<td>{{$dt->kode_barang}}</td>
							<td>{{$dt->nama_barang}}</td>
							<td>{{empty($dt->kategoritb) ? "-":$dt->kategoritb->name}}</td>
							<td>{{empty($dt->jenistb) ? "-":$dt->jenistb->name}}</td>
							<td>{{$dt->jumlah}}</td>
								@if(auth()->user()->role == 'admin')
							<td>
								<a href="{{route('data.aset.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
								<a href="{{route('data.aset.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
							</td>
							@endif
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<form action="{{route('data.aset.import')}}" method="post" enctype="multipart/form-data">>
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Impor data Aset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="alert alert-info" align="center">Anda dapat mengunduh format untuk import data  <a href="{{asset('template/ISBI-TEMPLATE-ASET.xlsx')}}" class="btn btn-success btn-sm" target="_blank">disini</a> </div>
      	<div class="row">
      		<div class="col-md-12">
      			<label>File Import</label> <small>*Hanya file excel (xls, dan xlsx) maks 10 MB</small>
        		<input type="file" name="file" class="form-control">
		    </div>
		    
		</div>
      </div>
      <div class="modal-footer">
      	@csrf
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Import</button>
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
