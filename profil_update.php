<?php
include("vt.php"); // Veritabanı bağlantı dosyasını dahil ediyoruz
echo '<link rel="stylesheet" href="css/php.css">';

session_start(); // Kullanıcı oturumunu başlatıyoruz
$user_id=$_SESSION['user_id']; // Oturumdan kullanıcı kimliğini alıyoruz
$update_name = $_POST['user_name']; // Yeni kullanıcı adı değerini post ile alıyoruz
$update_cinsiyet = $_POST['cinsiyet']; // Yeni cinsiyet değerini post ile alıyoruz
$update_telefon = $_POST['telefon']; // Yeni telefon değerini post ile alıyoruz
$update_pass = $_POST['pass']; // Yeni şifre değerini post ile alıyoruz
$update_c_pass = $_POST['c_pass']; // Yeni şifre doğrulama değerini post ile alıyoruz

if($update_pass != $update_c_pass)
{
    // Şifreler eşleşmiyorsa hata mesajı verip sayfayı yenile
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h1>';
    echo "<meta http-equiv='refresh' content='0.4; url=profil.php'>";
    die("<i> Şifreler Eşleşmiyor , Lütfen Tekrar Deneyiniz ! </i>");
    echo "</h1></div>";
}

/*******************************************************/
if(!empty($update_name))
{
    // Kullanıcı adı güncelleme sorgusu
    $sql_update_name="UPDATE users SET name='$update_name' WHERE user_id='$user_id'";

    if(mysqli_query($conn, $sql_update_name)) {
        // Başarılı güncelleme mesajı
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Kullanıcı adı Güncellendi ! </i></h2></div> ';
        echo "<meta http-equiv='refresh' content='0.4; url=profil.php'>";
    } else {
        // Güncelleme hatası
        echo "Kullanıcı Adı Güncellenemedi ! " . mysqli_error($conn);
    }
}
else if(!empty($update_cinsiyet))
{
    // Cinsiyet güncelleme sorgusu
    $sql_update_cinsiyet="UPDATE users SET gender='$update_cinsiyet' WHERE user_id='$user_id'";

    if(mysqli_query($conn, $sql_update_cinsiyet)) {
        // Başarılı güncelleme mesajı
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Cinsiyet Bilgisi Güncellendi ! </i></h2></div> ';
        echo "<meta http-equiv='refresh' content='0.4; url=profil.php'>";
    } else {
        // Güncelleme hatası
        echo "Cinsiyet Güncellenemedi ! " . mysqli_error($conn);
    }
}
else if(!empty($update_pass))
{
    // Şifre güncelleme sorgusu
    $sql_update_pass="UPDATE users SET pass='$update_pass' WHERE user_id='$user_id'";

    if(mysqli_query($conn, $sql_update_pass)) {
        // Başarılı güncelleme mesajı
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Şifre Güncellendi ! </i></h2></div> ';
        echo "<meta http-equiv='refresh' content='0.4; url=profil.php'>";
    } else {
        // Güncelleme hatası
        echo "Şifre Güncellenemedi ! " . mysqli_error($conn);
    }
}
if(!empty($update_telefon))
{
    // Şifre güncelleme sorgusu
    $sql_update_telefon="UPDATE users SET telefon='$update_telefon' WHERE user_id='$user_id'";

    if(mysqli_query($conn, $sql_update_telefon)) {
        // Başarılı güncelleme mesajı
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Telefon Numarası Güncellendi ! </i></h2></div> ';
        echo "<meta http-equiv='refresh' content='0.4; url=profil.php'>";
    } else {
        // Güncelleme hatası
        echo "Şifre Güncellenemedi ! " . mysqli_error($conn);
    }
}

else
{
    // Güncelleme bilgisi eksik hatası
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h1>';
    echo "<meta http-equiv='refresh' content='0.4; url=profil.php'>";
    die("<i> Güncelleme İşlemi Başarısız ! </i>");
    echo "</h1></div>";
}

mysqli_close($conn);
?>
