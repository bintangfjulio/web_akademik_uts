<?php
include('connect_database.php');
$email = $_POST['email'];
$nama = $_POST['Nama'];
$nim = $_POST['NIM'];
$alamat = $_POST['alamat'];
$password = md5($_POST['password']);

$query = mysqli_query($connect, "INSERT INTO MAHASISWA(EMAIL, NAMA, NIM, ALAMAT, PASSWORD) VALUES('$email', '$nama', '$nim', '$alamat', '$password')");
header('Location:../data_mahasiswa.php');
