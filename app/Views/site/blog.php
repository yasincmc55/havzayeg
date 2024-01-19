<?php
$jsonData = json_decode($data->content_data);


$blogs = $model
    ->where('category_id', $data->category_id)
    ->where('content_parent_id !=', $data->content_id)
    ->where('language_id ', $language_id)
    ->orderBy('content_sort_order', 'ASC')
    ->findAll();

?>


<?php
$gp_slug = decode_data_lang($language_id,406,'slug');
$cp_slug = decode_data_lang($language_id,407,'slug');

?>

<body>
<header class="text-center">
    <!-- Logo -->
    <a href="<?= base_url('');?>">
        <img src="<?= base_url('assetssite') ?>/img/112_logo.svg" alt="Logo" class="mx-auto d-block" style="width: 210px;">
    </a>
    <!-- Başlık -->

    <!-- bayraklar -->
    <?= view('includes/flag') ?>

    <div class="my-2 blog-text">
        <p> <?= lang('gb.blog_baslik') ?></p>
    </div>
</header>

<div class="container my-5 text-center mb-3">
    <div class="centered-content">
        <h2 class="blog-area-top-text  text-dark"><?= lang('gb.blog_inceleme') ?></h2>
        <hr class="white-line">
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="position:relative;">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($blogs as $blog):

                        $d_json = json_decode($blog->content_data);

                        $blog_image_data = files__($d_json, 'blog_image', $language_id);
                        // Eğer resim varsa ilk öğeyi al, yoksa boş bir dize ata
                        $blog_image = !empty($blog_image_data) ? $blog_image_data[0][0] : '';
                        $blog_title = 'blog_title_' . $language_id;

                        ?>

                        <div class="swiper-slide">
                            <a href="<?= base_url($blog->slug)."/".$language_code?>">
                                <img src="<?= base_url('uploads/') . $blog_image ?>" alt="Makale 1 Resmi">
                                <h3><?= $d_json->{$blog_title} ??= ''; ?></h3>
                            </a>

                        </div>
                    <?php endforeach ?>
                </div>

            </div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const swiper = new Swiper(".swiper", {
            loop: true,
            slidesPerView: 2,
            spaceBetween: 10,
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    });


</script>


<footer class="text-center text-white footer-ust">
    <!-- Grid container -->
    <div class="container p-2 pb-0">

        <section>
            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url($blog_slug)."/".$language_code;?>" role="button">
                <?= lang('gb.makaleler') ?> </a>
            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url($gp_slug)."/".$language_code; ?>"
               role="button">   <?= lang('gb.gizlilik_politikasi'); ?> </a>
            <a class="btn btn-outline-light btn-floating m-1 fw-bolder" href="<?= base_url($cp_slug)."/".$language_code; ?>"
               role="button"> <?= lang('gb.cerez_politikasi'); ?> </a>
        </section>

    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3  text-dark footer-alt">
        <?= lang('gb.footer_copyright_text'); ?>
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