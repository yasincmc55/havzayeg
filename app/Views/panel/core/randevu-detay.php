<div class="container mt-4">
    <h2>Randevu Detayları</h2>

    <!-- Detaylar Tablosu -->
    <table class="table">
        <tr>
            <th>Adı Soyadı</th>
            <td><?= esc($randevu->name) ?></td>
        </tr>
        <tr>
            <th>Durumu</th>
            <td><?= esc($randevu->status) ?></td>
        </tr>
        <tr>
            <th>Konum</th>
            <td><?= esc($randevu->location) ?></td>
        </tr>
        <tr>
            <th>Tel no</th>
            <td><?= esc($randevu->phone) ?></td>
        </tr>
        <tr>
            <th>E-mail</th>
            <td><?= esc($randevu->email) ?></td>
        </tr>
        <tr>
            <th>Bölüm</th>
            <td><?= esc($randevu->department) ?></td>
        </tr>
        <tr> 
             <?php if($randevu->acil_durumu == 0): ?>
               <th>Randevu Tarihi ve Saat</th>
               <td><?= esc($randevu->tarih . ' ' . $randevu->saat) ?></td>
             <?php else: ?>

                <th>Randevu Tipi</th>
                <td>Acil Durum Görüşmesi</td>

             <?php endif; ?>       
        </tr>
        <tr>
            <th>Mesaj</th>
            <td><?= esc($randevu->message) ?></td>
        </tr>
        <tr>
            <th>Resim/Video</th>
            <td>
                <?php if (!empty($randevu->video_photo)): ?>
                    <a href="<?= base_url('writable/uploads/' . esc($randevu->video_photo)) ?>" target="_blank">
                        Görüntüle
                    </a>
                <?php else: ?>
                    <span>Resim/Video yok</span>
                <?php endif; ?>
            </td>
        </tr>

        <tr>
            <?php if($randevu->acil_durumu == 0): ?>
                <th>Randevu Oluşturulma Tarihi</th>
                <td><?= esc($randevu->created_at) ?></td>
            <?php else: ?>

                <th>Acil Görüşme İsteği Oluşturma Tarihi</th>
                <td><?= esc($randevu->created_at) ?></td>

            <?php endif; ?>
        </tr>

        <tr>
              <th><button class="btn btn-secondary" data-toggle="modal" data-target="#ileriTarihModal">Görüşmeyi İleri Bir Tarihe Ata</button></th>
        </tr>

    </table>

    <!-- Geri Dön ve Sil Butonları -->
    <div class="mb-3">
        <a href="<?= ($randevu->acil_durumu == 1) ? site_url('admin/randevular/emergency-list') : site_url('admin/randevular') ?>" class="btn btn-secondary">Geri Dön</a>

        <form action="<?= ($randevu->acil_durumu == 1) ? site_url(route_to('panel.emergency.delete', $randevu->id)) : site_url(route_to('panel.randevu.delete', $randevu->id)) ?>" method="post" id="deleteForm" class="d-inline">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger" onclick="confirmDelete()">Sil</button>
       </form>

 

    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="ileriTarihModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Görüşmeyi İleri Bir Tarihe Ata</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="ileriTarihForm">
          <div class="form-group">
            <label for="tarih">Tarih</label>
            <input type="date" class="form-control" id="tarih" name="tarih">
          </div>
          <div class="form-group">
            <label for="saat">Saat</label>
            <input type="time" class="form-control" id="saat" name="saat">
          </div>
          <div class="form-group">
            <label for="mesaj">Mesaj</label>
            <textarea class="form-control" id="mesaj" name="mesaj" rows="3"></textarea>
          </div>
          <button type="button" class="btn btn-primary" id="btnGonder" onclick="gonder()">Gönder</button>
        </form>
      </div>
    </div>
  </div>
</div>



<script>
    document.getElementById('openModalButton').addEventListener('click', function() {
        // Modalı göstermek için modalı açan elementin ID'sini kullanarak modalı al
        var modal = document.getElementById('myModal');

        // Modalı aç
        modal.style.display = 'block';
    });
</script>



<script>
function gonder() {
    var tarih = document.getElementById('tarih').value;
    var saat = document.getElementById('saat').value;
    var mesaj = document.getElementById('mesaj').value;
    var randevuId = <?= $randevu->id ?>; // Bu değeri PHP'den alacağınız şekilde güncelleyin

    $.ajax({
        url: "<?= base_url('admin/randevular/randevu-update/') ?>" + randevuId,
        method: 'POST',
        data: {
            tarih: tarih,
            saat: saat,
            mesaj: mesaj
        },
        success: function(response) {
            console.log(response);
            // AJAX isteği başarılı olduğunda yapılacak işlemler
            $('#exampleModal').modal('hide'); // Modalı kapat
            alertify.set('notifier', 'position', 'top-right');
            alertify.success('İşlem başarıyla gerçekleştirildi.');

            // Sayfa yenileme işlemini kontrol etmek için PHP'den dönen sonucu değerlendirme
            if (response.success) {
                setTimeout(function() {
                    location.reload(); // Sayfayı yenile
                }, 2000);
            } else {
                // İşlem başarısız olduğunda bir şeyler yapabilirsiniz
            }
        },
        error: function(xhr, status, error) {
            console.error(error);
            // AJAX isteğinde hata oluştuğunda yapılacak işlemler
        }
    });
}

</script>









<!-- JavaScript Kodları -->
<script>
    function confirmDelete() {
        if (confirm('Bu randevuyu silmek istediğinizden emin misiniz?')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>



