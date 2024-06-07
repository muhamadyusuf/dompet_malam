<?php

// koneksi ke mysql
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "dompet_malam";

$koneksi = new mysqli($server, $username, $password, $database);

// cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}