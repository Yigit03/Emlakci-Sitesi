// Menüyü seç
let menu = document.querySelector('.header .menu');

// Menü butonuna tıklama olayını dinle
document.querySelector('#menu-btn').onclick = () =>{
   // Menüye 'active' sınıfını ekle veya kaldır
   menu.classList.toggle('active');
}

// Sayfa kaydırma olayını dinle
window.onscroll = () =>{
   // Menüden 'active' sınıfını kaldır
   menu.classList.remove('active');
}

// Sayfadaki 'number' tipindeki input alanlarını seç ve 
// her birinde max karakter geçilirse fazlalığı sil.
document.querySelectorAll('input[type="number"]').forEach(inputNumber => {
   inputNumber.oninput = () =>{
      // Input değerini maksimum uzunluğa kadar kısalt
      if(inputNumber.value.length > inputNumber.maxLength) inputNumber.value = inputNumber.value.slice(0, inputNumber.maxLength);
   };
});

// Sayfadaki küçük resimleri seç ve her birine bir işlev ata
document.querySelectorAll('.view-property .details .thumb .small-images img').forEach(images =>{
   images.onclick = () =>{
      // Tıklanan küçük resmin src özniteliğini al
      let src = images.getAttribute('src');
      // Büyük resmin src özniteliğini tıklanan küçük resmin src değeriyle değiştir
      document.querySelector('.view-property .details .thumb .big-image img').src = src;
   }
});

// Sıkça Sorulan Sorular bölümündeki başlıkları seç ve her birine bir işlev ata
document.querySelectorAll('.faq .box-container .box h3').forEach(headings =>{
   headings.onclick = () =>{
      // Başlığın üst elementine 'active' sınıfını ekle veya kaldır
      headings.parentElement.classList.toggle('active');
   }
});