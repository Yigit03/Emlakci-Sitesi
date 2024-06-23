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
   <title>Anasayfa</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/user-info.css">

</head>
<body>
<!-- header section başlangıcı  -->
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
<!-- home section starts  -->
<div class="home">
   <section class="center">

      <form action="filtre.php" method="post">


         <h3>Aradığınız Evi Daha Hızlı Bulun</h3>
         <div class="box">
            <p>Şehir Seçiniz ! <span>*</span></p>
            <input type="text" name="city" required maxlength="50" placeholder="Şehir" class="input">
         </div>
         <div class="flex">
            <div class="box">
               <p>Emlak Tipi Seçiniz <span>*</span></p>
               <select name="type" class="input" required>
                  <option value=""></option>
                  <option value="daire">Daire</option>
                  <option value="bina">Ev</option>
                  <option value="mağaza">Mağaza</option>
                  <option value="arsa">Arsa</option>
               </select>
            </div>
            <div class="box">
               <p>Oda Sayısı Seçiniz !<span>*</span></p>
               <select name="bhk" class="input" required>
                  <option value=""></option>
                  <option value="1+0">1+0</option>
                  <option value="1+1.5">1+1.5</option>
                  <option value="2+1">2+1</option>
                  <option value="2+1.5">2+1.5</option>
                  <option value="3+1">3+1</option>
                  <option value="4+1">4+1</option>
                  <option value="5+1">5+1</option>
                  <option value="6+1">6+1</option>
                  <option value="7+2">7+2</option>
               </select>
            </div>
            <div class="box">
               <p>Minimum Fiyat Sınırı !<span>*</span></p>
               <select name="minimum" class="input" required>
                  <option value=""></option>
                  <option value="1000">1000 TL</option>
                  <option value="2000">2000 TL</option>
                  <option value="3000">3000 TL</option>
                  <option value="4000">4000 TL</option>
                  <option value="5000">5000 TL</option>
                  <option value="6000">6000 TL</option>
                  <option value="7000">7000 TL</option>
                  <option value="10000">10.000 TL</option>
                  <option value="20000">20.000 TL</option>
                  <option value="30000">30.000 TL</option>
                  <option value="40000">40.000 TL</option>
                  <option value="1000000">1.000.000 TL</option>
                  <option value="1500000">1.500.000 TL</option>
                  <option value="2000000">2.000.000 TL</option>
                  <option value="2500000">2.500.000 TL</option>
                  <option value="3000000">3.000.000 TL</option>
                  <option value="4000000">4.000.000 TL</option>
                  <option value="5000000">5.000.000 TL</option>
                  <option value="6000000">6.000.000 TL</option>
                  <option value="7000000">7.000.000 TL</option>
                  <option value="10000000">10.000.000 TL</option>
                  <option value="20000000">20.000.000 TL</option>
                  <option value="30000000">30.000.000 TL</option>
               </select>
            </div>
            <div class="box">
               <p>Maximum Fiyat Sınırı !<span>*</span></p>
               <select name="maximum" class="input" required>
                  <option value=""></option>
                  <option value="1000">1000 TL</option>
                  <option value="2000">2000 TL</option>
                  <option value="3000">3000 TL</option>
                  <option value="4000">4000 TL</option>
                  <option value="5000">5000 TL</option>
                  <option value="6000">6000 TL</option>
                  <option value="7000">7000 TL</option>
                  <option value="10000">10.000 TL</option>
                  <option value="10000">20.000 TL</option>
                  <option value="10000">30.000 TL</option>
                  <option value="10000">40.000 TL</option>
                  <option value="1000000">1.000.000 TL</option>
                  <option value="1500000">1.500.000 TL</option>
                  <option value="2000000">2.000.000 TL</option>
                  <option value="2500000">2.500.000 TL</option>
                  <option value="3000000">3.000.000 TL</option>
                  <option value="4000000">4.000.000 TL</option>
                  <option value="5000000">5.000.000 TL</option>
                  <option value="6000000">6.000.000 TL</option>
                  <option value="7000000">7.000.000 TL</option>
                  <option value="10000000">10.000.000 TL</option>
                  <option value="20000000">20.000.000 TL</option>
                  <option value="30000000">30.000.000 TL</option>
               </select>
            </div>
         </div>
         <input type="submit" value="Ara" name="search" class="btn">
      </form>

   </section>

