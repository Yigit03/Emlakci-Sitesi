document.getElementById("ilanver").addEventListener("click", function() {
    // İlan ver butonuna tıklanma olayını dinle ve aşağıdaki işlemleri gerçekleştir
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() 
    {
        // İstek durumu değiştiğinde aşağıdaki işlemleri gerçekleştir
        if (this.readyState == 4 && this.status == 200) 
        {
            // Sunucudan gelen yanıtı al
            var isLoggedIn = this.responseText;
            // Kullanıcı girişi yapıldıysa ilanver.html sayfasını aç
            if (isLoggedIn === 'true') 
            {
                window.location.href = "ilanver.html";
            } 
            else 
            {
                // Kullanıcı girişi yapılmadıysa login.html sayfasını aç
                window.location.href = "login.html";
            }
        }
    };
    // check_login.php dosyasına GET isteği gönder
    xhr.open("GET", "login.php", true);
    xhr.send();
});