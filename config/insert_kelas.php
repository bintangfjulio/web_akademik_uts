<?php
include('connect_database.php');
$nama = $_POST['nama'];
$id_matakuliah = $_POST['id_matakuliah'];
$tahun_akademik = $_POST['tahun_akademik'];
$semester = $_POST['semester'];
$partisipan = $_POST['partisipan'];

$query = mysqli_query($connect, "INSERT INTO KELAS(NAMA, ID_MATAKULIAH, TAHUN_AKADEMIK, SEMESTER) VALUES('$nama', '$id_matakuliah', '$tahun_akademik', '$semester')");

$result = mysqli_query($connect, "SELECT MAX(ID) AS new_id FROM KELAS");
$row = mysqli_fetch_array($result);
$kelas  = $row["new_id"];

foreach ($partisipan as $mahasiswa) {
    $query = mysqli_query($connect, "INSERT INTO KELAS_PARTICIPATED(ID_KELAS, ID_MAHASISWA) VALUES('$kelas', '$mahasiswa')");
}
header('Location:../data_kelas.php');
