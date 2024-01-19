<?php
use App\Models\Panel\Core\Contents;

$contents = new Contents();

$searchQuery = request()->getGet('q');
if ($searchQuery) {
    $searchResults = $contents
        ->where('category_id', 89)
        ->like('content_name', $searchQuery)
        ->findAll();
}
?>

<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block text-center">
                    <h2 class="text-capitalize mb-5 text-lg"><?= lang('page.arama_sonuclari_text'); ?></h2>
                    <ul class="list-inline breadcumb-nav">
                        <li class="list-inline-item"><a href="<?= base_url('home/') . $language_code ?>"
                                                        class="text-white"><?= lang('page.header_anasayfa') ?></a></li>
                        <li class="list-inline-item"><span class="text-white">/</span></li>
                        <li class="list-inline-item"><a href="#" class="text-white-50"><?= lang('page.arama'); ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <?php if (isset($searchResults) && !empty($searchResults)) : ?>
        <div class="medical-terms">
            <div class="row my-5">
                <div class="col-md-12">
                    <div class="alp-baslik">
                        <h2><?= lang('page.arama_sonuclari_text'); ?></h2>
                        <div class="line-birim"></div>
                    </div>
                </div>
            </div>
            <?php foreach ($searchResults as $searchResult) :
                $d_json = json_decode($searchResult->content_data);
                $title = 'title_' . $language_id;
                ?>
                <div class="letter-section">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="<?= base_url($searchResult->slug) . "/" . $language_code; ?>">
                                        <h3><?= $d_json->{$title} ??= ''; ?></h3>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="no-results text-center my-5">
            <h2> <?= lang('page.arama_sonuclari_false') ?> </h2>
            <a href="<?= base_url('home/') . $language_code ?>" class="btn btn-main btn-round-full mt-3">
               <?= lang('page.anasayfaya_don'); ?>
            </a>
        </div>
    <?php endif; ?>
</div>
