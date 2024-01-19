<?php

$d_json = json_decode($data->content_data);
$banner_image = files__($d_json, 'banner_image', $language_id)[0][0] ?? '';
$image = files__($d_json, 'image', $language_id)[0][0] ?? '';
?>
<div class="hero-wrap hero-wrap-2" style="background-image: url(<?= base_url('uploads/').$banner_image?>);"
     data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container-fluid">
        <div class="row no-gutters d-flex slider-text align-items-center justify-content-center"
             data-scrollax-parent="true">
            <div class="col-md-6 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                            class="mr-2"><a href="<?= base_url(); ?>">Anasayfa</a></span> <span>Hakkımızda</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hakkımızda</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-counter" id="section-counter"
         data-stellar-background-ratio="0.5">
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row d-md-flex">
            <div class="col-md-6 ftco-animate img about-image"
                 style="background-image: url(<?= base_url('uploads/').$image?>);">
            </div>
            <div class="col-md-6 ftco-animate p-md-5">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap mb-5">
                        <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill"
                               href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo"
                               aria-selected="true">Biz Kimiz?</a>

                            <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission"
                               role="tab" aria-controls="v-pills-mission" aria-selected="false">Misyon</a>

                            <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-vizyon"
                               role="tab" aria-controls="v-pills-vizyon" aria-selected="false">Vizyon</a>

                            <a class="nav-link mt-2" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab"
                               aria-controls="v-pills-goal" aria-selected="false">Amaçlarımız</a>
                        </div>
                    </div>
                    <div class="col-md-12 d-flex align-items-center">

                        <div class="tab-content ftco-animate" id="v-pills-tabContent">

                            <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel"
                                 aria-labelledby="v-pills-whatwedo-tab">
                                <div>
                                    <h2 class="mb-4">Biz Kimiz?</h2>
                                    <p>
                                        Havza Yerel Eylem Grubu Derneğimiz 31.07.2019 tarihinde Samsun Valiliği İl Sivil Toplumla İlişkiler Müdürlüğü tarafından onaylanarak kurulumunu gerçekleştirmiştir.
                                        Genel Kurul, Yönetim Kurulu ve Denetleme Kurulu gibi 3 yönetim organına sahiptir. Yönetim kurulu yapı olarak Kamu, Sivil Toplum Kuruluşları, Özel Sektör temsilcileri, en az bir kadın üye ve en az bir 25 yaş altı üyeden oluşmaktadır.
                                        Derneğimizin toplam 33 üyesi vardır.
                                    </p>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-mission" role="tabpanel"
                                 aria-labelledby="v-pills-mission-tab">
                                <div>
                                    <h2 class="mb-4">Misyon</h2>
                                    <p>
                                        Havza Yerel Eylem Grubu Derneği, temsil ettiği kırsal bölgenin tabandan-tavana yaklaşımla kalkınmasını sağlamak, bölgenin kalkınma sorunlarını, önceliklerini ve çözümüne yönelik proje alanlarını belirlemek, bölgedeki sorunların tanımında, çözüme yönelik proje ve programların geliştirilmesinde, planlama, uygulama ve değerlendirme süreçlerinde tüm tarafların aktif katılımını sağlayarak, demokrasinin tabanda gelişmesine katkıda bulunmayı misyon edinmiştir.
                                    </p>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-vizyon" role="tabpanel"
                                 aria-labelledby="v-pills-vizyon-tab">
                                <div>
                                    <h2 class="mb-4">Vizyon</h2>
                                    <p>
                                        Havza Yerel Eylem Grubu Derneği, ilçede faaliyet gösteren kamu kurumları, sivil toplum kuruluşları ve özel sektör ile birlikte çalışarak yerel kalkınma stratejisi oluşturmak ve yürütmek amacıyla çaba harcayan bir öncü kuruluş olarak görülmeyi ve bölgedeki sosyo-ekonomik yönden kalkınmayı, tarıma dayalı faaliyetlerin sürdürülebilirliğini, doğal ve kültürel zenginliklerin ön plana çıkartılmasını, yöresel faaliyetlerin geliştirilmesini destekleyen bir vizyonu benimsemektedir.
                                    </p>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="v-pills-goal" role="tabpanel"
                                 aria-labelledby="v-pills-goal-tab">
                                <div>
                                    <h2 class="mb-4">Amaçlarımız</h2>
                                    <ol>
                                        <li>Temsil ettiği kırsal bölgenin tabandan-tavana yaklaşımla kalkınmasını sağlamak.</li>
                                        <li>Bölgenin kalkınma sorunlarını, önceliklerini ve sorunların çözümüne yönelik proje alanlarını belirlemek.</li>
                                        <li>Bölgenin kırsal yerleşimlerindeki sorunların tanımında, çözüme yönelik proje ve programların geliştirilmesinde, planlama, uygulama ve değerlendirme süreçlerinde tüm tarafların aktif katılımını sağlayarak, demokrasinin tabanda gelişmesine katkıda bulunmak.</li>
                                    </ol>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-3">Yönetim Kurulu</h2>
                <span class="subheading">Yönetim Kurulu Başkanı &amp; Üyelerimiz</span>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_1.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Sebahattin Özdemir</a></h3>
                        <span class="position">Yönetim Kurulu Başkanı</span>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_2.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Kadir Kayan</a></h3>
                        <span class="position">Başkan Yardımcısı</span>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_3.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Sema Kurt Köse</a></h3>
                        <span class="position">Sayman</span>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_4.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Coşkun Genç</a></h3>
                        <span class="position">Genel Sekreter</span>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_4.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Yakup Akekin</a></h3>
                        <span class="position">Asil Üye</span>

                    </div>
                </div>
            </div>


            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_4.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Alime Kaya</a></h3>
                        <span class="position">Asil Üye</span>

                    </div>
                </div>
            </div>


            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_4.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Enes Yılmaz</a></h3>
                        <span class="position">Asil Üye</span>

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <h2 class="mb-3">Denetim Kurulu</h2>
                <span class="subheading">Denetim Kurulu Başkanı &amp; Üyelerimiz</span>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_1.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Cafer Uzun</a></h3>
                        <span class="position">Denetim Kurulu Başkanı</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_2.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Abdullah Gürkanlı</a></h3>
                        <span class="position">Denetim Kurulu Asil Üye</span>

                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
                <div class="staff">
                    <div class="img mb-4"
                         style="background-image: url(<?= base_url('assetssite/') ?>images/person_3.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Ömer Büyük</a></h3>
                        <span class="position">Denetim Kurulu Asil Üye</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




