<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "sekolah");

$conn = mysqli_connect(HOST, USER, PASS, DB);
if (!$conn) {
    echo "Koneksi Database Gagal" . mysqli_error();
}
