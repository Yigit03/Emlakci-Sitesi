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
   <title>İletişim</title>

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

<!-- header section ends -->

<!-- contact section starts  -->

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="images/contact-img.svg" alt="">
      </div>
      <form action="contacter.php" method="post">
         <h3>İletişime Geçin</h3>
         <input type="text" name="name" required maxlength="50" placeholder="Ad Soyad" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="e-posta" class="box">
         <input type="number" name="number" required maxlength="10" max="9999999999" min="0" placeholder="Telefon Numrası" class="box">
         <textarea name="message" placeholder="Mesajınız" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="Gönder" name="send" class="btn">
      </form>
   </div>
</section>

<!-- contact section ends -->

<!-- faq section starts  -->

<section class="faq" id="faq">

   <h1 class="heading">Sık Sorulan Sorular</h1>

   <div class="box-container">

      <div class="box active">
         <h3><span>Rezervasyon nasıl iptal edilir?</span><i class="fas fa-angle-down"></i></h3>
         <p>Rezervasyonunuzu iptal etmek için hesabınıza giriş yapın, rezervasyonunuzun bulunduğu bölümü seçin ve "İptal Et" seçeneğine tıklayın. İptal politikamızı gözden geçirmenizi öneririz.</p>
      </div>

      <div class="box active">
         <h3><span>mülkiyeti ne zaman alacağım?</span><i class="fas fa-angle-down"></i></h3>
         <p>Mülkiyetinizi ne zaman alacağınız, ödeme planınıza ve satıcının belirlediği koşullara bağlıdır. Satış sözleşmesinde belirtilen tarihleri takip edin veya satıcıyla iletişime geçerek daha fazla bilgi alın.</p>
      </div>

      <div class="box">
         <h3><span>Ödeme Yöntemleri Neler?</span><i class="fas fa-angle-down"></i></h3>
         <p>Ödeme yöntemleri arasında banka transferi, kredi kartı ve nakit ödeme gibi seçenekler bulunmaktadır. Hangi ödeme yöntemlerinin kabul edildiğini öğrenmek için ilgili bölümü ziyaret edin veya bizimle iletişime geçin.</p>
      </div> 

      <div class="box">
         <h3><span>alıcılarla nasıl iletişime geçilir?</span><i class="fas fa-angle-down"></i></h3>
         <p>Alıcılarla iletişime geçmek için ilanınızı yayınladıktan sonra site üzerinden mesajlaşma özelliğini kullanabilirsiniz. Alıcıların size mesaj gönderebilmesi için iletişim bilgilerinizi doğru ve güncel tutmanız önemlidir.</p>
      </div>

      <div class="box">
         <h3><span>ilanım neden görünmüyor?</span><i class="fas fa-angle-down"></i></h3>
         <p>İlanınızın görünmemesinin birkaç nedeni olabilir. Öncelikle ilanınızın onaylanmış olduğundan ve yayınlanmış olduğundan emin olun. Ayrıca filtreler veya belirli kriterler nedeniyle ilanınızın görünürlüğü etkilenebilir. Sorun devam ederse müşteri hizmetlerimizle iletişime geçin.</p>
      </div>

      <div class="box">
         <h3><span>
            İlanımı nasıl tanıtabilirim?</span><i class="fas fa-angle-down"></i></h3>
         <p>İlanınızın daha fazla görünmesini istiyorsanız, sosyal medya platformlarında paylaşabilir, ilanınızı öne çıkaran özellikleri vurgulayabilir veya reklam seçeneklerimizi kullanabilirsiniz. Ayrıca ilanınızın açıklamasını ve fotoğraflarını güncel tutarak daha fazla dikkat çekebilirsiniz.</p>
      </div>

   </div>
</section>

<!-- faq section ends -->










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
<script>

   document.getElementById("kayit").onclick= function(){
      alert("Final Döenmine kadar eklenmiş olur beklemede kalın :):):)");
   }
   </script>
   
</body>
</html>