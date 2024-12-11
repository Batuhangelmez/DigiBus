<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Kayıt</title>
</head>
<body>
    <h2>Kullanıcı Kayıt Formu</h2>
    <form action="" method="POST">
        <label for="ad">Ad:</label><br>
        <input type="text" id="ad" name="ad" required><br><br>

        <label for="soyad">Soyad:</label><br>
        <input type="text" id="soyad" name="soyad" required><br><br>

        <label for="tel">Telefon Numarası:</label><br>
        <input type="text" id="tel" name="tel" required><br><br>

        <label for="sifre">Şifre:</label><br>
        <input type="password" id="sifre" name="sifre" required><br><br>

        <button type="submit" name="kaydet">Kayıt Ol</button>
    </form>

    <?php
    // Veritabanı bağlantısı
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "digi_bus_2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Bağlantı başarısız: " . $conn->connect_error);
    }

    // Form gönderildiğinde çalışacak kod
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['kaydet'])) {
        $ad = $conn->real_escape_string($_POST['ad']);
        $soyad = $conn->real_escape_string($_POST['soyad']);
        $tel = $conn->real_escape_string($_POST['tel']);
        $sifre = password_hash($conn->real_escape_string($_POST['sifre']), PASSWORD_BCRYPT); // Şifreyi hashle

        // SQL sorgusu
        $sql = "INSERT INTO kullanici (kullanici_ad, kullanici_soyad, kullanici_tel, kullanici_sifre, rol_id) VALUES ('$ad', '$soyad', '$tel', '$sifre', 2)"; // 2 rol_id örneği

        if ($conn->query($sql) === TRUE) {
            echo "<p>Kayıt başarılı!</p>";
        } else {
            echo "<p>Hata: " . $sql . "<br>" . $conn->error . "</p>";
        }
    }

    $conn->close();
    ?>
</body>
</html>
