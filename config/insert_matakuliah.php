<?php
include('connect_database.php');
$nama_matakuliah = $_POST['nama_matakuliah'];
$kode = $_POST['kode'];

$query = mysqli_query($connect, "INSERT INTO MATAKULIAH(NAMA_MATAKULIAH, KODE) VALUES('$nama_matakuliah', '$kode')");
header('Location:../data_kelas.php');
