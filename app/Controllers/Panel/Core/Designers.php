<?php

namespace App\Controllers\Panel\Core;

use App\Controllers\BaseControllerPanel;
use App\Models\Panel\Core\Designers as DesignersModel;
use App\Models\Panel\Core\DesignerDataLanguages;
use App\Models\Panel\Core\Sidebar;
use App\Models\Panel\Core\Languages;

class Designers extends BaseControllerPanel
{
    private $header_data;

    public function h_data($title = '')
    {
        $side                  = new Sidebar();
        $this->header_data = array(
            'frontLink'     => assetsPanel(),
            'name'          => $this->session->get("name"),
            'gelistirici'   => $this->gelistirici,
            'sidebarData'   => $side->generateSidebar(),
            'title'         => $title
        );
    }

    public function index()
    {
        $this->h_data(lang('PanelTXT.disTitle'));
        $design                     = new DesignersModel();
        $design_data                 = $design->orderBy('designer_sort_order')->findAll();
        $list['addButton']            = lang('PanelTXT.disAddTitle');
        $list['addButtonLink']         = base_url() . "/panel/designer/new";
        $list["keys"]                = array("name"); /// veri tabanındaki isimleri
        $list["keysName"]             = array("Dizayn İsmi");
        $list["width"]                 = array("50");
        $list["id_name"]            = "designer_id";
        $list["data"]                 = $design_data;
        return view('panel/core/head', $this->header_data)
            . view('panel/core/header')
            . view('panel/core/sidebar')
            . view('panel/core/designer_list', $list)
            . view('panel/core/footer');
    }



    public function new()
    {

        $this->h_data(lang('PanelTXT.disAddTitle'));
        $languages = new Languages();
        $data['languages'] = $languages->orderBy('language_sort_order')->findAll();
        $data['saveButton']            = lang('PanelTXT.kaydetLabel');
        return view('panel/core/head', $this->header_data)
            . view('panel/core/header')
            . view('panel/core/sidebar')
            . view('panel/core/designer_new', $data)
            . view('panel/core/footer');
    }

    public function create()
    {
        $designers = new DesignersModel();
        $designerDataLanguages = new DesignerDataLanguages();
        $languages = new Languages();
        $langDataSaveControl = true;
        $formData = $this->request->getPost();

        $form__designer = [
            'designer_name' => $formData['name'],
            'view_name' => $formData['view_name'],
            'designer_sort_order' => $formData['sortDesign'],
            'designer_data' => $formData['form_data']
        ];


        $designerSave  = $designers->save($form__designer);
        $designerID = $designers->insertID();
        //if(!$designerSave){ return false; }

        $languages = $languages->orderBy('language_sort_order')->findAll();
        foreach ($languages as $lang) {
            $form__designer_lang_data = [
                'designer_id' => $designerID,
                'language_id' => $lang->language_id,
                'language_data' => $formData['languageData_' . $lang->language_code]
            ];
            $languageSave = $designerDataLanguages->save($form__designer_lang_data);
            //if(!$languageSave){ return false; }
        }

        return redirect()->to('/panel/designer')
            ->with('mesaj', 'Designer Save Successfuly')
            ->with('renk', 'success');
    }

    public function edit($id = null)
    {
        $this->h_data(lang('PanelTXT.disGetTitle'));
        $designers = new DesignersModel();
        $designerDataLanguages = new DesignerDataLanguages();
        $languages = new Languages();

        $data['designer_id'] = $id;
        $data['designer'] = $designers->find($id);
        $data['langData'] = $designerDataLanguages->where('designer_id', $id)->findAll();
        $data['languages'] = $languages->orderBy('language_sort_order')->findAll();
        $data['saveButton'] = lang('PanelTXT.kaydetLabel');
        
        return view('panel/core/head', $this->header_data)
            . view('panel/core/header')
            . view('panel/core/sidebar')
            . view('panel/core/designer_edit', $data)
            . view('panel/core/footer');


    }

    public function update()
    {
        $designers = new DesignersModel();
        $designerDataLanguages = new DesignerDataLanguages();
        $languages = new Languages();
        $formData = $this->request->getPost();

        $form__designer = [
            'designer_id' => $formData['designer_id'],
            'designer_name' => $formData['name'],
            'view_name' => $formData['view_name'],
            'designer_sort_order' => $formData['sortDesign'],
            'designer_data' => $formData['form_data']
        ];


        $designerSave  = $designers->save($form__designer);
        $designerID = $formData['designer_id'];
        //if(!$designerSave){ return false; }

        $languages = $languages->orderBy('language_sort_order')->findAll();
        foreach ($languages as $lang) {
            $queryCheck = $formData['designer_data_languages_id_' . $lang->language_code];
            if($designerDataLanguages->find($queryCheck))
            {
                $form__designer_lang_data = [
                    'designer_data_languages_id' =>$queryCheck,
                    'designer_id' => $designerID,
                    'language_id' => $lang->language_id,
                    'language_data' => $formData['languageData_' . $lang->language_code]
                ];
            }else{
                $form__designer_lang_data = [
                    'designer_id' => $designerID,
                    'language_id' => $lang->language_id,
                    'language_data' => $formData['languageData_' . $lang->language_code]
                ];
            }
            
            
            $languageSave = $designerDataLanguages->save($form__designer_lang_data);
            //if(!$languageSave){ return false; }
            //var_dump($form__designer_lang_data);
        }

       
        return redirect()->to('/panel/designer')
            ->with('mesaj', 'Designer Save Successfuly')
            ->with('renk', 'success');
    }

    public function delete($id = null)
    {
        $designers = new DesignersModel();
        $designers->delete($id);
        return redirect()->to('/panel/designer')
            ->with('mesaj', 'Designer Delete Successfuly')
            ->with('renk', 'success');
        
    }
}
