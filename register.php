<?php
include ("vt.php");
echo '<link rel="stylesheet" href="css/php.css">';
// Formdan gelen verileri al
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$c_pass = $_POST['c_pass'];
// Şifreleri karşılaştır
if ($pass != $c_pass) {
    
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h1>';
    echo "<meta http-equiv='refresh' content='1; url=register.html'>";
    die("<i> Şifreler Eşleşmiyor , Lütfen Tekrar Deneyiniz ! </i>");
    echo "</h1></div>";

}
//veri tabanındaki tüm emailleri  çeken sorguyu yazıyoruz...
$sql_control = "SELECT email FROM users ";
//sorgudan dönen değerleri result_control değişkeninde tutulmuştur...
$result_control=mysqli_query($conn,$sql_control);
//kayıt var mı yok mu kontrol ediliyor...
if ($result_control->num_rows < 1 )
{
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h1>';
    echo "<meta http-equiv='refresh' content='3; url=register.html'>";
    die("<i> Kayıtlı Bir e-posta kullandınız , Lütfen Geçerli bir e-posta adresi kullanın veya Giriş yapın </i>");
    echo "</h1></div>";
}

// Veritabanına veri ekleme sorgusu
$sql = "INSERT INTO users (name, email, pass) VALUES ('$name', '$email', '$pass')";
// Sorguyu çalıştırma

if (mysqli_query($conn,$sql)) {
    
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Kayıt Başarı ile Gerçekleşti :)</i></h2></div> ';
    echo "<meta http-equiv='refresh' content='1;url=login.html'>";
    
    //mesajı bu şekilde de verebilirdik ancak giriş ekranına atmak için kullanıcının alert box a cevap vermesini bekliyor.
    //echo "<script>alert('Kayıt başarıyla tamamlandı!');</script>";
} 
else 
{   
    
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2>';
    echo "<i> Hata: " . $sql . "<br>" . $conn.mysqli_error() ."</i>";
    echo "</h2></div>";
    echo "<meta http-equiv='refresh' content='1;url=register.html'>";
}
// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>