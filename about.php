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
   <title>Hakkımızda</title>

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

<!-- steps section starts  -->

<section class="about">

   <div class="row">
      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>
      <div class="content">
         <h3>Neden Bizi Seçmelisiniz?</h3>
         <p>Bizi seçmeniz için üç önemli neden var: Geniş portföyümüz sayesinde herkes için bir ev bulabiliriz, güvenilirlik ve müşteri memnuniyetine verdiğimiz önemle her adımda size destek oluruz ve kullanıcı dostu platformumuzla aradığınızı kolayca bulmanızı sağlarız. Bizimle çalışarak ev alma veya satma sürecinizi kolay, güvenilir ve keyifli hale getirebilirsiniz.</p>
         <a href="contact.php" class="inline-btn">Bizimle İletişime Geçin</a>
      </div>
   </div>

</section>
<!-- steps section starts  -->
<section class="steps">
   <h1 class="heading">3 basit adım</h1>
   <div class="box-container">

      <div class="box">
         <img src="images/step-1.png" alt="">
         <h3>Kriterlerinizi Seçin. </h3>
         <p> İhtiyaçlarınıza ve tercihlerinize uygun evleri bulmanız için size özel filtrelerle dolu geniş bir portföy sunuyoruz. Sizin için en uygun olanı seçin ve hayalinizdeki eve bir adım daha yaklaşın!</p>
      </div>

      <div class="box">
         <img src="images/step-2.png" alt="">
         <h3>Satıcılarla İletişime Geçin.</h3>
         <p>Hayalinizdeki evi bulduğunuzda, hemen satıcıyla iletişime geçin! Profesyonel ekibimiz aracılığıyla, en iyi teklifler için doğrudan görüşme fırsatı yakalayın. Şimdi ev sahibi olma yolculuğunuz başlasın!</p>
      </div>

      <div class="box">
         <img src="images/step-3.png" alt="">
         <h3>İşleminizi Gerçekleştiriniz.</h3>
         <p>Artık kararınızı verme zamanı geldi! Profesyonel destek ekibimizle birlikte, hayalinizdeki evi almanın veya satmanın heyecanını yaşayın. Güvenilir bir şekilde işleminizi tamamlayın ve yeni başlangıçlara adım atın!</p>
      </div>

   </div>

</section>
<!-- review section starts  -->
<section class="reviews">
   <h1 class="heading">Kullanıcı Yorumları</h1>
   <div class="box-container">

      <div class="box">
         <div class="user">
            <img src="images/pic-1.png" alt="">
            <div>
               <h3>Ata Arda Alpat</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Emlakçılarının profesyonelliği ve ilgisi gerçekten takdire şayan. İhtiyaçlarımı anladılar ve bana mükemmel bir ev bulmam konusunda yardımcı oldular. Emlak sitesi üzerinden iletişim kurmak da son derece kolay ve hızlıydı. Kesinlikle tavsiye ederim!"</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-2.png" alt="">
            <div>
               <h3>Sedef Kızmaz</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Emlak arayışımda bu siteyi keşfetmek gerçekten büyük bir şans oldu. Aradığım özelliklere sahip bir evi bulmamı sağladılar ve işlemlerin her aşamasında yanımda oldular. Hem kira hem de satılık ilanlar geniş kapsamlıydı. Teşekkürler!"</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-3.png" alt="">
            <div>
               <h3>Yiğit Eser</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Sitede gezinmek oldukça kullanıcı dostu ve  filtreleme yapmak kolay. İlanların detaylı açıklamaları ve fotoğrafları sayesinde zaman kaybetmeden istediğim evi bulabildim. Emlak danışmanları da samimi ve yardımseverdi."</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-4.png" alt="">
            <div>
               <h3>Melek korkmaz</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Emlak sitesi üzerinden yaptığım ev arayışımda karşılaştığım en kapsamlı platformlardan biri oldu. Güncel ve doğru bilgilerle donatılmış ilanlar sayesinde istediğim evi hızlıca bulabildim. Müşteri hizmetleri de sorularıma hızlı cevap verdi."</p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-7.png" alt="">
            <div>
               <h3>Bilal Mart</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                 
               </div>
            </div>
         </div>
         <p> Siteniz gelişime açık lakin acil kullanımım için yeterli olmadı bir site yapıyorsanız hızlı yapın kardeşim sizin yüzünüze ev bulamadım MAĞDURUM! <br><br><br></p>
      </div>

      <div class="box">
         <div class="user">
            <img src="images/pic-6.png" alt="">
            <div>
               <h3>Meral Akşener</h3>
               <div class="stars">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
               </div>
            </div>
         </div>
         <p>"Emlak arayışımda birçok siteyi denedim ancak bu site en iyisi çıktı. Geniş ilan yelpazesi ve güncel bilgilerle dolu olması sayesinde istediğim evi bulmam çok kısa sürdü. Ayrıca emlak danışmanları da işlerini gerçekten iyi yapıyor. Teşekkür ederim!"</p>
      </div>

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


<!-- javascript dosyalarının çağırılması veya script kodların yazılması  -->
<script src="js/script.js"></script>
<script src="js/girişkontrol.js"></script>
   
</body>
</html>