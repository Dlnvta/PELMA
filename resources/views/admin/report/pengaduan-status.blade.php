<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PELMADA</title>
	<style type="text/css">
		table.static {
			position: relative;;
			border: 1px solid #543535;
			text-align: center;
			width: 95%;
		}
		.header {
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="form-group">
		<div>
			<img src="{{ url('assets2/img/logo.png') }}" style=" margin-left: 350px; margin-bottom: -70px; height: 60px; width: 60px; color: 100% solid #fff;"></img>
			<p class="header">
				<strong>Laporan Pengaduan</strong> 
				<p class="header"> Berdasarkan Status </p>
			</p>	
		</div>
		<table class="static" rules="all">
			<tr>
				<th>No</th>
				<th>Tanggal Pengaduan</th>
				<th>Nama</th>
				<th>Judul Pengaduan</th>
				<th>Isi Pengaduan</th>
				<th>Lokasi</th>
				<th>Detail Lokasi</th>
				<th>Status</th>
			</tr>
			@foreach ($pengaduan as $item)
			<tr>
				<td>{{ $loop->iteration }}</td>
				<td>{{ $item->tanggal_pengaduan }}</td>
				<td>{{ $item->users->name }}</td>
				<td>{{ $item->judul_pengaduan }}</td>
				<td>{{ $item->isi_pengaduan }}</td>
				<td>{{ $item->lokasi }}</td>
				<td>{{ $item->detail_lokasi }}</td>
				<td>{{ $item->status }}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>