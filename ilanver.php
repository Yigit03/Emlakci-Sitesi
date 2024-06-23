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
   <title>İlan Ver</title>

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

<!-- search filter section starts  -->

<section class="filters" style="padding-bottom: 0;">
   <form action="ilanverici.php" method="POST">
      <div id="close-filter"><i class="fas fa-times"></i></div>
      <h3>Mülkün Temel Özelliklerini Giriniz !</h3>
         
         <div class="flex">
            <div class="box">
               <p>İlan Başlığı Giriniz !</p>
               <input type="text" name="title" required maxlength="50" placeholder="Başlık" class="input">
            </div>
            <div class="box">
               <p>Şehir Giriniz ! </p>
               <input type="text" name="city" required maxlength="50" placeholder="Şehir" class="input">            
            </div>
            <div class="box">
               <p>Adres Giriniz ! </p>
               <input type="text" name="adress" required maxlength="50" placeholder="Adres" class="input">
            </div>
            <div class="box">
               <p>Fiyat Giriniz ! </p>
               <input type="text" name="price" required maxlength="50" placeholder="Fiyat" class="input">
            </div>
            <div class="box">
               <p>Mülk Tipi</p>
               <select name="propertiestype" class="input" required>
                  <option value=""></option>
                  <option value="Ev">Ev</option>
                  <option value="Daire">Daire</option>
                  <option value="Arsa">Arsa</option>
                  <option value="Mağaza">Mağaza</option>
               </select>
            </div>
            <div class="box">
               <p>Satış Tİpi</p>
               <select name="sale_status" class="input" required>
                  <option value=""></option>
                  <option value="satılık">Satılık</option>
                  <option value="kiralık">Kiralık</option>
                  <option value="devren">Devren Kiralık</option>
               </select>
            </div>
            <div class="box">
               <p>oda Sayısı</p>
               <select name="rooms" class="input" required>
                  <option value=""></option>
                  <option value="1+0">1+0</option>
                  <option value="1+1">1+1</option>
                  <option value="1+1.5">1+1.5</option>
                  <option value="2+0">2+0</option>
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
               <p>Bina Yaşı Giriniz !</p>
               <input type="text" name="age" required maxlength="50" placeholder="Yaş" class="input">
            </div>
            <div class="box">
               <p>Kaçıncı Kat</p>
               <input type="text" name="floor" required maxlength="50" placeholder="Kat" class="input">
            </div>
            <div class="box">
               <p>Toplam Kat</p>
               <input type="text" name="totalfloor" required maxlength="50" placeholder="Tpolam Kat" class="input">
            </div>
            <div class="box">
               <p>Isınma Nasıl</p>
               <select name="warming" class="input" required>
                  <option value=""></option>
                  <option value="Doğal Gaz">Doğal Gaz</option>
                  <option value="Kalorifer">Kalorifer</option>
                  <option value="Soba">Soba</option>
                  <option value="Klima">Klima</option>
                  <option value="Yerden Isıtma">Yerden Isıtma</option>
               </select>            
            </div>
            <div class="box">
               <p>Depozito Sayısı</p>
               <input type="text" name="deposit" required maxlength="50" placeholder="Depozito" class="input">
            </div>
            <div class="box">
               <p>Kaç m2</p>
               <input type="text" name="m2" required maxlength="50" placeholder="m2" class="input">
            </div>
            <div class="box">
               <p>Banyo Sayısı</p>
               <input type="text" name="bathrooms" required maxlength="50" placeholder="Banyo" class="input">
            </div>
            <div class="box">
               <p>Balkon Sayısı</p>
               <input type="text" name="balcony" required maxlength="50" placeholder="Balkon" class="input">
            </div>
            <div class="box">
               <p>Eşyalı mı ?</p>
               <select name="furnished" class="input" required>
                  <option value=""></option>
                  <option value="hayır">Hayır</option>
                  <option value="Evet">Evet</option>
               </select>             
            </div>
            <div class="box">
               <p>Mülk Durumu</p>
               <select name="situation" class="input" required>
                  <option value=""></option>
                  <option value="taşınmaya Hazır">Taşınmaya Hazır</option>
                  <option value="kiracı Var">Kiracı Var</option>
               </select>             
            </div>
            <div class="box">
               <p>Aidat Miktarı ?</p>
               <input type="text" name="dues" required maxlength="50" placeholder="Aidat" class="input">            
            </div>
            <div class="box">
               <p>Krediye Uygun mu?</p>
               <select name="credit" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>İlan Açıklaması </p>
               <textarea name="explanation" placeholder="Açıklama..." required maxlength="1000" cols="10" rows="3" class="box" style="width:100%; border: 1px solid;padding: 5px;"></textarea>
            </div>
         </div>

      <h3>Mülkün Extra Özelliklerini Belirtin !</h3>
         
         <div class="flex">
            <div class="box">
               <p>Asansör Mevcut mu?</p>
               <select name="lift" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>Güvelik Var mı?</p>
               <select name="security_person" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p> Çocuklar İçin Oyun Alanı Var mı?</p>
               <select name="playground" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>Bahçeli mi?</p>
               <select name="garden" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>Su Deposu Var mı?</p>
               <select name="water_tank" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>Jeneratör Mevcut mu?</p>
               <select name="generator" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>Araba Park Alanı Var mı?</p>
               <select name="car_park" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>Spor Salonu Var mı veya Yakınmı ?</p>
               <select name="gym" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>AWM Var mı veya Yakınmı ?</p>
               <select name="mall" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>Okul Var mı veya Yakınmı ?</p>
               <select name="school" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>Hastane Var mı veya Yakınmı ?</p>
               <select name="hospital" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
            <div class="box">
               <p>market Var mı veya Yakınmı ?</p>
               <select name="market" class="input" required>
                  <option value=""></option>
                  <option value="evet">Evet</option>
                  <option value="hayır">Hayır</option>
               </select>             
            </div>
         <input type="submit" value="ilan ver" name="search" class="btn">
   </form>

</section>






<!--Alttan boşluk vermek için ekledim ... -->
<!------------------------------------------>
<section class="listings"></section>
<!------------------------------------------>









<!-- footer section başlangıcı  -->
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

<script>

document.querySelector('#filter-btn').onclick = () =>{
   document.querySelector('.filters').classList.add('active');
}

document.querySelector('#close-filter').onclick = () =>{
   document.querySelector('.filters').classList.remove('active');
}

</script>

<script src="js/girişkontrol.js"></script>
   








</body>
</html>