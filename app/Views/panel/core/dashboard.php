<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card-body">
      <dl>
        <dt><?= lang('PanelTXT.dashboardTitle'); ?></dt>
        <dd><?= lang('PanelTXT.dashboardDesc'); ?></dd>
      </dl>
    </div>

    <?php
    //Json Test aşağısı
    if (isset($test_data))
      echo $test_data->groups[0][0]->groupsName;
    ?>

  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->