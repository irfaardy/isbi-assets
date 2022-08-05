@extends('layouts.master_dashboard')
@section('title','Ubah data jenis')
@section('content')
<form action="{{route('jenis.aset.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$data->id}}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Kode jenis</label>
			<input class="form-control" type="text" value="{{$data->kode_jenis}}" name="kode_jenis" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Nama jenis</label>
			<input class="form-control" type="text" value="{{$data->name}}" name="name" required>
		</div>
		
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Ubah jenis</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
