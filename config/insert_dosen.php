<?php
include('connect_database.php');
$email = $_POST['email'];
$nama = $_POST['Nama'];
$nip = $_POST['NIP'];
$bidang_studi = $_POST['BidangStudi'];
$password = md5($_POST['password']);

$query = mysqli_query($connect, "INSERT INTO DOSEN(EMAIL, NAMA, NIP, BIDANGSTUDI, PASSWORD) VALUES('$email', '$nama', '$nip', '$bidang_studi', '$password')");
header('Location:../data_dosen.php');
