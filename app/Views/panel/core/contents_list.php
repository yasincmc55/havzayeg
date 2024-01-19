<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= $title ??= ''; ?></h3>
            <div class="card-tools">
                <a class="btn btn-success btn-sm" href="<?= $addButtonLink ??= ''; ?>?cat=<?= $categoryID ?>">
                    <i class="fas fa-plus" style="margin-right:3px;"> </i>
                    <?= $addButton ??= ''; ?>
                </a>
            </div>
        </div>
        <div class="card-body p-0" style="display: block;">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%"><?= lang('PanelTXT.tableNum'); ?></th>
                        <?php
                        $i = 0;
                        if (isset($keysName)) {
                            foreach ($keysName as $k => $value) {
                                echo '<th style="width:' . $width[$i] . '">' . $value . '</th>';
                                $i++;
                            }
                        }
                        ?>
                        <th style="width: 20%" class="text-right"><?= lang('PanelTXT.tableButtons'); ?></th>
                    </tr>
                </thead>
                <tbody>


                    <tr style="background-color:#ff8989; ">
                        <td>1</td>
                        <td><?= $currentCategory->category_name; ?></td>
                        <td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="<?= base_url() . 'panel/contents/edit/' . $currentCategory->content_id;  ?>">
                                <i class="fas fa-pencil-alt"> </i>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $contentsModel = new \App\Models\Panel\Core\Contents();
                    $f = 2;
                    foreach ($subCategories as $subCat) : ?>
                        <tr style="background-color:#d7ffff; ">
                            <td><?= $f ?></td>
                            <td><?= $subCat->category_name; ?></td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="<?= base_url() . 'panel/contents/edit/' . $subCat->content_id;  ?>">
                                    <i class="fas fa-pencil-alt"> </i>
                                </a>
                            </td>
                        </tr>


                    <?php
                        $f++;
                        
                        $data = $contentsModel->where('category_id', $subCat->category_id)
                            ->where('language_id', $currentLang->language_id)
                            ->where('content_id !=', $subCat->content_id)
                            ->orderBy('content_sort_order')->findAll();

                        foreach ($data as $row) {
                            echo "
                    <tr>
                      <td>$f</td>
                    ";
                            echo "<td>$row->content_name</td>";
                            echo '
              <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="' . base_url() . 'panel/contents/edit/' . $row->content_id . '">
                      <i class="fas fa-pencil-alt"> </i>
                  </a>
                  <a class="btn btn-danger btn-sm" onclick="return confirm(\'Bunu Silmek İstediğinizden Emin misiniz ?\')" href="' . base_url() . 'panel/contents/delete/' . $row->content_id . '">
                      <i class="fas fa-trash"></i>
                  </a>
              </td>
              ';
                            echo "</tr>";
                            $f++;
                        }
                    endforeach;


                  
                   
                    $data1 = $contentsModel->where('category_id', $categoryID)
                        ->where('language_id', $currentLang->language_id)
                        ->where('content_id !=', $currentCategory->content_id)
                        ->orderBy('content_sort_order')->findAll();

                    foreach ($data1 as $row) {
                        echo "
                <tr>
                  <td>$f</td>
                ";
                        echo "<td>$row->content_name</td>";
                        echo '
          <td class="project-actions text-right">
              <a class="btn btn-info btn-sm" href="' . base_url() . 'panel/contents/edit/' . $row->content_id . '">
                  <i class="fas fa-pencil-alt"> </i>
              </a>
              <a class="btn btn-danger btn-sm" onclick="return confirm(\'Bunu Silmek İstediğinizden Emin misiniz ?\')" href="' . base_url() . 'panel/contents/delete/' . $row->content_id . '">
                  <i class="fas fa-trash"></i>
              </a>
          </td>
          ';
                        echo "</tr>";
                        $f++;
                    }



                    ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>