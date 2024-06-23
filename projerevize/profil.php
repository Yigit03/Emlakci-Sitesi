<?php
include("vt.php");

session_start();
$oturum_id=$_SESSION['user_id'];

$sql_profil="SELECT * FROM users WHERE user_id='$oturum_id'";
$result_profil=mysqli_query($conn,$sql_profil);

$profilkayit=mysqli_fetch_assoc($result_profil);
$telefon=$profilkayit['telefon'];
$gender=$profilkayit['gender'];
$email=$profilkayit['email'];
$name=$profilkayit['name'];

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
   <link rel="stylesheet" href="css/profil.css">
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


<section>
<div class="profil_container"><!--Profil Bilgilerini Kapsayan Container-->
      <div class="profil_left"><!--Kullanıcının En Güncel Bilgilerini kapsayan Container-->

         <div class="profil_photo">
            <h1><i class="fa-solid fa-user"></i></h1>
         </div>

         <div class=" profil_baslik">
            <h1 style="margin-top:-10px;"> Profil Bilgilerim </h1>
            <br>
            <div class="line"></div>
         </div>
         <!--Proje Geliştirildiğinde Profil Fotoğrafının ekleneceği yer şimdilik PP iconu var-->
   <div class="info_container">

         <div class="profil_info">
               <p><?php echo $name ?></p>
         </div>

         <div class="profil_info">           
               <p><?php echo $_SESSION["email"]?></p>          
         </div>

         <div class="profil_info">
               <p>
                  <?php 
                  if(empty($telefon))
                  {
                     
                     echo "(___)___ __ __";
                  }
                  else
                  {
                     echo $telefon;
                  }    
                  ?>
               </p>
         </div>
          <div class="profil_info">
               <p>
               <?php 
                  if(empty($gender))
                  {
                     echo "<i>Cinsiyet Belirtilmemiş</i>";
                     
                  }
                  else
                  {
                     echo $gender;
                  }    
                  ?>
               </p>
          </div>
      </div>
   </div>
<!------------------------------------------------------------------>
<!----------------------------Boşluk-------------------------------->
<!------------------------------------------------------------------>
    <div class="profil_right">

        <div class=" profil_baslik">
            <h1>Profil Bilgilerini Güncelleme</h1>
            <br>
            <div class="line"></div>
        </div>
      <form action="profil_update.php" method="post">

        <div class=" profil_update">
            <input name="user_name" type="text" class="input" placeholder="Yeni Kullanıcı Adınızı Giriniz ! ">
        </div>

        <div class=" profil_update" >
            <select name="cinsiyet" type="text" class="input" placeholder="Yeni Cinsiyet Giriniz ! ">
               <option value="">Yeni Cinsiyet Giriniz !</option>
               <option value="Erkek">Erkek</option>
               <option value="Kadın">Kadın</option>
               <option value="Yok">Belirtmek İstemiyorum</option>
            </select>
        </div>

        <div class=" profil_update " >
            <input name="telefon" type="text" class="input" placeholder="05554443322 (Boşluksuz) ! " maxlength="11" max="9999999999" min="01111111111">
        </div>

        <div class=" profil_update" >
            <input name="pass" type="text" class="input" placeholder="Yeni şifre Giriniz ! ">
        </div>

        <div class=" profil_update" >
            <input name="c_pass" type="text" class="input" placeholder="Yeni Şifre Tekrar Giriniz ! ">
        </div>

        <div class=" profil_update">
            <input name="submit" type="submit" class="input" value="Güncelle" style="color:white; background-color: var(--main-color)" >
        </div>
      </form>
   </div>
</div > 
</section>

<footer class="footer" style="">

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