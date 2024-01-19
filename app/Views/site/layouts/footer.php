<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2>HAVZA YEG KALKINMA PROJESİ</h2>
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">HAVZA YEG</h2>
                    <p>Havza Yerel Eylem Grubu Derneğimiz 31.07.2019 tarihinde Samsun Valiliği İl Sivil Toplumla İlişkiler Müdürlüğü tarafından onaylanarak kurulumunu gerçekleştirmiştir. Genel Kurul, Yönetim Kurulu ve Denetleme Kurulu gibi 3 yönetim organına sahiptir.</p>
                </div>
                <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Hızlı Linkler</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?= base_url('hakkimizda') ?>" class="py-2 d-block">Hakkımızda</a></li>
                        <li><a href="<?= base_url('leader-yaklasimi') ?>" class="py-2 d-block">Leader Yaklaşımı</a></li>
                        <li><a href="<?= base_url('faaliyetler') ?>" class="py-2 d-block">Faaliyetler</a></li>
                        <li><a href="<?= base_url('duyurular') ?>" class="py-2 d-block">Duyurular</a></li>
                        <li><a href="<?= base_url('iletisim') ?>" class="py-2 d-block">İletişim</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Bilgilendirme</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Gizlilik Politikası</a></li>
                        <li><a href="#" class="py-2 d-block">Çerez Politikası</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">İletişim Bilgileri</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">25 Mayıs Mahallesi Şeh. J. Uzm. Çvş. Kaşif Arslan Sk. No : 39A Havza/Samsun</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">(+90) 543 375 73 26</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@havzayeg.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> Havza YEG tüm hakları saklıdır. | Bu Site <i class="icon-heart" aria-hidden="true"></i><a href="https://www.arnoma.com.tr" target="_blank">Arnoma Medya Tarafından Oluşturuldu</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<!-- Modal -->
<div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRequestLabel">Request a Quote</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#">
                    <div class="form-group">
                        <!-- <label for="appointment_name" class="text-black">Full Name</label> -->
                        <input type="text" class="form-control" id="appointment_name" placeholder="Full Name">
                    </div>
                    <div class="form-group">
                        <!-- <label for="appointment_email" class="text-black">Email</label> -->
                        <input type="text" class="form-control" id="appointment_email" placeholder="Email">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="appointment_date" class="text-black">Date</label> -->
                                <input type="text" class="form-control" id="appointment_date" placeholder="Date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="appointment_time" class="text-black">Time</label> -->
                                <input type="text" class="form-control" id="appointment_time" placeholder="Time">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- <label for="appointment_message" class="text-black">Message</label> -->
                        <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Get a Quote" class="btn btn-primary">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script src="<?= base_url('assetssite/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/popper.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/jquery.easing.1.3.js"></script>
<script src="<?= base_url('assetssite/') ?>js/jquery.waypoints.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/jquery.stellar.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/aos.js"></script>
<script src="<?= base_url('assetssite/') ?>js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/bootstrap-datepicker.js"></script>
<script src="<?= base_url('assetssite/') ?>js/jquery.timepicker.min.js"></script>
<script src="<?= base_url('assetssite/') ?>js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= base_url('assetssite/') ?>js/google-map.js"></script>
<script src="<?= base_url('assetssite/') ?>js/main.js"></script>

</body>
</html>