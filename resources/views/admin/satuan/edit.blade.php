@extends('layouts.master_dashboard')
@section('title','Ubah data satuan')
@section('content')
<form action="{{route('satuan.aset.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$satuan->id}}">
	<div class="row">
		
		<div class="col-md-6 col-sm-12">
			<label>Nama Satuan</label>
			<input class="form-control" type="text" name="name" autocomplete="off" value="{{$satuan->name}}" required>
		</div>
		
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Ubah Satuan</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
