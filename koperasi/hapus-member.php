<?php
	include "koneksi.php";

	$koneksi = mysqli_connect("localhost", "root", "", "dbkoperasi");

	if (isset($_GET['username'])) {
		$username = $_GET['username'];
	//membaca nama file yang akan dihapus
	$query   = "SELECT * FROM member WHERE username='$username'";
	$hasil   = mysqli_query($koneksi, $query);
	$data    = mysqli_fetch_array($hasil);
	}
	else {
		die ("Error. Tidak ada USERNAME yang dipilih Silakan cek kembali! ");	
	}
	//proses delete data
		if (!empty($username) && $username != "") {
			$hapus = "DELETE FROM member WHERE username='$username'";
			$sql = mysqli_query ($koneksi, $hapus);
			if ($sql) {		
				?>
					<script language="JavaScript">
					alert('Username <?=$username?> Berhasil dihapus!');
					document.location='home-admin.php?page=form-view-member';
					</script>
				<?php		
			} else {
				echo "<h2><font color=red><center>Data gagal dihapus!</center></font></h2>";	
			}
		}
	mysqli_close($Open);
?>