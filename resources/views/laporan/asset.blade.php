
@extends('layouts.master_dashboard')
@section('title','Laporan Aset')
@section('content')

	<div class="row">
		
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-12 col-md-6">
					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="input-group date">
						        <input type="text" asset-laporan class="form-control" value="{{Request::get('date')}}" name="date" id="datepicker"/>
						        <span class="input-group-append">
						          <span class="input-group-text bg-light d-block">
						            <i class="fa fa-calendar"></i>
						          </span>
						        </span>
						      </div>
						</div>	
					</div>
				</div>	
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-sm-6 col-md-6 " align="right">
				
				</div>
				<div class="col-sm-6 col-md-6 " align="right">
					<select name="tipe" asset-laporan id="tipe" class="form-control">
						<option {{Request::get('tipe') == "masuk"?"selected":null}} value="masuk">Aset Masuk</option>
						<option   {{Request::get('tipe') == "keluar"?"selected":null}} value="keluar">Aset Keluar</option>
					</select>
					@if(!empty(Request::get('date'))) 
					<a href="{{route('report.download',['date' =>Request::get('date'),'tipe' => Request::get('tipe') ])}} " class="btn mt-2 btn-success btn-block">Download</a>
					@endif
				</div>
			</div>
		</div>
		
		<div class="col-12">
			<hr>
			<div class="table-responsive">
				@if(!empty(Request::get('date'))) 
				<table id="aset" class="table table-stripped table-bordered">
					<thead>
						<th>No</th>
						<th>Kode Barang</th>
						<th>nama barang</th>
						<th>Harga barang</th>
						<th>jumlah</th>
						<th>satuan</th>
						<th>Total</th>
					</thead>
					<tbody>
						<?php $i = 1; $total=0; ?>
						@foreach($assets as $dt)
						@if(Request::get('tipe')=='keluar') 
							<?php $total += $dt->jumlah * $dt->aset->harga; ?>
							<?php $sub = $dt->jumlah * $dt->aset->harga; ?>
							
						@else 
							<?php $total += $dt->jumlah * $dt->harga; ?>
							<?php $sub = $dt->jumlah * $dt->harga; ?>
						@endif
 						
						<tr>
							<td>{{$i++}}</td>
							<td>{{$dt->aset->kode_barang}}</td>
							<td>{{$dt->aset->nama_barang}}</td>
							<td>@if(Request::get('tipe')=='keluar')
							 {{empty($dt->aset) ? "Rp0":"Rp".number_format($dt->aset->harga)}}
							 @else 
							 Rp{{number_format($dt->harga)}}
							  @endif</td>
							<td>{{$dt->jumlah}} </td>
							<td>{{empty($dt->aset->satuan)?'-':$dt->aset->satuan->name}}</td>
							<td>Rp{{number_format($sub)}}</td>
							
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6"><h4><b>Total</b></h4></td>
							<td ><h4><b>Rp{{number_format($total)}}</b></h4></td>
						</tr>
					</tfoot>
				</table>
				@else
				<div class="alert alert-info" align="center">Mohon pilih tanggal dahulu</div>
				@endif
			</div>
		</div>
	</div>
@endsection
@section('javascript')
<script type="text/javascript">
$(document).ready( function () {
    $('#aset').DataTable();

} );
$("#datepicker").datepicker({
	 format: "yyyy-mm",
    viewMode: "months", 
    minViewMode: "months"
});
$('[asset-laporan]').change(function(){

	window.location.href = '?date='+$('#datepicker').val()+'&tipe='+$('#tipe').val()
})
</script>
@endsection
