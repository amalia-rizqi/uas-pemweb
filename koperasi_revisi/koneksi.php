<?php
//buka koneksi ke engine MySQL
	$Open = mysqli_connect("localhost","root","");
		if (!$Open){
		die ("Koneksi ke Engine MySQL Gagal !<br>");
		}
//koneksi ke database
	$db = "unaux_28939467_kop";
	$Koneksi = mysqli_select_db($Open, $db);
		if (!$Koneksi){
		die ("Koneksi ke Database Gagal !");
		}
?>