<body bgcolor="#EEF2F7">
<?php
	include "koneksi.php";
	$username	= $_POST['username'];
	$nama		= $_POST['nama'];
	$tgl_transaksi	= $_POST['thn_transaksi']."-".$_POST['bln_transaksi']."-".$_POST['tgl_transaksi'];
	$jml_transaksi	= $_POST['jml_transaksi'];
	//validasi data jika data kosong
	if (empty($_POST['jml_transaksi'])) {
	?>
		<script language="JavaScript">
			alert('Masukan Jumlah transaksi!');
			document.location='home-admin.php?page=list-pinjaman';
		</script>
	<?php
	}
	else {
	//Masukan data ke Table pinjaman
	$koneksi=mysqli_connect("sql207.unaux.com","unaux_28939467","bp3sxnv65kg54ng", "unaux_28939467_kop");
	$input	="INSERT INTO pinjaman (username, nama, tgl_transaksi, jml_transaksi) VALUES ('$username','$nama','$tgl_transaksi','$jml_transaksi')";
	$query_input =mysqli_query($koneksi, $input);
	//Update pinjaman di tabel member
	$update="UPDATE member SET pinjaman=pinjaman + $jml_transaksi WHERE username='$username'";
	$query_update =mysqli_query($koneksi, $update);
		if ($query_update) {
		//Jika Sukses
	?>
		<script language="JavaScript">
		alert('Data Pinjaman Berhasil Diinput!');
		document.location='home-admin.php?page=list-pinjaman';
		</script>
	<?php
	}
	else {
	//Jika Gagal
	echo "Pinjaman Gagal Diinput, Silahkan diulangi!";
	}
	}
	//Tutup koneksi engine MySQL
	mysqli_close($Open);
?>
</body>