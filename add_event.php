<?php
$servername = "localhost";
$username = "root"; // MySQL kullanıcı adı
$password = ""; // MySQL şifresi
$dbname = "anlar"; // Kullanılacak veritabanı

// Veritabanına bağlan
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Formdan gelen veriler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventDate = $_POST['eventDate'];
    $description = $_POST['description'];

    // Veritabanına veri ekle
    $sql = "INSERT INTO special_moments (event_date, description) VALUES ('$eventDate', '$description')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(["message" => "Yeni anı başarıyla kaydedildi!"]);
    } else {
        echo json_encode(["error" => "Hata: " . $conn->error]);
    }

    // Bağlantıyı kapat
    $conn->close();
}
?>
