
@extends('layouts.master_dashboard')
@section('title','Kelola Pengguna')
@section('content')
	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<a href="{{route('pengguna.create')}}" class="btn btn-primary btn-block">Tambah Pengguna</a>
				</div>
			</div>
		</div>
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				<table id="pengguna" class="table table-stripped table-bordered">
					<thead>
						<th>name</th>
						<th>email</th>
						<th>role</th>
						<th>aksi</th>
					</thead>
					<tbody>
						@foreach($user as $dt)
						<tr>
							<td>{{$dt->name}}</td>
							<td>{{$dt->email}}</td>
							<td>{{$dt->role}}</td>
							<td><a href="{{route('pengguna.edit',['id' => $dt->id])}}" class="btn btn-warning">Edit</a></td>
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
    $('#pengguna').DataTable();

} );
</script>
@endsection
