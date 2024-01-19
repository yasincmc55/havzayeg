<div class="container-fluid">
        <h2>Veri Listesi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Adı Soyadı</th>
                    <th>Durumu</th>
                    <th>Konum</th>
                    <th>Tel no</th>
                    <th>E-mail</th>
                    <th>Bölüm</th>
                    <th>Randevu Tarihi ve Saat</th>
                    <th>Detaylar</th>
                    <th>Görüşme Durumu</th>
                </tr>
            </thead>
            <style>
            .custom-bg-color {
                background-color: #5362d39c;

                }
            </style>
            <tbody>
                <?php foreach ($randevular as $randevu): ?>

                    <?php  $rowColorClass = ($randevu->is_customer_from_panel == 1) ? 'custom-bg-color' : ''; ?>
           
            
                    <?php if($randevu->acil_durumu == 1){continue;} ?>
                    <tr class="<?= $rowColorClass ?>">
                        <td><?= esc($randevu->name) ?></td>
                        <td><?= esc($randevu->status) ?></td>
                        <td><?= esc($randevu->location) ?></td>
                        <td><?= esc($randevu->phone) ?></td>
                        <td><?= esc($randevu->email) ?></td>
                        <td><?= esc($randevu->department) ?></td>
                        <td><?= esc($randevu->tarih . ' ' . $randevu->saat) ?></td>
                        <td><a class="btn btn-info" href="<?= base_url(route_to('panel.randevu.show', $randevu->id)) ?>">Detayları Gör</a></td>
                        <td>
                            <?php if ($randevu->gorusme_durumu == 0): ?>
                                <button id="onaylaBtn_<?= $randevu->id ?>" class="btn btn-success" data-gorusme-durumu="<?= $randevu->gorusme_durumu ?>" onclick="onayla(<?= $randevu->id ?>, this)">Görüşme Yapılacak</button>

                            <?php else: ?>
                                <button id="onaylaBtn_<?= $randevu->id ?>" class="btn btn-secondary" data-gorusme-durumu="<?= $randevu->gorusme_durumu ?>" onclick="onayla(<?= $randevu->id ?>, this)">Görüşme Yapıldı</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>


        </table>

    <script>
        function onayla(randevu_id, btn) {
            // Kullanıcıya onaylama işlemini teyit ettirelim
            var onay = confirm('Görüşme durumunu değiştirmek istiyor musunuz?');

            // Kullanıcı onay verirse
            if (onay) {
                // AJAX isteğini oluşturalım
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('admin/randevular/onayla')?>/' + randevu_id,
                    success: function (data) {
                        if (data.success) {
                            // AJAX isteği başarılı olduğunda, görüntüyü güncelle
                            // Butonun yazısını ve sınıfını gorusme_durumu değerine göre değiştirelim
                            if (data.gorusme_durumu == 1) {
                                // Görüşme yapıldı ise
                                $(btn).html('<span>Görüşme Yapıldı</span>');
                                $(btn).removeClass('btn-success').addClass('btn-secondary');

                            } else {
                                // Görüşme beklemede ise
                                $(btn).html('<span>Görüşme Yapılacak</span>');
                                $(btn).removeClass('btn-secondary').addClass('btn-success');
                                // Butonun tıklanabilirliğini aktif edelim
                                $(btn).prop('disabled', false);
                            }
                            // Butonun data attribute'ünü de güncelleyelim
                            $(btn).data('gorusme-durumu', data.gorusme_durumu);
                        } else {
                            // AJAX isteği başarısızsa, hata mesajını göster
                            alert('Hata: ' + data.message);
                        }
                    },
                    error: function () {
                        // AJAX isteği başarısızsa, genel hata mesajını göster
                        alert('Bir hata oluştu. Lütfen tekrar deneyin.');
                    }
                });
            }
        }
    </script>









</div>