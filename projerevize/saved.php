<?php

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
   <title>Kaydedilenler</title>

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
            <li><a href="saved.php">Kaydedilen İlanlar<i class="far fa-heart"></i></a></li>

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
<!-- listings section starts  -->

<section class="listings">
  
   <h1 class="heading">Kaydedilenler</h1>
   
   <div class="box-container">

   <?php

$saved_select = "SELECT adverts.*, users.user_id, users.name 
                  FROM adverts 
                  INNER JOIN users ON adverts.user_id = users.user_id
                  INNER JOIN saved ON adverts.advert_id = saved.advert_id WHERE saved.user_id=$oturum_id";

$result_select=mysqli_query($conn,$saved_select);

    if ($result_select->num_rows > 0) 
    {
        while($row = $result_select->fetch_assoc()) {
            echo "<div class='box'>";
            echo "<div class='admin'>";
            echo "<h3><i class='fa-solid fa-user'></i></h3>";
            echo "<div>";
            echo "<p>" . $row['name'] . "</p>"; 
            echo "<span>" . $row['advert_date'] . "</span>";
            echo "</div>";
            echo "</div>";
            echo "<div class='thumb'>";
            echo "<p class='type'><span>" . $row['properties_type'] . "</span><span>" . $row['sale_status'] . "</span></p>";

            echo "<form action='recorder.php' method='post' class='save'>";
            echo "<input type='hidden' name='advert_id' value='" . $row['advert_id'] . "'>";
            echo "<button type='submit' name='save' class='far fa-heart'></button>";
            echo "</form>";

            $randomNumber = rand(1, 6); $imageName = "house-img-" . $randomNumber . ".webp"; echo '<img src="images/' . $imageName . '" alt="">';
            echo "</div>";
            echo "<h3 class='name'>" . $row['title'] . "</h3>";
            echo "<p class='location'><i class='fas fa-map-marker-alt'></i><span>" . $row['city'] . "</span></p>";
            echo "<div class='flex'>";
            echo "<p><i class='fas fa-bed'></i><span>" . $row['rooms'] . "</span></p>";
            echo "<p><i class='fas fa-bath'></i><span>" . $row['bathrooms'] . "</span></p>";
            echo "<p><i class='fas fa-maximize'></i><span>" . $row['m_kare'] . "</span></p>";
            echo "</div>";
            echo "<a href='view_property.php' class='btn'>İlan Detaylarını Gör</a>";
            echo "</div>";
        }
    } 
    else 
    {
        echo '<div class="box" text-align="center" style="margin:224px 0px 224px 0px;">';     
        echo  '<h3 class="name" style="margin-left:65px;">Kaydedilen İlanınız <br ></h3>';
        echo '<h3 class="name" style="margin-left:60px;">Bulunamamaktadır.</h3>';
        echo "</div>";
    }

    $conn->close();

?>

</section>


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

<!-- footer section ends -->


<!-- custom js file link  -->
<script src="js/script.js"></script>
<script src="js/girişkontrol.js"></script>

</body>
</html>