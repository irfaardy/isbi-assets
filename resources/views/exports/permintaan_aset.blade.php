<table>
	<tr>
		<td align="center" colspan="6"><b>Laporan yang mengajukan aset {{$range}} ({{$tipe}})</b></td>
		
	</tr>
	<tr>
		<td><b>ID</b></td>
		<td><b>Tanggal</b></td>
		<td><b>Nama Pengaju</b></td>
		<td><b>Unit Kerja</b></td>
		<td><b>Nama barang</b></td>
		<td><b>Jumlah</b></td>
	</tr>
	@foreach($data as $dt):
	<tr>
		<td>{{$dt->id}}</td>
		<td>{{date("Y-m-d",strtotime($dt->created_at))}}</td>
		<td>{{$dt->nama_pengaju}}</td>
		<td>{{$dt->unit_kerja}}</td>
		<td>{{$dt->aset->kode_barang}} - {{$dt->aset->nama_barang}}</td>
		<td>{{$dt->jumlah}}</td>
	</tr>
	@endforeach
</table>