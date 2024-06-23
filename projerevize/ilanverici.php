<?php
// Veritabanı bağlantısı
include("vt.php");
echo '<link rel="stylesheet" href="css/php.css">';
session_start();
$user_id=$_SESSION['user_id'];

// Temel özelliklerin formundan gelen verileri al
$title = $_POST['title'];
$adress = $_POST['adress'];
$price = $_POST['price'];
$properties_type = $_POST['propertiestype'];
$sale_status = $_POST['sale_status'];
$rooms = $_POST['rooms'];
$age = $_POST['age'];
$floor = $_POST['floor'];
$total_floor = $_POST['totalfloor'];
$warming = $_POST['warming'];
$deposit = $_POST['deposit'];
$m_kare = $_POST['m2'];
$bathrooms = $_POST['bathrooms'];
$balcony = $_POST['balcony'];
$furnished = $_POST['furnished'];
$situation = $_POST['situation'];
$dues = $_POST['dues'];
$credit = $_POST['credit'];
$explanation = $_POST['explanation'];
$city=$_POST['city'];

// Ekstra özelliklerin formundan gelen verileri al
$lift = $_POST['lift'];
$security_person = $_POST['security_person'];
$playground = $_POST['playground'];
$garden = $_POST['garden'];
$water_tank = $_POST['water_tank'];
$generator = $_POST['generator'];
$car_park = $_POST['car_park'];
$gym = $_POST['gym'];
$mall = $_POST['mall'];
$school = $_POST['school'];
$hospital = $_POST['hospital'];
$market = $_POST['market'];

// Ekstra özellikleri "properties" tablosuna ekle
$sql_properties = "INSERT INTO properties ( lift, security_person, playground, garden, water_tank, generator, car_park, gym, mall, school, hospital, market) 
                   VALUES ('$lift', '$security_person', '$playground', '$garden', '$water_tank', '$generator', '$car_park', '$gym', '$mall', '$school', '$hospital', '$market')";

$sql_adverts = "INSERT INTO adverts (user_id, title, adress, price, properties_type, sale_status, rooms, age, floor, total_floor, warming, deposit, m_kare, bathrooms, balcony, furnished, situation, dues, credit, explanation, city) 
               VALUES ('$user_id','$title', '$adress', '$price', '$properties_type', '$sale_status', '$rooms', '$age', '$floor', '$total_floor', '$warming', '$deposit', '$m_kare', '$bathrooms', '$balcony', '$furnished', '$situation', '$dues', '$credit', '$explanation','$city')";

if (mysqli_query($conn,$sql_adverts))
{
    $controler=1;
}
else
{
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Hatalı İşlem yapıl ! ';
    echo "Hata: " . $sql_adverts . "<br>" . $conn.mysqli_error();
    echo '</i></h2></div> ';    
    echo "<meta http-equiv='refresh' content='1;url=login.html'>";
}
if (mysqli_query($conn,$sql_properties))
{
    $controler=$controler + 1;
}
else
{
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>Hatalı İşlem yapıl ! ';
    echo "Hata: " . $sql_properties . "<br>" . $conn.mysqli_error();
    echo '</i></h2></div> ';    
    echo "<meta http-equiv='refresh' content='1;url=login.html'>";
}
if ($controler > 1 )
{
    echo "<meta http-equiv='refresh' content='1;url=home.php'>";
    echo '<div style="display:flex; justify-content:center; align-items:center; padding:300px; "><h2><i>İlanınız Başarı ile Oluşturulmuştur :) </i></h2></div> ';
}
mysqli_close($conn);
?>