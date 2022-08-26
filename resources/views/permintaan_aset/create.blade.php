@extends('layouts.master_dashboard')
@section('title','Ajukan  Asset')
@section('content')
<form action="{{route('pengajuan.aset.save')}}" method="POST">
	@csrf
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<label>Nama Pengaju</label>
			<input class="form-control" type="text" name="nama_pengaju" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Unit Kerja</label>
			<input class="form-control" type="text" name="unit_kerja" required>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Nama Barang</label>
			<select class="select2 form-control" id="asset_id" name="asset_id">
				@foreach($aset as $a)
				<option value="{{$a->id}}">{{$a->kode_barang}} - {{$a->nama_barang}}</option>
				@endforeach
			</select>
			<div class="alert alert-info mt-3" id="infoBarang" style="display:none"> Nama-Kode : <span id="namabrg"></span> <br> Jumlah Stok :  <span id="jumlahstok"></span>  </div>
		</div>
		
		<div class="col-md-6 col-sm-12">
			<label>Jumlah</label>
			<div class="row">
				<div class="col-md-10">
					<input class="form-control" type="number" name="jumlah" id="jumlah" required>
				</div>
				<div class="col-md-2">
					<select class="form-control" required name="satuan">
						<option>Pilih</option>
						@foreach($satuan as $s)
						<option value="{{$s->id}}">{{$s->name}}</option>
						@endforeach
					</select>
				</div>
				</div>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Kepentingan</label>
			<textarea class="form-control"  name="kepentingan" required></textarea>
		</div>
		<div class="col-md-12 col-sm-12">
			<label>Keterangan</label>
			<textarea class="form-control"  name="keterangan"></textarea>
		</div>
		
		

	</div>
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<button type="submit" class="btn btn-primary btn-block">Ajukan</button>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
	$('#asset_id').change(function(e){
		axios.post('{{route('aset.getstock')}}', {
		    id: $(this).val(),
		  })
		  .then(function (response) {
		  	$('#infoBarang').fadeIn('fast');
		    $('#namabrg').html(response.data.nama_barang+" - "+response.data.kode_barang);
		    $('#jumlahstok').html(response.data.jumlah+" "+response.data.satuan);
		    $('#jumlah').attr('max',response.data.jumlah)
		  })
		  .catch(function (error) {
		    console.log(error);
		  });
	})
</script>
@endsection
