<?php

$d_json = json_decode($data->content_data);
$banner_image = files__($d_json, 'banner_image', $language_id)[0][0] ?? '';

$images = files__($d_json, 'image', $language_id) ?? '';

?>

<div class="hero-wrap hero-wrap-2" style="transition: background-position-y 0.1s ease; background-image: url(<?= base_url('uploads/') . $banner_image ?>);" data-stellar-background-ratio="0.5">
    <script>
        window.addEventListener('scroll', function() {
            setTimeout(function() {
                var element = document.querySelector('.hero-wrap-2');
                if (element.style.backgroundPositionY < '0px') {
                    element.style.backgroundPositionY = '0px';
                } 
            }, 100);
        });
    </script>
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center"
             data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="<?= base_url();?>">Anasayfa</a></span> <span>Leader Yaklaşımı</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Leader Yaklaşımı</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-counter" id="section-counter"
         data-stellar-background-ratio="0.5">
</section>


<div class="row mt-5 p-3">
    <div class="col-md-6 offset-md-3">
        <h5 class="text-center">
            AB ve Türkiye Cumhuriyeti tarafından finanse edilen IPARD Programı kapsamında Gıda Tarım ve Hayvancılık
            Bakanlığı tarafından "LEADER Tedbiri Farkındalık Yaratma ve Yerel Halkı Harekete Geçirme Teknik Destek
            Projesi" yürütülmektedir.
        </h5>
    </div>

</div>

<div class="row justify-content-center mt-5">
    <?php foreach($images as $image): ?>   
        <div class="col-md-4 text-center">
            <img class="mt-3 p-3 img-fluid" src="<?= base_url('uploads/').$image[0]; ?>" alt="">
        </div>
    <?php endforeach; ?>    
</div>



<section class="ftco-section">
    <div class="container">
        <div class="row d-md-flex">
            <div class="col-md-12 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active mt-2" id="v-pills-leader-tab" data-toggle="pill"
                               href="#v-pills-leader" role="tab" aria-controls="v-pills-leader"
                               aria-selected="true">Leader Yaklaşımı Nedir?</a>

                            <a class="nav-link mt-2" id="v-pills-amac-tab" data-toggle="pill" href="#v-pills-amac"
                               role="tab" aria-controls="v-pills-amac" aria-selected="false">Amaç Nedir?</a>

                            <a class="nav-link mt-2" id="v-pills-yaklasim-tab" data-toggle="pill" href="#v-pills-yaklasim"
                               role="tab" aria-controls="v-pills-yaklasim" aria-selected="false">Leader Yaklaşımının
                                Temel Özellikleri</a>

                            <a class="nav-link mt-2" id="v-pills-kalkinma-tab" data-toggle="pill"
                               href="#v-pills-kalkinma" role="tab"
                               aria-controls="v-pills-kalkinma" aria-selected="false">Yerel Kalkınma Stratejisi</a>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">

                        <div class="tab-content ftco-animate" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="v-pills-leader" role="tabpanel"
                                 aria-labelledby="v-pills-leader-tab">
                                <div>
                                    <h2 class="mb-4">LEADER Yaklaşımı Nedir?</h2>
                                    <p>
                                        LEADER yaklaşımı, kırsal alanlar için sürdürülebilir kalkınma stratejilerinin
                                        hazırlanması ve uygulanmasında yerel katılım ve ortaklığı teşvik etmek sureti
                                        ile kırsal politikaları geliştirmek için çok değerli bir kaynak olduğu
                                        kanıtlanmış bir yaklaşımdır.
                                        Bu yaklaşım, kırsal sorunlar için yenilikçi çözümler üretilmesini teşvik etmekte
                                        ve yerel toplulukların ihtiyaçlarını karşılamak için önemli bir görev
                                        üstlenmektedir.
                                        Aynı zamanda yerel aktörlerin kendi bölgelerinde uygulanacak projeler ve
                                        gerçekleştirilecek strateji ile ilgili olarak karar alma süreçlerine katılmaları
                                        anlamına gelmektedir.
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-amac" role="tabpanel"
                                 aria-labelledby="v-pills-amac-tab">
                                <div>
                                    <h2 class="mb-4">AMAÇ</h2>
                                    <p>
                                        Tedbirin genel amacı, LEADER yaklaşımına dayanan Yerel Eylem Grupları (YEG)
                                        tarafından geliştirilen tabandan tavana yerel kalkınma stratejilerini
                                        uygulamaktır.
                                    </p>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-yaklasim" role="tabpanel"
                                 aria-labelledby="v-pills-yaklasim-tab">
                                <div>
                                    <h2 class="mb-4">LEADER Yaklaşımın Temel Özellikleri</h2>
                                    <p>
                                        Yerel kamu-özel ortaklıkları (yerel eylem grupları) tarafından tabandan tavana
                                        yaklaşımı ile iyi tanımlanmış alt bölgesel kırsal alanları hedefleyen, alan
                                        bazlı yerel kalkınma stratejileri üzerine
                                        Bu, yerel kalkınma stratejilerinin geliştirilmesine ve uygulanmasına ilişkin
                                        karar verme gücünün Yerel Eylem Gruplarında (YEG) olduğu anlamına gelir.<br>
                                        Bu stratejiler birçok sektörü kapsamaktadır ve yerel ekonominin farklı
                                        sektörlerinin aktörleri ve projeleri arasındaki etkileşime dayanmaktadır.
                                    </p>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-kalkinma" role="tabpanel"
                                 aria-labelledby="v-pills-kalkinma-tab">
                                <div>
                                <h2 class="mb-4">Yerel Kalınma Stratejisi</h2>
                                    <p>
                                        Yerel Eylem Gruplarının (YEG) belirli bir coğrafi alan için bölgenin öncelikleri
                                        dikkate alınarak çok sektörlü LEADER yaklaşımı kuralları çerçevesinde
                                        hazırladıkları kalkınma belgesidir.
                                        LEADER yaklaşımı tedbiri için hazırlanan yerel kalkınma stratejisinde tüm
                                        faaliyetler aşağıdaki altı tematik öncelikten bir veya daha fazlası ile
                                        bağlantılı olmalıdır.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





