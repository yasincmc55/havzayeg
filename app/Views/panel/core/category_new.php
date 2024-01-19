<div class="col">
    <div class="card card-primary col-12  p0">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" class="form" id="form" action="<?= base_url('panel/categories/create') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-12 col-sm-3">
                        <label for="d_name">Kategori Adı</label>
                        <input type="text" class="form-control" id="d_name" name="name" placeholder="Lütfen Kategori İsmini Yazınız" required>
                    </div>
                    <div class="form-group col-12 col-sm-3">
                        <label for="Sort">Kategori Sıra</label>
                        <input type="text" class="form-control" id="Sort" name="sortCategory" placeholder="Kategori Sırası">
                    </div>
                    <div class="form-group col-12 col-sm-3">
                        <label for="Sort">Dizayn Adı</label>
                        <select name="designer_id" id="" class="form-control">
                            <option value="0">Seçiniz</option>
                            <?php foreach ($designers as $design) : ?>
                                <option value="<?= $design->designer_id; ?>"><?= $design->designer_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-12 col-sm-3">
                        <label for="Sort">Üst Kategori</label>
                        <select name="parent_id" id="" class="form-control">
                            <option value="0" selected>Ana Kategori</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category->category_id; ?>"><?= $category->category_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-12 col-sm-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="in_header_menu">
                            <label class="form-check-label">Header Menüde Göster</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="in_footer_menu">
                            <label class="form-check-label">Footerda Göster</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="in_panel_menu">
                            <label class="form-check-label">Panelde Solda Göster</label>
                        </div>
                    </div>
                    <div class="form-group col-12 col-sm-3">
                    <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="status" checked>
                            <label class="form-check-label">Aktif / Pasif</label>
                        </div>
                    </div>
                    <div class="form-group col-12 col-sm-3">
                        <label for="Sort">icon (fontawesome 5)</label>
                        <input type="text" class="form-control" id="Sort" name="icon" placeholder="örn: fas fa-home">
                    </div>
                   
                </div>
                <hr>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i><?= $saveButton; ?></button>
            </div>
        </form>
    </div>
</div>