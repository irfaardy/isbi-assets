@extends('layouts.master_dashboard')
@section('title','Ubah data Kategori')
@section('content')
<form action="{{route('kategori.aset.update')}}" method="POST">
	@csrf
	<input type="hidden" name="id" value="{{$data->id}}">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<label>Kode Kategori</label>
			<input class="form-control" type="text" value="{{$data->kode_kategori}}" name="kode_kategori" required>
		</div>
		<div class="col-md-6 col-sm-12">
			<label>Nama Kategori</label>
			<input class="form-control" type="text" value="{{$data->name}}" name="name" required>
		</div>
		
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Ubah Kategori</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')

@endsection
