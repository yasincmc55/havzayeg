<?php
   $d_json = json_decode($data->content_data);
   $image = files__($d_json, 'image', $language_id)[0][0] ?? '';
   
   $title = 'baslik_' . $language_id;
   $icerik = 'icerik_' . $language_id;
   
   $title = $d_json->{$title} ?? '';
   
   $icerik = $d_json->{$icerik} ?? '';
   
   
   ?>
<div class="hero-wrap hero-wrap-2" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container-fluid">
      <div class="row no-gutters d-flex slider-text align-items-center justify-content-center" data-scrollax-parent="true">
         <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?= base_url(); ?>">Anasayfa</a></span> <span class="mr-2"><a href="<?= base_url('faaliyetler'); ?>">Faaliyetler</a></span> <span> <?= $title; ?> </span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Faaliyet Detayları</h1>
         </div>
      </div>
   </div>
</div>
<section class="ftco-section ftco-degree-bg">
   <div class="container">
      <div class="row">
         <div class="col-md-8 ftco-animate">
            <h2 class="mb-3"> <?= $title; ?> </h2>
            <p>
               <img src="<?= base_url('uploads/').$image?>" alt="" class="img-fluid">
            </p>
            <!-- icerik -->
            <?= $icerik; ?>
            <!-- icerik -->
         </div>
         <!-- .col-md-8 -->
         <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
               <h3>Son Faaliyetler</h3>
               <?php foreach($recentPosts as $recentPost): 
                  $d_json = json_decode($recentPost->content_data);
                  $image = files__($d_json, 'image', $language_id)[0][0] ?? '';
                  
                  $title = 'baslik_' . $language_id;
                  $icerik = 'icerik_' . $language_id;
                  
                  $title = $d_json->{$title} ?? '';
                  
                  ?>
               <div class="block-21 mb-4 d-flex">
                  <a href="<?= $recentPost->slug ?>" class="blog-img mr-4" style="background-image: url( <?= base_url('uploads/').$image?> );"></a>
                  <div class="text">
                     <h3 class="heading"><a href="<?= $recentPost->slug; ?>"> <?= $title; ?> </a></h3>
                     <div class="meta">
                        <?php                          
                           date_default_timezone_set('Europe/Istanbul');                        
                           setlocale(LC_TIME, 'turkish');
                           ?>
                        <div><a href="#"><span class="icon-calendar"></span><?= strftime('%d %b %Y', strtotime($recentPost->created_at)); ?></a></div>
                     </div>
                  </div>
               </div>
               <?php endforeach; ?>  
            </div>
         </div>
      </div>
   </div>
</section>
<!-- .section -->