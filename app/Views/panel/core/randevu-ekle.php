
    <div class="container mt-5">
        <h2>Randevu Formu - Hasta Kayıt Ekle</h2>
        <form action="<?= base_url(route_to('panel.randevu.randevu_store')) ?>"  method="post"  >
            <div class="form-group">
                <label for="adSoyad">Ad-Soyad</label>
                <input type="text" class="form-control" id="adSoyad" name="adSoyad"  placeholder="Ad-Soyad" required>
            </div>
            <div class="form-group">
                <label for="durum">Durumu</label>
                <select class="form-control" id="durum" name="durum" required >   
                    <option value="Hasta">Hasta</option>
                    <option value="Hasta Yakını">Hasta Yakını</option>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="ulke">Ülke</label>
                    <select class="form-control" id="countries" name="ulke" required>
                        <!-- Ülkelerin seçenekleri buraya gelecek -->
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="sehir">Şehir</label>
                    <select class="form-control" id="cities" name="sehir" required>
                        <!-- Şehirlerin seçenekleri buraya gelecek -->
                    </select>
                </div>
            </div>
            <input type="hidden" id="isoCode" name="isoCode"> <!-- isocode -->
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Telefon" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="bolumler">Bölüm</label>
                <select class="form-control" id="bolum" name="bolum" required>
                  <?= view('includes/bolumler') ?>
                </select>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="randevuTarih">Randevu Tarihi</label>
                    <input type="date" class="form-control" id="randevuTarih" name="randevuTarih" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="randevuSaat">Randevu Saati</label>
                    <input type="time" class="form-control" id="randevuSaat" name="randevuSaat" required>
                </div>
            </div>
            <div class="form-group">
              <label for="not">Görüşme Hakkında Notlarınız</label>
               <textarea class="form-control" id="not" name="not" rows="4" placeholder="Hasta hakkında notunuzu buraya yazınız (isteğe bağlı)"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gönder</button>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        // Ülkelerin JSON dosyasını yükleme
        $.getJSON('<?= base_url("json/countries.json") ?>', function(data) {
            var options = '<option value="">Ülke Seçiniz</option>';
            $.each(data, function(key, value) {
                options += '<option value="' + value.name + '" data-iso="' + value.iso2 + '">' + value.name + '</option>';
            });
            $('#countries').html(options);
        });

        // Ülke seçildiğinde şehirleri getirme
        $('#countries').change(function() {
            var countryName = $(this).val();
            var countryISO = $(this).find(':selected').data('iso');

            // ISO kodunu gizli input alanına atama
            $('#isoCode').val(countryISO);

            $('#cities').empty();
            if (countryName !== '') {
                $.getJSON('<?= base_url("json/cities.json") ?>', function(data) {
                    var options = '<option value="">Şehir Seçiniz</option>';
                    $.each(data, function(key, value) {
                        if (value.country_name === countryName) {
                            options += '<option value="' + value.name + '">' + value.name + '</option>';
                        }
                    });
                    $('#cities').html(options);
                });
            } else {
                $('#cities').html('<option value="">Şehir Seçiniz</option>');
            }
        });
    });
</script>



