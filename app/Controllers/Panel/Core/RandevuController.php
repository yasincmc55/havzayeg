<?php

namespace App\Controllers\Panel\Core;

use App\Controllers\BaseControllerPanel;
use App\Models\Panel\Core\Designers;
use App\Models\Panel\Core\DesignerDataLanguages;
use App\Models\Panel\Core\Sidebar;
use CodeIgniter\I18n\Time;

use App\Models\Panel\Core\RandevuModel;
use stdClass;

class RandevuController extends BaseControllerPanel
{
    public function index()
    {
        $data["frontLink"] = assetsPanel();
        $data["name"] = $this->session->get("name");
        $data["title"] = lang("PanelTXT.dashboard");
        $data["gelistirici"] = $this->gelistirici;
        $side = new Sidebar();
        $sidebar["sidebarData"] = $side->generateSidebar();

        $randevu = new RandevuModel();
        $data['randevular'] = $randevu->findAll();

        echo view("panel/core/head", $data);
        echo view("panel/core/header");
        echo view("panel/core/sidebar", $sidebar);
        echo view("panel/core/randevular");
        echo view("panel/core/footer");
    }

    //hasta durumu bilgisi
    public function getHastaDurumu()
    {
        if ($this->request->getMethod() === "post") {
            $data = $this->request->getPost();

            if (isset($data["hasta_durumu"])) {
                // İlk sayfa verilerini sakla
                session()->set("hasta_durumu", $data["hasta_durumu"]);

                $language_code = $data["language_code"];

                session()->set("hasta_durumu_completed", true);

                $ipAddress = $this->request->getIPAddress();

                return redirect()->to("on-bilgi/" . $language_code); // Sonraki adıma yönlendir
            }
        }
    }




    //hasta durumu ve konumu
    public function getHastaAdiVeKonumu()
    {

        if ($this->request->getMethod() === "post") {
            $data = $this->request->getPost();

            if (isset($data["hasta_adi"], $data["hasta_konumu"])) {
                // İkinci sayfa verilerini sakla
                session()->set("hasta_adi", $data["hasta_adi"]);
                session()->set("hasta_konumu", $data["hasta_konumu"]);
                session()->set('isoCode' , $data['isoCode']);
                $language_code = $data["language_code"];

                session()->set("on_bilgi_completed", true);

                return redirect()->to("basvuru-formu/" . $language_code); // Sonraki adıma yönlendir
            }
        }
    }



