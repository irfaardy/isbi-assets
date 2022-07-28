
@extends('layouts.master_dashboard')
@section('title','Kelola Aset')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('data.aset.create')}}" class="btn btn-primary btn-block">Tambah data aset</a>
				</div>
			</div>
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
						<th>aksi</th>
					</thead>
					<tbody>
						@foreach($assets as $dt)
						<tr>
							<td>{{$dt->kode_barang}}</td>
							<td>{{$dt->nama_barang}}</td>
							<td>{{$dt->kategori}}</td>
							<td>{{$dt->jenis}}</td>
							<td>{{$dt->jumlah}}</td>
							<td>
								<a href="{{route('data.aset.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
								<a href="{{route('data.aset.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
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
