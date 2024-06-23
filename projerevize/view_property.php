<?php
$ilan_id=$_POST['cartcurt'];
// vt.php dosyasını dahil eder
include("vt.php");
// Oturumu başlatır
session_start();
// Oturum kimliğini alır
$oturum_id = $_SESSION['user_id'];
// Kullanıcı profili için SQL sorgusu
$sql_profil = "SELECT * FROM users WHERE user_id='$oturum_id'";
// SQL sorgusunu çalıştırır
$result_profil = mysqli_query($conn, $sql_profil);

// Profil bilgilerini alır
$profilkayit = mysqli_fetch_assoc($result_profil);
// Kullanıcının adını alır
$name = $profilkayit['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>İlan Detayları</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>   

<!-- header section starts  -->

<header class="header">
   <nav class="navbar nav-1">
      <section class="flex">
         <a href="home.php" class="logo"><i class="fas fa-house"></i>Espat Emlak ve Gayrimenkul</a>
         <ul>
            <li><a href="ilanver.php">İlan Ver<i class="fas fa-paper-plane"></i></a></li>
         </ul>
      </section>
   </nav>
   <nav class="navbar nav-2">
      <section class="flex">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div class="menu">
            <ul>
               <li><a href="#">Satın Al<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="satılıkev.php">Ev (Bina)</a></li>
                     <li><a href="satılıkdaire.php">Daire</a></li>
                     <li><a href="satılıkmagaza.php">Mağaza</a></li>
                     <li><a href="satılıkarsa.php">Arsa</a></li>
                  </ul>
               </li>
               <li><a href="#">Kiralık<i class="fas fa-angle-down"></i></a>   
                  <ul>
                  <li><a href="kiralıkarsa.php">Arsa</a></li>
                     <li><a href="kiralıkdaire.php">Daire</a></li>
                     <li><a href="kiralıkmagaza.php">Mağaza</a></li>
                  </ul>
               </li>
               <li><a href="#">Yardım<i class="fas fa-angle-down"></i></a>
                  <ul>
                     <li><a href="about.php">Hakkımızda</a></i></li>
                     <li><a href="contact.php">Bize Ulaşın</a></i></li>
                  </ul>
               </li>
            </ul>
         </div>
         <ul>
            <li><a href="saved.php" id="kayit">Kaydedilen İlanlar<i class="far fa-heart"></i></a></li>            
            <?php
            echo '<li><a href="#" id="profil"><h4>'.$name.'<i class="fa-solid fa-user"></i></h4>';
            echo '</a>';
            ?>
               <ul>
                  <li><a href="profil.php">Profilim</a></li>
                  <li><a href="çıkış.php">Çıkış Yap</a></li>
               </ul>
            </li>
         </ul>

      </section>
   </nav>
</header>

<!-- view property section starts  -->
<?php

// SQL sorgusu oluştur
$sql = " SELECT *
         FROM adverts
         INNER JOIN properties ON adverts.advert_id = properties.advert_id
         INNER JOIN users ON adverts.user_id = users.user_id WHERE adverts.advert_id=$ilan_id";

// SQL sorgusunu çalıştırır
$result=mysqli_query($conn,$sql);

if ($result->num_rows > 0) 
{
   while($row = $result->fetch_assoc()) 
   {

echo '<section class="view-property">';
echo   '<div class="details">';
echo      '<div class="thumb">';
echo         '<div class="big-image">';
echo            '<img src="images/house-img-1.webp" alt="">';
echo         '</div>';
echo         '<div class="small-images">';
echo           '<img src="images/house-img-1.webp" alt="">';
echo            '<img src="images/hall-img-1.webp" alt="">';
echo            '<img src="images/kitchen-img-1.webp" alt="">';
echo            '<img src="images/bathroom-img-1.webp" alt="">';
echo        '</div>';
echo      '</div>';
echo      "<h3 class='name'>".$row['title']."</h3>";
echo     "<p class='location'><i class='fas fa-map-marker-alt'></i><span>".$row['adress']."</span></p>";
echo      '<div class="info">';
echo         "<p><i class='fas fa-tag'></i><span>".$row['price']."</span></p>";
echo         "<p><i class='fas fa-user'></i><span>".$row['name']."</span></p>";
echo         "<p><i class='fas fa-phone'></i><a href='tel:1234567890'>".$row['telefon']."</a></p>";
echo         "<p><i class='fas fa-building'></i><span>".$row['properties_type']."</span></p>";
echo         "<p><i class='fas fa-house'></i><span>".$row['sale_status']."</span></p>";
echo         "<p><i class='fas fa-calendar'></i><span>".$row['advert_date']."</span></p>";
echo      "</div>";
echo      '<h3 class="title">Detaylar</h3>';
echo      '<div class="flex">';
echo        '<div class="box">';
echo           "<p><i>Oda Sayısı:</i><span>".$row['rooms']."</span></p>";
echo          "<p><i>Bina Yaşı :</i><span>".$row['age']."</span></p>";
echo          "<p><i>Bulunduğu kat :</i><span>".$row['floor']."</span></p>";
echo            "<p><i>toplam kat :</i><span>".$row['total_floor']."</span></p>";
echo            "<p><i>ısınma :</i><span>".$row['warming']."</span></p>";
echo           "<p><i> m² (Net) :</i><span>".$row['m_kare']." m²</span></p>";
echo        "</div>";
echo        '<div class="box">';
echo            "<p><i>banyo :</i><span>".$row['bathrooms']."</span></p>";
echo            "<p><i>balkon:</i><span>".$row['balcony']."</span></p>";
echo           "<p><i>Eşyalı :</i><span>".$row['furnished']."</span></p>";
echo           "<p><i>Durum :</i><span>".$row['situation']."</span></p>";
echo           "<p><i>Aidat :</i><span>".$row['dues']."</span></p>";
echo           "<p><i>krediye uygun :</i><span>".$row['credit']."</span></p>";
echo        '</div>';
echo     '</div>';
echo     '<h3 class="title">Kolaylıklar - Extralar</h3>';
echo     '<div class="flex">';
echo        '<div class="box">';

if($row['lift'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Asansör</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Asansör</span></p>';
}

if($row['security_person'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Güvenlik Görevlisi</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Güvenlik Görevlisi</span></p>';
}

if($row['playground'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Oyun Alanı</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Oyun Alanı</span></p>';
}

if($row['garden'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Bahçe</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Bahçe</span></p>';
}

if($row['water_tank'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Su Deposu</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Su Deposu</span></p>';
}

if($row['generator'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Jeneratör</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Jeneratör</span></p>';
}
echo      '</div>';
echo      '<div class="box">';

if($row['car_park'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Otopark</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Otopark</span></p>';
}

if($row['gym'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Spor Salonu</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Spor Salonu</span></p>';
}

if($row['mall'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>AWM çevresi</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>AWM çevresi</span></p>';
}

if($row['hospital'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Hastane çevresi</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Hastane çevresi</span></p>';
}

if($row['school'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Okul çevresi</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Okul çevresi</span></p>';
}

if($row['market'] == 'evet')
{
echo '<p><i class="fas fa-check"></i><span>Market çevresi</span></p>';
}
else
{
echo '<p><i class="fas fa-times"></i><span>Market çevresi</span></p>';
}
echo       '</div>';
echo     '</div>';
echo      '<h3 class="title">Açıklama</h3>';
echo      "<p class='description'>".$row['explanation']."</p>";
echo   '</div>';
echo '</section>';  
}
}
?>
<!--
<section class="view-property">
<?php/*
*/$ilan_id=$_POST['cartcurt'];

// SQL sorgusu oluştur
$sql = " SELECT *
         FROM adverts
         INNER JOIN properties ON adverts.advert_id = properties.advert_id
         INNER JOIN users ON adverts.user_id = users.user_id WHERE adverts.advert_id=$ilan_id";

// SQL sorgusunu çalıştırır
$result=mysqli_query($conn,$sql);

/*
echo"<div class='details'>";
echo"  <div class='thumb'>";    
echo"         <div class='big-image'>";
echo"            <img src='images/house-img-1.webp' >";
echo"         </div>";
echo"        <div class='small-images'>";
echo"            <img src='images/house-img-1.webp' >";
echo"            <img src='images/hall-img-1.webp' >";
echo"            <img src='images/kitchen-img-1.webp' >";
echo"            <img src='images/bathroom-img-1.webp' >";
echo"         </div>";
echo"      </div>";
echo"      <h3 class='name'>Sahibinden Masrafsız Daire</h3>";
echo"      <p class='location'><i class='fas fa-map-marker-alt'></i><span>sakarya,ivrindi,Balıkesir - 10000</span></p>";
echo"      <div class='info'>";
echo"        <p><i class='fas fa-tag'></i><span>5.000</span></p>";
echo"         <p><i class='fas fa-user'></i><span>Yiğit Eser</span></p>";
echo"         <p><i class='fas fa-phone'></i><a href='tel:1234567890'>0545 555 55 55</a></p>";
echo"         <p><i class='fas fa-building'></i><span>Daire</span></p>";
echo"         <p><i class='fas fa-house'></i><span>Satılık</span></p>";
echo"         <p><i class='fas fa-calendar'></i><span>16.04.2024</span></p>";
echo"      </div>";
echo"      <h3 class='title'>Detaylar</h3>";
echo"      <div class='flex'>";
echo"         <div class='box'>";
echo"            <p><i>Oda Sayısı:</i><span>2+1</span></p>";
echo"            <p><i>Bina Yaşı :</i><span>1</span></p>";
echo"            <p><i>Bulunduğu kat :</i><span>1</span></p>";
echo"            <p><i>toplam kat :</i><span>5</span></p>";
echo"            <p><i>ısınma :</i><span>doğal gaz</span></p>";
echo"            <p><i> m² (Net) :</i><span>148 m²</span></p>";
echo"        </div>";
echo"        <div class='box'>";
echo"            <p><i>banyo :</i><span>1</span></p>";
echo"            <p><i>balkon:</i><span>2</span></p>";
echo"            <p><i>Eşyalı :</i><span>hayır</span></p>";
echo"            <p><i>Durum :</i><span>Taşınmaya Hazır</span></p>";
echo"            <p><i>Aidat :</i><span>300</span></p>";
echo"           <p><i>krediye uygun :</i><span>Hayır</span></p>";
echo"        </div>";
echo"      </div>";
echo"     <h3 class='title'>Kolaylıklar - Extralar</h3>";
echo"      <div class='flex'>";
echo"        <div class='box'>";
echo"           <p><i class='fas fa-check'></i><span>Asansör</span></p>";
echo"           <p><i class='fas fa-check'></i><span>Güvenlik Görevlisi</span></p>";
echo"           <p><i class='fas fa-times'></i><span>Oyun Alanı</span></p>";
echo"           <p><i class='fas fa-check'></i><span>Bahçe</span></p>";
echo"           <p><i class='fas fa-check'></i><span>Su Tedarik</span></p>";
echo"           <p><i class='fas fa-check'></i><span>Jeneratör</span></p>";
echo"        </div>";
echo"        <div class='box'>";
echo"           <p><i class='fas fa-check'></i><span>Park Alanı</span></p>";
echo"           <p><i class='fas fa-times'></i><span>Spor Salonu</span></p>";
echo"           <p><i class='fas fa-check'></i><span>AWM çevresi</span></p>";
echo"           <p><i class='fas fa-check'></i><span>Hastane çevresi</span></p>";
echo"           <p><i class='fas fa-check'></i><span>Okul çevresi</span></p>";
echo"          <p><i class='fas fa-check'></i><span>Market çevresi</span></p>";
echo"       </div>";
echo"    </div>";
echo"    <h3 class='title'>Açıklama</h3>";
echo"    <p class='description'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum cupiditate aliquid ipsum recusandae maxime nisi, velit eaque, libero, exercitationem culpa accusamus. Neque dolor quaerat modi saepe facere dignissimos temporibus molestias.</p>";
echo" </div>";
*/?>   
</section>-->

<!-- footer section starts  -->
<footer class="footer">

   <section class="flex">

      <div class="box">
         <a href="tel:1234567890"><i class="fas fa-phone"></i><span>0555 555 55 55</span></a>
         <a href="tel:1112223333"><i class="fas fa-phone"></i><span>444 44 44</span></a>
         <a href="mailto:shaikhanas@gmail.com"><i class="fas fa-envelope"></i><span>Espat@iletisim.com</span></a>
         <a href="#"><i class="fas fa-map-marker-alt"></i><span>Bornova,İzmir 35000</span></a>
      </div>

      <div class="box">
         <a href="home.php"><span>Anasayfa</span></a>
         <a href="about.php"><span>Hakkımızda</span></a>
         <a href="contact.php"><span>İletişim</span></a>
         <a href="listings.php"><span>Tüm Listelemeler</span></a>
         <a href="#"><span>Kaydettiklerim</span></a>
      </div>

      <div class="box">
         <a href="#"><span>facebook</span><i class="fab fa-facebook-f"></i></a>
         <a href="#"><span>twitter</span><i class="fab fa-twitter"></i></a>
         <a href="#"><span>linkedin</span><i class="fab fa-linkedin"></i></a>
         <a href="#"><span>instagram</span><i class="fab fa-instagram"></i></a>

      </div>

   </section>

   <div class="credit">&copy; copyright @ 2024 Tüm Hakları <span>Espat Yazılım</span> | Tarafından Saklıdır !</div>
</footer>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/girişkontrol.js"></script>

</body>
</html>