    //basvuru formu bilgileri
    public function getDosyaAndOtherData()
    {
        if ($this->request->getMethod() === "post") {
            $data = $this->request->getPost();

            if (isset($data["telefon"], $data["eposta"], $data["bolum"], $data["mesaj"])) {


                $dosya = $this->request->getFile("dosya");

                // Dosya işlemleri...
                if ($dosya->isValid() && !$dosya->hasMoved()) {
                    // İzin verilen dosya türleri
                    $izinVerilenMIMETurleri = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'video/mp4', 'video/avi'];

                    // Dosya MIME türünü al
                    $dosyaMIME = $dosya->getMimeType();

                    // Dosya türünü kontrol et
                    if (in_array($dosyaMIME, $izinVerilenMIMETurleri)) {
                        // Dosya boyutunu kontrol et
                        $maxDosyaBoyutu = 300 * 1024 * 1024; // 300 MB'lık sınır
                        if ($dosya->getSize() <= $maxDosyaBoyutu) {
                            // dosya kontrol
                            $hedefDizin = WRITEPATH . "uploads/"; // Dosyanın yükleneceği dizin

                            $dosyaAdi = $dosya->getName(); // Dosya adını alır
                            $dosyaAdi = pathinfo($dosyaAdi, PATHINFO_FILENAME); // Dosya adını uzantısız alır
                            $dosyaAdi = $dosyaAdi . "-" . time() . "." . $dosya->getExtension(); // Dosya adına zaman damgası ve uzantıyı ekler

                            // Dosyayı hedef dizine taşı
                            $dosya->move($hedefDizin, $dosyaAdi);

                            // Dosya başarıyla yüklendi
                            echo "Dosya başarıyla yüklendi.";
                        } else {
                            // Dosya boyutu 300 MB'dan büyük
                            echo "Dosya boyutu 300 MB'dan büyük olamaz.";
                        }
                    } else {
                        // Geçersiz dosya türü
                        echo "Geçersiz dosya türü. Sadece resim ve video dosyaları yüklenebilir.";
                    }
                } else {
                    // Dosya geçerli değil veya taşınmamış
                    echo "Dosya geçerli değil veya taşınmamış.";
                }

                $language_code = $data["language_code"];

                // Diğer verileri session içine kaydet
                session()->set("telefon", $data["telefon"]);
                session()->set("eposta", $data["eposta"]);
                session()->set("bolum", $data["bolum"]);
                session()->set("mesaj", $data["mesaj"]);
                session()->set("basvuru_form_completed", true);

                // Dosya ismi
                if (empty($dosyaAdi)) {
                    session()->set("dosya_adi", "");
                } else {
                    session()->set("dosya_adi", $dosyaAdi);
                }


                return redirect()->to("takvim/" . $language_code); // Sonraki adıma yönlendir
            }
        }
    }


    public function getTarihVeSaat()
    {
        if ($this->request->getMethod() === "post") {
            $data = $this->request->getPost();

            if (isset($data["tarih"], $data["saat"])) {
                // Tarih ve saat verilerini birleştir, session'a kaydet ve veritabanına ekle
                $selectedDateTimeString = $data["tarih"] . ' ' . $data["saat"];
                $language_code = $data["language_code"];

                // Diğer işlemler devam eder...
                $formattedDate = date('Y-m-d', strtotime($selectedDateTimeString));
                $formattedTime = date('H:i', strtotime($selectedDateTimeString));

                session()->set("tarih", $formattedDate);
                session()->set("saat", $formattedTime);
                session()->set('takvim_completed', true);

                $randevuModel = new RandevuModel();

                $randevuData = [
                    'name' => session()->get("hasta_adi"),
                    'status' => session()->get("hasta_durumu"),
                    'location' => session()->get("hasta_konumu"),
                    'phone' => session()->get("telefon"),
                    'email' => session()->get("eposta"),
                    'department' => session()->get("bolum"),
                    'message' => session()->get("mesaj"),
                    'gorusme_durumu' => 0,
                    'acil_durumu' => 0,
                    'iso_code'=>session()->get('isoCode'),
                    'video_photo' => session()->get("dosya_adi"),
                    'tarih' => session()->get("tarih"),
                    'saat' => session()->get("saat"),

                ];

                $randevuModel->insert($randevuData);

                $this->randevu_mail_gonder(); // mail gonder

                // İlgili session değişkenlerini temizleme
                session()->remove("hasta_adi");
                session()->remove("hasta_durumu");
                session()->remove("hasta_konumu");
                session()->remove("isoCode");
                session()->remove("telefon");
                session()->remove("eposta");
                session()->remove("bolum");
                session()->remove("mesaj");
                session()->remove("dosya_adi");
                session()->remove("tarih");
                session()->remove("saat");
                session()->remove("hasta_durumu_completed");
                session()->remove('on_bilgi_completed');
                session()->remove('basvuru_form_completed');
                session()->remove('takvim_completed');

                return redirect()->to("home/" . $language_code)->with('status', lang('gb.blog_baslik') );


            }
        }
    }


    public function getAvailableHours($selectedDate)
    {
        try {
            // Seçilen tarihe ait daha önce alınmış randevu saatlerini getir
            $randevuModel = new RandevuModel();
            $existingAppointments = $randevuModel
                ->select('saat')
                ->where('tarih', $selectedDate)
                ->findAll();

            // Daha önce alınmış randevu saatlerini bir dizi içinde topla
            $takenAppointments = array_column($existingAppointments, 'saat');

            // Aynı saatte en fazla 3 randevu alınabiliyorsa, bu kontrolü yap
            $maxAppointmentsPerHour = 3;
            $availableHours = [];

            // Seçilen tarihe ait tüm saatleri getir
            $allAppointments = ["09:00:00", "09:30:00", "10:00:00", "10:30:00", "11:00:00", "11:30:00", "12:30:00", "13:00:00", "13:30:00","14:00:00","14:30:00","15:00:00","15:00:00","15:30:00","16:00:00","16:30:00","17:00:00","17:30:00","18:00:00","18:30:00"];

            foreach ($allAppointments as $hour) {
                $appointmentCount = array_count_values($takenAppointments)[$hour] ?? 0;
                if ($appointmentCount < $maxAppointmentsPerHour) {
                    // Aynı saatte 3 randevu alınmadıysa, bu saati kullanılabilir saatlere ekle
                    $availableHours[] = $hour;
                }
            }

            // JSON olarak geri döndür
            return $this->response->setJSON($availableHours);
        } catch (\Exception $e) {
            // Log the error or handle it as needed
            log_message('error', 'Error in getAvailableHours: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Internal Server Error']);
        }
    }


    public function show($randevu_id)
    {
        $randevu = new RandevuModel();
        $randevu_det = $randevu->find($randevu_id);
        $data['randevu'] = $randevu_det;

        $data["frontLink"] = assetsPanel();
        $data["name"] = $this->session->get("name");
        $data["title"] = lang("PanelTXT.dashboard");
        $data["gelistirici"] = $this->gelistirici;
        $side = new Sidebar();
        $sidebar["sidebarData"] = $side->generateSidebar();


        echo view("panel/core/head", $data);
        echo view("panel/core/header");
        echo view("panel/core/sidebar", $sidebar);
        echo view("panel/core/randevu-detay");
        echo view("panel/core/footer");
    }


    // RandevuController.php

    public function delete($randevu_id)
    {
        $randevuModel = new RandevuModel();
        $randevu = $randevuModel->find($randevu_id);

        $randevuModel->delete($randevu_id);

        return redirect()->to('admin/randevular')->with('success-delete', 'Randevu başarıyla silindi.');
    }


    public function onayla($randevu_id)
    {
        $randevuModel = new RandevuModel();

        $randevu = $randevuModel->find($randevu_id);

        if (!$randevu) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Randevu bulunamadı']);
        }

        $updatedStatus = ($randevu->gorusme_durumu == 0) ? 1 : 0;

        $randevuModel->update($randevu_id, ['gorusme_durumu' => $updatedStatus]);

        return $this->response->setJSON(['success' => true, 'gorusme_durumu' => $updatedStatus]);
    }


    public function emergency_delete($randevu_id)
    {
        $randevuModel = new RandevuModel();
        $randevu = $randevuModel->find($randevu_id);

        $randevuModel->delete($randevu_id);

        return redirect()->to('admin/randevular/emergency-list')->with('success', 'Randevu başarıyla silindi.');
    }


    public function emergency_add()
    {
        $randevuModel = new RandevuModel();
        session()->set("acil_durumu", 1); // Set a default value of 1 if not set
        $language_code = $this->request->getPost('language_code');

        $randevuData = [
            'name' => session()->get("hasta_adi"),
            'status' => session()->get("hasta_durumu"),
            'location' => session()->get("hasta_konumu"),
            'phone' => session()->get("telefon"),
            'email' => session()->get("eposta"),
            'department' => session()->get("bolum"),
            'message' => session()->get("mesaj"),
            'gorusme_durumu' => 0,
            'acil_durumu' => session()->get("acil_durumu"),
            'video_photo' => session()->get("dosya_adi"),
        ];


        $randevuModel->insert($randevuData);
        $this->randevu_mail_gonder();
        return redirect()->to("canli-destek/".$language_code);


    }


    public function emergency_list()
    {


        $data["frontLink"] = assetsPanel();
        $data["name"] = $this->session->get("name");
        $data["title"] = lang("PanelTXT.dashboard");
        $data["gelistirici"] = $this->gelistirici;
        $side = new Sidebar();
        $sidebar["sidebarData"] = $side->generateSidebar();

        $randevuModel = new RandevuModel();
        $acilDurumRandevular = $randevuModel->where('acil_durumu', 1)->findAll();
        $data['acilDurumRandevular'] = $acilDurumRandevular;


        echo view("panel/core/head", $data);
        echo view("panel/core/header");
        echo view("panel/core/sidebar", $sidebar);
        echo view("panel/core/acil-durum-liste");
        echo view("panel/core/footer");
    }


    public function randevu_add(){  //Panelden Müşteri Ekleme
        $data["frontLink"] = assetsPanel();
        $data["name"] = $this->session->get("name");
        $data["title"] = lang("PanelTXT.dashboard");
        $data["gelistirici"] = $this->gelistirici;
        $side = new Sidebar();
        $sidebar["sidebarData"] = $side->generateSidebar();

        $randevu = new RandevuModel();
    
        echo view("panel/core/head", $data);
        echo view("panel/core/header");
        echo view("panel/core/sidebar", $sidebar);
        echo view("panel/core/randevu-ekle");
        echo view("panel/core/footer");
    }

    public function randevu_store(){
        $rand = new RandevuModel();

        $country = $this->request->getVar('ulke');
        $city =    $this->request->getVar('sehir');
        $location = $city ."/".$country;  
        
        $data = [
            'name' => $this->request->getVar('adSoyad'),
            'status' => $this->request->getVar('durum'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'department' => $this->request->getVar('bolum'),
            'tarih' => $this->request->getVar('randevuTarih'),
            'saat' => $this->request->getVar('randevuSaat'),
            'message' => $this->request->getVar('not'),
            'location'=>$location,
            'iso_code'=>$this->request->getVar('isoCode'),
            'is_customer_from_panel' => 1,
        ];

    
        $inserted = $rand->insert($data);

        return redirect()->to('admin/randevular')->with('musteri-success', 'Hasta Kayıt Ekleme İşlemi Başarılı');
    
    }

    public function randevu_update($randevu_id) {
        
        $tarih = $this->request->getPost('tarih');
        $saat = $this->request->getPost('saat');
        $mesaj = $this->request->getPost('mesaj');
        
    

            $rand = new RandevuModel();
            $data = array(
                'tarih' => $tarih,
                'saat' => $saat,
                'ileri_aciklama' => $mesaj,
            );
            

            if ($rand->update($randevu_id, $data)) {
                return $this->response->setJSON(['success' => true]);
            } else {
                return $this->response->setJSON(['success' => false]);
            }
            
        
    }
    



    /** Mail gönderme işlemleri */

    /**
     * Randevu Mail gönderme işlemi
     */


    public function randevu_mail_gonder()
    {
        $email = \Config\Services::email();

        // Email ayarlarını yükle
        $email->initialize(config('Email'));

        // Session'dan gerekli bilgileri çek
        $randevuData = [
            'name' => session()->get("hasta_adi"),
            'status' => session()->get("hasta_durumu"),
            'location' => session()->get("hasta_konumu"),
            'phone' => session()->get("telefon"),
            'email' => session()->get("eposta"),
            'department' => session()->get("bolum"),
            'message' => session()->get("mesaj"),
            'video_photo' => session()->get("dosya_adi"),
            'date' => session()->get("tarih"),
            'hours' => session()->get("saat"),
            'acil_durumu' => session()->get("acil_durumu")
        ];

        // E-posta içeriği

        // E-posta içeriği
        if ($randevuData['acil_durumu'] == 1) {
            $message = "<h4 style='color:red'>Acil Görüşme Talebi</h4><br>";
            $message .= "Ad-Soyad: " . $randevuData['name'] . "<br>";
            $message .= "Durum: " . $randevuData['status'] . "<br>";
            $message .= "Yer:" . $randevuData['location'] . "<br>";
            $message .= "Telefon:" . $randevuData['phone'] . "<br>";
            $message .= "E-posta:" . $randevuData['email'] . "<br>";
            $message .= "Bölüm:" . $randevuData['department'] . "<br>";
            $message .= "Açıklama:" . $randevuData['message'] . "<br>";
        } else {
            $message = "<h4 style='color:blue' >Randevu Talebi</strong><h4>";
            $message .= "Ad-Soyad: " . $randevuData['name'] . "<br>";
            $message .= "Durum: " . $randevuData['status'] . "<br>";
            $message .= "Yer:" . $randevuData['location'] . "<br>";
            $message .= "Telefon:" . $randevuData['phone'] . "<br>";
            $message .= "E-posta:" . $randevuData['email'] . "<br>";
            $message .= "Bölüm:" . $randevuData['department'] . "<br>";
            $message .= "Randevu Tarihi:" . $randevuData['date'] . "<br>";
            $message .= "Randevu Saati:" . $randevuData['hours'] . "<br>";
            $message .= "Açıklama:" . $randevuData['message'] . "<br>";
        }

        $email->attach(site_url('writable/uploads/' . $randevuData['video_photo']));

        // E-posta gönderimi
        $email->setFrom('info@112life.com', '112 Life');
        $email->setTo('info@112life.com');
        $email->setSubject('112Life.com - Randevu/Acil Görüşme Bilgileri');
        $email->setMessage($message);

        if ($email->send()) {
            echo 'E-posta başarıyla gönderildi.';
        } else {
            echo 'E-posta gönderilirken bir hata oluştu.';
            echo $email->printDebugger(['headers']);
        }
    }

}
