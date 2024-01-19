<?php

$d_json = json_decode($data->content_data);
//$banner_image  = files__($d_json, 'banner_image', $language_id)[0][0];

$content = 'content_' . $language_id;
$title = 'title_' . $language_id;
?>

<?php
   $gp_slug = decode_data_lang($language_id,406,'slug');
   $cp_slug = decode_data_lang($language_id,407,'slug');
   $blog_slug = decode_data_lang($language_id,382,'slug');
?>

<body>

<header class="text-center">
    <!-- Logo -->
    <a href="<?= base_url('');?>">
     <img src="<?= base_url('assetssite')?>/img/112_logo.svg" alt="Logo" class="mx-auto d-block" style="width: 210px;">
    </a>
    <!-- bayraklar -->
    <?= view('includes/flag') ?>
    <!-- Başlık -->
    <div class="my-2 blog-text">
       <p><?= $d_json->{$title} ??= ''; ?></p>
    </div>
</header>


<!-- About Start -->
<div class="container-xxl py-5">
   <?= $d_json->{$content} ??= ''; ?>
 </div>



<footer class="text-center text-white footer-ust">
    <!-- Grid container -->
    <div class="container p-2 pb-0">
        <!-- Section: Social media -->
        <section>

            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url('home/').$language_code;?>" role="button">
                <?= lang('page.header_anasayfa') ?> </a>
            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url($gp_slug)."/".$language_code; ?>"
               role="button">   <?= lang('gb.gizlilik_politikasi'); ?> </a>
            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url($cp_slug)."/".$language_code; ?>"
               role="button"> <?= lang('gb.cerez_politikasi'); ?> </a>

        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3  text-dark footer-alt">
        Copyright &copy; <?= lang('page.ft_hak_text') ?>
    </div>
    <!-- Copyright -->
</footer>

<!-- JavaScript dosyaları -->
<script src="<?= base_url('assetssite') ?>/js/jquery-3.4.1.min.js"></script>
<script src="<?= base_url('assetssite') ?>/js/bootsrap.min.js"></script>
<script src="<?= base_url('assetssite') ?>/js/owl.carousel.min.js"></script>
<script src="<?= base_url('assetssite') ?>/js/main.js"></script>
</body>
</html>