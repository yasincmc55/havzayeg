<?php

$jsonData = json_decode($data->content_data);  
$banner_image = files__($jsonData, 'banner_image', $language_id)[0][0] ?? '';
   
$veriler = $model
    ->where('category_id', $data->category_id)
    ->where('content_parent_id !=', $data->content_id)
    ->where('language_id ', $language_id)
    ->orderBy('content_sort_order', 'ASC')
    ->findAll();

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
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
          	<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Anasayfa</a></span> <span>Faaliyetler</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Faaliyetlerimiz</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-counter" id="section-counter"
         data-stellar-background-ratio="0.5">
</section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row">

        <?php foreach($veriler as $veri):

          $d_json = json_decode($veri->content_data);
          $image = files__($d_json, 'image', $language_id);
          // Eğer resim varsa ilk öğeyi al, yoksa boş bir dize ata
          $resim = !empty($image) ? $image[0][0] : '';
          $baslik = 'baslik_' . $language_id; 
         ?>
          <div class="col-md-4 ftco-animate">
            <div class="blog-entry">
                <a href="<?= $veri->slug ?>" class="block-20" style="background-image: url(<?= base_url('uploads/').$resim ?>);"> </a>       
              <div class="text p-4 d-block">
                <div class="meta mb-3">
                 <?php                          
                    date_default_timezone_set('Europe/Istanbul');                        
                    setlocale(LC_TIME, 'turkish');
                  ?>
                  <div><a href="#"> <?= strftime('%d %b %Y', strtotime($veri->created_at)); ?></a></div>
                </div>
                <h3 class="heading"><a href="<?= $veri->slug ?>"> <?= $d_json->{$baslik} ??= ''; ?> </a></h3>
              </div>
            </div>
          </div>
        <?php endforeach; ?>  

        </div>
       
      </div>
    </section>
