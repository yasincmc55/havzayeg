<?php
$jsonData = json_decode($data->content_data);  
$banner_image = files__($jsonData, 'banner_image', $language_id)[0][0] ?? '';
?>

<div class="hero-wrap hero-wrap-2" style="background-image: url(<?= base_url('uploads/').$banner_image?>);"
     data-stellar-background-ratio="0.5">  
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Anasayfa</a></span> <span>İletişim</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">İletişim</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-counter" id="section-counter"
    data-stellar-background-ratio="0.5">
</section>

<section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4">İletişim Bilgileri</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-6">
                <p><span>Adres: </span> 25 Mayıs Mahallesi Şeh. J. Uzm. Çvş. Kaşif Arslan Sk. No : 39A Havza/Samsun</p>
            </div>
            <div class="col-md-3">
                <p><span>Telefon:</span> <a href="tel://1234567920">(+90)0543 375 73 26</a></p>
            </div>
            <div class="col-md-3">
                <p><span>Eposta:</span> <a href="mailto:info@havzayeg.com">info@havzayeg.com</a></p>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 pr-md-5">
                <form action="#">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Adınız">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Soyadınız">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Konu">
                    </div>
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Mesaj"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Mesaj Gönder" class="btn btn-primary py-3 px-5">
                    </div>
                </form>

            </div>

            <div class="col-md-6" id="map">
                
            </div>
        </div>
    </div>
</section>

