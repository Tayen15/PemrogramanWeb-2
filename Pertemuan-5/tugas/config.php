<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "puskesmas";

$koneksi = new mysqli($hostname, $username, $password, $database) or die("Koneksi gagal: " . $koneksi->connect_error);
