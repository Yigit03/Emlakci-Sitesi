<?php
// Veritabanı bağlantısı
include("vt.php");
//idçek
echo'<link rel="stylesheet" href="css/php.css">';
// Formdan gelen verileri al
session_start();
$user_id=$_SESSION['user_id'];

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

// Girilen e-postanın veri tabanında kayıtlı olup olmadığını kontrol et
$sql_check_email = "SELECT * FROM users WHERE email = '$email'";
$result_check_email=mysqli_query($conn,$sql_check_email);

// Eğer e-posta kayıtlı değilse, formdan alınan verileri contact tablosuna ekle
if ($result_check_email -> num_rows < 1) {
    echo "";
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Kayıtlı olmayan e-posta kullandınız. Lütfen Kayıt İşleminizi Gerçekleştiriniz.</i></h2></div> ';
    echo "<meta http-equiv='refresh' content='2;url=register.html'>";
} 
else 
{
    $sql_insert_contact = "INSERT INTO contact (user_id, name, email, telefon, message) VALUES ('$user_id','$name', '$email', '$number', '$message')";

    if (mysqli_query($conn,$sql_insert_contact)) 
    {
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Mesajınız Başarı İle Teslim Edilmiştir :) </i></h2></div> ';

    } 
    else 
    {
        echo "Hata: " . $sql_insert_contact . "<br>" . $conn->error;
    }
        echo "<meta http-equiv='refresh' content='1;url=home.php'>";
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>





