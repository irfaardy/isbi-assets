
@extends('layouts.master_dashboard')
@section('title','Data Jenis')
@section('content')
	<div class="row">
		<div class="col-md-6">
			@if(auth()->user()->role == 'admin')
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('jenis.aset.create')}}" class="btn btn-primary btn-block">Tambah data Jenis</a>
				</div>
			</div>
			@endif
		</div>
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="aset" class="table table-stripped table-bordered">
					<thead>
						<th>kode Jenis</th>
						<th>nama Jenis</th>
						@if(auth()->user()->role == 'admin')
						<th>aksi</th>
						@endif
					</thead>
					<tbody>
						@foreach($assets as $dt)
						<tr>
							<td>{{$dt->kode_jenis}}</td>
							<td>{{$dt->name}}</td>
								@if(auth()->user()->role == 'admin')
							<td>
								<a href="{{route('jenis.aset.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a>
								<a href="{{route('jenis.aset.delete',['id' => $dt->id])}}" class="btn btn-danger">Hapus</a>
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
