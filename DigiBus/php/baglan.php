<?php
$servername = "localhost"; // Veritabanı sunucusu
$username = "root";        // Kullanıcı adı
$password = "";            // Şifre (varsayılan boş)
$dbname = "digi_bus_2";    // Veritabanı adı

// Bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