</div>
<!-- services section starts  -->
<section class="services">

   <h1 class="heading">Hizmetlerimiz</h1>

   <div class="box-container">

      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Satın Al</h3>
         <p> "Hayalinizdeki evi bugün satın alın, yarının keyfini çıkarın!"</p>
      </div>

      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Kirala</h3>
         <p>"Kusursuz bir ev, sizin için sadece bir adım ötede!"</p>
      </div>

      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Sat</h3>
         <p>"Evinizi satmanın en hızlı ve güvenilir yolu burada!"</p>
      </div>

      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Daireler ve Binalar</h3>
         <p>"Modern yaşamın anahtarı, burada sizleri bekliyor!"</p>
      </div>

      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>Alışveriş ve Mağazalar</h3>
         <p>"Alışverişin kalbi, sizin için burada atıyor!"</p>
      </div>

      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>7/24 Canlı Destek</h3>
         <p>"Sorularınız ve ihtiyaçlarınız için her zaman yanınızdayız!"</p>
      </div>

   </div>

</section>
<!-- listings section starts  -->
<section class="listings">
   <h1 class="heading">Son Listelenenler</h1>
   <div class="box-container">
<?php
      $lastadded_sql="SELECT adverts.*, users.user_id, users.name 
                     FROM adverts 
                     INNER JOIN users ON adverts.user_id = users.user_id
                     ORDER BY adverts.advert_id DESC
                     LIMIT 3";

      $result_lastadded=mysqli_query($conn,$lastadded_sql);

       if ($result_lastadded->num_rows > 0) {

         while($row = $result_lastadded->fetch_assoc()) {
             echo "<div class='box'>";
             echo "<div class='admin'>";
             echo '<h3> <i class="fa-regular fa-user"></i> </h3>';
             echo "<div>";
             echo "<p>" . $row['name'] . "</p>";
             echo "<span>" . $row['advert_date'] . "</span>";
             echo "</div>";
             echo "</div>";
             echo "<div class='thumb'>";
 
             echo "<p class='type'><span>" . $row['properties_type'] . "</span><span>" . $row['sale_status'] . "</span></p>";
             echo "<form action='recorder.php' method='post' class='save'>";
             // bu satırda ilanı kaydedebilmek için form aracılığı ile ID göndermem gerekiyordu mecburen bir default değeri bulunan input ekledim
             // bu inputun default değeri ise ilanın id si 
             echo "<input type='hidden' name='advert_id' value='" . $row['advert_id'] . "'>";
             echo "<button type='submit' name='save' class='far fa-heart'></button>";
             echo "</form>";
 
             $randomNumber = rand(1, 6); $imageName = "house-img-" . $randomNumber . ".webp"; echo '<img src="images/' . $imageName . '" alt="">';
 
             echo "</div>";
             echo "<h3 class='name'>" . $row['title'] . "</h3>";
             echo "<div class='flex' style='background-color:white; height: 50px;'>";
             echo "<p class='location'><i class='fas fa-map-marker-alt'></i><span>" . $row['city'] . "</span></   p>";
             echo "<p class='location'><i class='fa-solid fa-tags'></i></i><span>" . $row['price'] . " <i class='fa-solid fa-turkish-lira-sign'></i></span></p>";
             echo "</div>";
             echo "<div class='flex'>";
             echo "<p><i class='fas fa-bed'></i><span>" . $row['rooms'] . "</span></p>";
             echo "<p><i class='fas fa-bath'></i><span>" . $row['bathrooms'] . "</span></p>";
             echo "<p><i class='fas fa-maximize'></i><span>" . $row['m_kare'] . "</span></p>";
             echo "</div>";

            echo '<form action="view_property.php" method="post">';
            echo "<input type='hidden' name='cartcurt' value='" . $row['advert_id'] . "'>";
            echo "<button type='submit' class='btn'>İlan Detayları</button>"; 
            echo '</form>';  

             echo"</div>";
         }
     } 
     else
     {
         echo "<p>No listings found.</p>";
     }
     $conn->close();
 ?>

   </div>
   
   <div style="margin-top: 2rem; text-align:center;">
      <a href="listings.php" class="inline-btn">Tümünü Görüntüle</a>
   </div>

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