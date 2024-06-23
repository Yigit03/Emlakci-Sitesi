<?php
// Veritabanı bağlantı bilgileri
$servername = "localhost"; // MySQL sunucu adı
$username = "root"; // MySQL kullanıcı adı
$password = ""; // MySQL şifre
$database = "espat"; // Kullanılacak veritabanı adı

// Veritabanına bağlanma
$conn = mysqli_connect($servername, $username, $password, $database);

// Bağlantı hatası kontrolü
if (!$conn) {
    die("Bağlantı hatası: " .mysqli_connect_error());
}