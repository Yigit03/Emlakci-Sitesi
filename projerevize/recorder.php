<?php
include("vt.php");
echo '<link rel="stylesheet" href="css/php.css">';

// oturumdan gelen ID`yi çek
session_start();
$user_id = $_SESSION['user_id'];

// Formdan gelen verileri al
$advert_id = $_POST['advert_id'];

// İlan daha önce eklenmiş mi eklenmemiş mi bakabilmek için saved tablosunu kontrol eden SQL sorgusu
$saved_sql = "SELECT * FROM saved WHERE advert_id='$advert_id' AND user_id='$user_id'";
// SQL sorgusunu Çalıştır
$result_saved = mysqli_query($conn, $saved_sql);

if ($result_saved->num_rows < 1) {
    $saved_insert = "INSERT INTO saved (user_id, advert_id) VALUES ('$user_id','$advert_id')";

    if (mysqli_query($conn, $saved_insert)) 
    {
        echo "<meta http-equiv='refresh' content='1;url=saved.php'>";
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px;"><h2><i> İlan Başarı İle Kaydedildi :) </i></h2></div> ';
    } 
    else 
    {
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h1>';
        echo "<meta http-equiv='refresh' content='3; url=saved.php'>";
        die("<i> Kaydetme Esnasında Bir Hata İle Karşılaşıldı ! </i>");
        echo "</h1></div>";
    }
} 
else 
{
    // Veritabanına veri ekleme sorgusu
    $saved_delete = "DELETE FROM saved WHERE user_id='$user_id' AND advert_id='$advert_id'";
    // Sorguyu çalıştırma
    if (mysqli_query($conn, $saved_delete)) {
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>İlan Kaydedilenlerden Kaldırıldı :)</i></h2></div> ';
        echo "<meta http-equiv='refresh' content='1;url=saved.php'>";
        //mesajı bu şekilde de verebilirdik ancak giriş ekranına atmak için kullanıcının alert box a cevap vermesini bekliyor.
        //echo "<script>alert('Kayıt başarıyla tamamlandı!');</script>";
    } else {
        echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2>';
        echo "<i> Hata: " . $saved_delete . "<br>" . mysqli_error($conn) . "</i>";
        echo "</h2></div>";
        echo "<meta http-equiv='refresh' content='1;url=saved.php'>";
    }
}
// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>
