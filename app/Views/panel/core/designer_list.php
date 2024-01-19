<section class="content">
  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?= $title ??= ''; ?></h3>
      <div class="card-tools">
        <a class="btn btn-success btn-sm" href="<?= $addButtonLink ??= ''; ?>">
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
          <?php
          $f = 1;
          if($data)
            foreach ($data as $row) {
            
            echo "
                    <tr>
                      <td>$f</td>
                    ";
            echo "<td>$row->designer_name</td>";

            echo '
              <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="' . current_url() . '/edit/' . $row->designer_id . '">
                      <i class="fas fa-pencil-alt"> </i>
                  </a>
                  <a class="btn btn-danger btn-sm" onclick="return confirm(\'Bunu Silmek İstediğinizden Emin misiniz ?\')" href="' . current_url() . '/delete/' . $row->designer_id . '">
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