<?php
include ("vt.php");
echo '<link rel="stylesheet" href="css/php.css">';

// Formdan gelen verileri al
$email = $_POST['email'];
$pass = $_POST['pass'];

// Veritabanında kullanıcıyı bulma sorgusu
$sql = "SELECT * FROM users WHERE email='$email' AND pass='$pass'";
$result=mysqli_query($conn,$sql);

// Eğer sorgu sonucu varsa, kullanıcı bulunmuştur
if ($result->num_rows > 0) {

    $ilgilikayit=mysqli_fetch_assoc($result);

    session_start();

    $_SESSION['email']=$ilgilikayit["email"];
    $_SESSION['user_id']=$ilgilikayit["user_id"];
    $_SESSION['name']=$ilgilikayit["name"];
    
    echo "<meta http-equiv='refresh' content='1;url=home.php'>";

    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Giriş Başarılı, Anasayfaya Yönlendiriliyorsunuz :) </i></h2></div> ';
}
else 
{   
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Giriş Başarısız, Lütfen Tekrar deneyiniz ! </i></h2></div> ';    
    echo "<meta http-equiv='refresh' content='1;url=login.html'>";
}

// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>