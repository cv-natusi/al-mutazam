<table id="excelPengembanganDiri" style="height:auto;">
	<thead>
		<tr>
			<td colspan="6"><b><p style="text-align:center;">{{ $judul }}</p></b></td>
		</tr>
        <br>
		{{-- <tr>
			<td colspan="1"><p>SEMESTER : {{$semester}}</p></td>
            <td colspan="9"><p style="text-align: center;">TANGGAL : {{ $date }}</p></td>
		</tr>
		<tr>
            <td><p>TAHUN PELAJARAN : {{$tahun}}</p></td>
		</tr> --}}
		<tr>
			{{-- <td colspan="1"><p>TAHUN PELAJARAN : 2022-2023</p></td> --}}
            <td colspan="6"><b><p style="text-align: center;">PERIODE : {{$tglAwal}} - {{$tglAkhir}}</p></b></td>
		</tr>
        <br>
		<tr>
			<th><p style="font-weight:bold;text-align:center">NO</p></th>
			<th><p style="font-weight:bold;text-align:center">NAMA GURU</p></th>
			<th><p style="font-weight:bold;text-align:center">NAMA KEGIATAN</p></th>
			<th><p style="font-weight:bold;text-align:center">TANGGAL MULAI</p></th>
			<th><p style="font-weight:bold;text-align:center">TANGGAL SELESAI</p></th>
			<th><p style="font-weight:bold;text-align:center">KETERANGAN</p></th>
		</tr>
	</thead>
	@php
	$no = 1;
	@endphp
	<tbody id='panelHasil'>
		@foreach ($data as $item)
		<tr>
			<td><p style="padding: 5px; vertical-align: middle;" align="center" valign="middle">{{$no}}</p></td>
			<td><p style="padding: 5px; vertical-align: middle;" align="center" valign="middle">{{$item->nama}}</p></td>
			<td><p style="padding: 5px; vertical-align: middle;" align="center" valign="middle">{{$item->nama_dokumen}}</p></td>
			<td><p style="padding: 5px; vertical-align: middle;" align="center" valign="middle">{{$item->tgl_mulai}}</p></td>
			<td><p style="padding: 5px; vertical-align: middle;" align="center" valign="middle">{{$item->tgl_selesai}}</p></td>
			<td><p style="padding: 5px; vertical-align: middle;" align="center" valign="middle">{{!empty($item->keterangan_tolak)?$item->keterangan_tolak:'-'}}</p></td>
		</tr>
		@php
		$no++;
		@endphp
		@endforeach
		@if($no == '1')
		<tr>
			<td colspan="10" style="text-align: center;padding: 5px;">Tidak Ada Data</td>
		</tr>
		@endif
	</tbody>
</table>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{asset('assets/js/jquery.table2excel.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var date = new Date();
		var getYear = date.getFullYear();
		var getMonth = date.getMonth()+1;
		var getDate = date.getDate();
		var output = getYear+'/'+(getMonth<10 ? '0':'')+getMonth+'/'+(getDate<10 ? '0':'')+getDate;
		$('#excelPengembanganDiri').table2excel({
			exclude: ".noExl",
			name: "Laporan Kredit",
			filename: "Laporan Kredit "+output+".xls",
			fileext: ".xls",
			exclude_img: false,
			exclude_links: false,
			exclude_inputs: true,
			preserveColors: true
		});
	});
</script>