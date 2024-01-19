<div class="col">
    <div class="card card-primary col-12  p0">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" class="form" id="form" action="<?= base_url('panel/contents/create') ?>" method="POST">
            <?= csrf_field() ?>


            <ul class="nav nav-tabs" id="custom-tabs-one-tab_main" role="tablist">
                <?php
                $active = '_';
                foreach ($languages as $lang) :
                    if ($active == '_') :
                        $active = 'active';
                    else :
                        $active = '';
                    endif;
                ?>

                    <li class="nav-item">
                        <a class="nav-link <?= $active ?>" id="custom-tabs-one-home-tab_main_<?= $lang->language_id; ?>" data-toggle="pill" href="#custom-tabs-one-home_main_<?= $lang->language_id; ?>" role="tab" aria-controls="custom-tabs-one-home_main_<?= $lang->language_id; ?>" aria-selected="true"><?= $lang->language_name; ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent_main">

                    <?php

                    $active = '_';
                    foreach ($languages as $lang) :
                        if ($active == '_') :
                            $active = 'active show';
                        else :
                            $active = '';
                        endif;


                    ?>
                        <div class="tab-pane fade <?= $active ?>" id="custom-tabs-one-home_main_<?= $lang->language_id; ?>" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab_main_<?= $lang->language_id; ?>">

                            <div class="row">
                                <div class="form-group col-12 col-sm-3">
                                    <label for="d_name">İçerik Adı</label>
                                    <input type="text" value="" class="form-control" id="d_name" name="content_name_<?= $lang->language_id; ?>" placeholder="Lütfen İçerik İsmini Yazınız" required>

                                </div>

                                <div class="form-group col-12 col-sm-3">
                                    <label for="Sort">Sıralama</label>
                                    <input type="text" value="" class="form-control" id="Sort" name="content_sort_order_<?= $lang->language_id; ?>" placeholder="İçerik Sırası">
                                </div>

                                <div class="form-group col-12 col-sm-3">
                                    <label for="Slug">SEO_URL</label>
                                    <input type="text" value="" class="slug form-control" id="Sort" name="slug_<?= $lang->language_id; ?>" placeholder="Benzersiz URL Girin !">
                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>
                    <div class="row">
                        <div class="form-group col-12 col-sm-3">
                            <label for="Sort">Kategori</label>
                            <select name="category_id" class="form-control">

                                <?php foreach ($categories as $category) :
                                    if ($currentCategory == $category->category_id)
                                        $currentDesignerID = $category->designer_id;

                                ?>
                                    <option value="<?= $category->category_id; ?>" <?= ($currentCategory == $category->category_id) ? "selected" : "" ?>><?= $category->category_name; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-sm-3">
                            <label for="Sort">İçerik Şablonu</label>
                            <select name="designer_id" class="form-control">

                                <?php foreach ($designers as $design) : ?>
                                    <option value="<?= $design->designer_id; ?>" <?= ($currentDesignerID == $design->designer_id) ? "selected" : "" ?>><?= $design->designer_name; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <hr>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i><?= $saveButton; ?></button>
            </div>
        </form>


        <div class="results__display"></div>

    </div>
</div>