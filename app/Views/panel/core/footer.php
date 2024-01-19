</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
  <?= lang('PanelTXT.mainFooter'); ?>
  <div class="float-right d-none d-sm-inline-block">
    <?= lang('PanelTXT.version'); ?>
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= $frontLink; ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= $frontLink; ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- overlayScrollbars -->
<script src="<?= $frontLink; ?>/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $frontLink; ?>/dist/js/adminlte.js"></script>

<link href="<?= $frontLink; ?>/plugins/summernote-bs4.min.css" rel="stylesheet">
<script src="<?= $frontLink; ?>/plugins/summernote-bs4.min.js"></script>

<!-- Toaster -->
<script src="<?= $frontLink; ?>/plugins/toastr/toastr.min.js"></script>
<!-- Toaster -->
<link rel="stylesheet" href="<?= $frontLink; ?>/plugins/toastr/toastr.min.css">
<!-- Alertfy JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>


<script>
  <?php
  if ($textarea ?? false) {
    ?>

    $(document).ready(function() {
      $('.summernote').summernote({ height: 150 });
    });

  <?php }

  $session = \Config\Services::session();
  if ($session->getFlashdata() != null) {
    $mesaj_ =  $session->getFlashdata('mesaj');
    $alert_ = $session->getFlashdata('renk');
    echo "toastr.$alert_('$mesaj_')";
  }

  ?>
</script>


<script>
    $(document).ready(function(){
        <?php if(session()->getFlashData('musteri-success')): ?>
          alertify.set('notifier','position', 'top-right');
          alertify.success('<?= session()->getFlashdata('musteri-success') ?>');
        <?php endif; ?>

        <?php if(session()->getFlashData('success-delete')): ?>
          alertify.set('notifier','position', 'top-right');
          alertify.success('<?= session()->getFlashdata('success-delete') ?>');
        <?php endif; ?>

        <?php if(session()->getFlashData('ileri-tarih-success')): ?>
          alertify.set('notifier','position', 'top-right');
          alertify.success('<?= session()->getFlashdata('ileri-tarih-success') ?>');
        <?php endif; ?>

    });
</script>

</body>

</html>

