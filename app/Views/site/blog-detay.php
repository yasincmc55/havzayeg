<?php

$d_json = json_decode($data->content_data);

$blogResim = files__($d_json, 'blog_image', $language_id)[0][0];

$blog_title = 'blog_title_' . $language_id;
$blog_subtitle = 'blog_subtitle_' . $language_id;
$blog_content = 'blog_content_' . $language_id;

$blog_title = $d_json->{$blog_title};
$blog_subtitle = $d_json->{$blog_subtitle};
$blog_content = $d_json->{$blog_content};

?>

<body>

<header class="text-center">
    <!-- Logo -->
    <a href="<?= base_url('');?>">
        <img src="<?= base_url('assetssite')?>/img/112_logo.svg" alt="Logo" class="mx-auto d-block" style="width: 210px;">
    </a>
    <!-- bayraklar -->
    <?= view('includes/flag') ?>
</header>

<style>
    .back-arrow{
        padding-bottom: 10px;
    }
    .back-arrow a{
        text-decoration: none;
    }

    .arrow-text{
        margin-left:10px;
    }

</style>


<div class="container mt-5">
    <div class="row">

        <div class="col-lg-8 offset-lg-2">
            <div class="back-arrow">
                <a href="<?= base_url('blog');?>" > <img src="<?= base_url('assetssite/img/')?>arrow-left.png" alt="" style="max-width: 30px;"> <span class="arrow-text"> <?= lang('gb.makale_geri_don_ok') ?> </span> </a>
            </div>
            <h1 class="display-4"><?= $blog_title; ?></h1>
            <img src="<?= base_url('uploads/').$blogResim ?>" alt="Blog Resmi" class="img-fluid mb-4">
            <p class="subtitle" > <?= $blog_subtitle; ?> </p>
            <p> <?= $blog_content; ?> </p>
        </div>
    </div>
</div>

<?php
$gp_slug = decode_data_lang($language_id,406,'slug');
$cp_slug = decode_data_lang($language_id,407,'slug');
$blog_slug = decode_data_lang($language_id,382,'slug');
?>


<footer class="text-center text-white footer-ust">
    <!-- Grid container -->
    <div class="container p-2 pb-0">
        <!-- Section: Social media -->
        <section>
            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url('blog/'.$language_code); ?>" role="button">
                <?= lang('gb.makaleler') ?> </a>
            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url('gizlilik-politikasi/'.$language_code); ?>"
               role="button">   <?= lang('gb.gizlilik_politikasi'); ?> </a>
            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url('cerez-politikasi/'.$language_code); ?>"
               role="button"> <?= lang('gb.cerez_politikasi'); ?> </a>
        </section>
        <!-- Section: Social media -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3  text-dark footer-alt">
        <?= lang('gb.footer_copyright_text'); ?>
    </div>
    <!-- Copyright -->
</footer>


<!-- JavaScript dosyaları -->
<script src="<?=base_url('assetssite')?>/js/jquery-3.4.1.min.js"></script>
<script src="<?=base_url('assetssite')?>/js/bootsrap.min.js"></script>
<script src="<?=base_url('assetssite')?>/js/owl.carousel.min.js"></script>
<script src="<?=base_url('assetssite')?>/js/main.js"></script>

</body>
</html>
