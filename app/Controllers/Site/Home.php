<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Models\Panel\Core\Contents;
use App\Models\Panel\Core\Designers;
use App\Models\Panel\Core\Languages;
use App\Models\Panel\Core\Categories;
use Config\Services;

class Home extends BaseController
{
    public function index()
    {
        $contents = new Contents();
        $designers = new Designers();
        $languages = new Languages();
        $categories = new Categories();


        $languageCode = $this->request->uri->getSegment(1);

        if ($languageCode == '') {
            $defaultLanguage = $languages->where('default_front', 1)->first();

            $dil = $defaultLanguage->language_id;

        } else {
            $languageData = $languages->where('language_code', $languageCode)->first();
            $dil = $languageData->language_id;
        }

        $homeRoot = $contents
            ->where('slug', 'home')
            ->where('language_id', $dil)
            ->first();



        $faaliyetler = $contents->where('designer_id', '87')
        ->orderBy('content_sort_order', 'ASC')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get()->getResult();
          

   


        $jsonData = json_decode($homeRoot->content_data);
        $title = 'seoTitle_' . $dil;
        $description = 'seoDescription_' . $dil;


        $data['language_id'] = $dil;
        $data['language_code'] = $languageCode;
        $data['home_data'] = $homeRoot;
        $data['home_json_data'] = $jsonData;
        $data['faaliyetler'] = $faaliyetler;
        $data['title'] = $jsonData->{$title} ??= 'Havza Yeg';
        $data['description'] = $jsonData->{$description} ??= 'Havza Yeg';


        if($languageCode !="")
        {
            service('request')->setLocale($languageCode);
        }
        session_destroy();

        echo view('site/layouts/head', $data);
        echo view('site/layouts/header', $data);
        echo view('site/home');
        echo view('site/layouts/footer');

    }

    public function pages($segment)
    {

        $contents = new Contents();
        $designers = new Designers();
        $languages = new Languages();
        $categories = new Categories();

        $languageCode = $this->request->uri->getSegment(2); //en veya tr gibi dil kodunu alır

    
        if ($languageCode == '') {
            $defaultLanguage = $languages->where('default_front', 1)->first();
            $dil = $defaultLanguage->language_id;

        } else {
            $languageData = $languages->where('language_code', $languageCode)->first();
            $dil = $languageData->language_id;
        }


        $contentData = $contents->where('slug', $segment)->first();

        
        /**Anasayfa hastaneler kısmı*/
        /*$hastaneler  = $contents->where('designer_id',68)
                                ->where('language_id',$dil)
                                ->findAll();*/

        $designerData = $designers->find($contentData->designer_id);


        $view = $designerData->view_name;

        if($view == 'faaliyet-detay'){
            $recentPosts = $contents->where('designer_id', '87')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get()->getResult();
            $data['recentPosts'] = $recentPosts;

        }

        if($view == 'duyuru-detay'){
            $recentPosts = $contents->where('designer_id', '89')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get()->getResult();
            $data['recentPosts'] = $recentPosts;

        }


        $data['language_id'] = $dil;
        //$data['language_code'] = $languageCode;
        $data['data'] = $contentData;
        $data['model'] = $contents;
       
        
        $jsonData = json_decode($contentData->content_data);



        $title = 'seoTitle_' . $dil;
        $description = 'seoDescription_' . $dil;
        $data['title'] = $jsonData->{$title} ??= 'HavzaYeg';
        $data['description'] = $jsonData->{$description} ??= 'HavzaYeg';

        if($languageCode !="")
        {
            service('request')->setLocale($languageCode);
        }

        
        return   view('site/layouts/head', $data)
                .view('site/layouts/header')
                .view('site/' . $view)
                .view('site/layouts/footer');
        

    }

    public function iletisim_mail_gonder()
    {


        $email = \Config\Services::email();

        // Email ayarlarını yükle
        $email->initialize(config('Email'));

        // Formdan'dan gerekli bilgileri çek
        $name = $this->request->getPost('name');
        $mail = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $phone = $this->request->getPost('phone');
        $message = $this->request->getPost('message');

        // E-posta içeriği

            $message_send = "<h4>İletişim Sayfası</h4><br>";
            $message_send .= "Ad-Soyad: " . $name . "<br>";
            $message_send .= "Telefon:" . $phone . "<br>";
            $message_send .= "E-posta:" . $mail . "<br>";
            $message_send .= "Konu:" . $subject . "<br>";
            $message_send .= "Mesaj:" . $message . "<br>";


        // E-posta gönderimi
        $email->setFrom('info@havzayeg.com', 'Havza YEG');
        $email->setTo('info@havzayeg.com');
        $email->setSubject('havzayeg.com - İletişim Sayfası Form');
        $email->setMessage($message_send);

        if ($email->send()) {
            return redirect()->back()->with('email-success', lang('page.mail_onay_mesaj') );
        } else {
            return redirect()->back()->with('email-false', lang('page.mail_hata_mesaj') );
        }
    }



    



}
