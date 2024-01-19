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
                    <th>Detaylar</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php foreach ($acilDurumRandevular as $randevu): ?>
                    
                    <tr>
                        <td><?= esc($randevu->name) ?></td>
                        <td><?= esc($randevu->status) ?></td>
                        <td><?= esc($randevu->location) ?></td>
                        <td><?= esc($randevu->phone) ?></td>
                        <td><?= esc($randevu->email) ?></td>
                        <td><?= esc($randevu->department) ?></td>
                        <td><a class="btn btn-info" href="<?= base_url(route_to('panel.randevu.show', $randevu->id)) ?>">Detayları Gör</a></td>

                    </tr>
                <?php endforeach; ?> 
            </tbody>


        </table>









</div>