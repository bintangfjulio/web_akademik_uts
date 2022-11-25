<?php
$connect = mysqli_connect('localhost', 'root', '', 'akademik');

if (!$connect) {
    die("Sambungan error: " . mysqli_connect_error());
}
