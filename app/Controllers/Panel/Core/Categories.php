<?php

namespace App\Controllers\Panel\Core;

use App\Controllers\BaseControllerPanel;
use App\Models\Panel\Core\Designers;
use App\Models\Panel\Core\DesignerDataLanguages;
use App\Models\Panel\Core\Sidebar;
use App\Models\Panel\Core\Languages;
use App\Models\Panel\Core\Contents;
use App\Models\Panel\Core\Categories as CategoriesModel;

class Categories extends BaseControllerPanel
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
        $this->h_data(lang('PanelTXT.catTitle'));
        $categories                     = new CategoriesModel();
        $categories_data                 = $categories->orderBy('category_sort_order')->findAll();
        $list['addButton']            = lang('PanelTXT.catAddTitle');
        $list['addButtonLink']         = base_url() . "/panel/categories/new";
        $list["keys"]                = array("name"); /// veri tabanındaki isimleri
        $list["keysName"]             = array("Kategori İsmi");
        $list["width"]                 = array("50");
        $list["id_name"]            = "category_id";
        $list["data"]                 = $categories_data;
        return view('panel/core/head', $this->header_data)
            . view('panel/core/header')
            . view('panel/core/sidebar')
            . view('panel/core/category_list', $list)
            . view('panel/core/footer');
    }


    public function new()
    {
        $this->h_data(lang('PanelTXT.catAddTitle'));
        //$languages = new Languages();
        $designers = new Designers();
        $categories = new CategoriesModel();
        $data['designers'] = $designers->orderBy('designer_sort_order')->findAll();
        $data['categories'] = $categories->orderBy('category_sort_order')->findAll();
        //$data['languages'] = $languages->orderBy('language_sort_order')->findAll();
        $data['saveButton']            = lang('PanelTXT.kaydetLabel');
        return view('panel/core/head', $this->header_data)
            . view('panel/core/header')
            . view('panel/core/sidebar')
            . view('panel/core/category_new', $data)
            . view('panel/core/footer');
    }

    public function create()
    {
        $categories = new CategoriesModel();
        $contents = new Contents();
        $formData = $this->request->getPost();
        //$languages = new Languages();

        $form__categories = [
            'parent_id' => $formData['parent_id'],
            'designer_id' => $formData['designer_id'],
            'category_name' => $formData['name'],
            'category_sort_order' => $formData['sortCategory'],
            'in_header_menu' => isset($formData['in_header_menu']) ? 1 : 0,
            'in_footer_menu' => isset($formData['in_footer_menu']) ? 1 : 0,
            'in_panel_menu' => isset($formData['in_panel_menu']) ? 1 : 0,
            'icon' => $formData['icon'],
            'status' => isset($formData['status']) ? 1 : 0
        ];
        $categorySave  = $categories->save($form__categories);
        $categoryID = $categories->insertID();
        //TODO: When language change here be problem.. You have to create content all language.
        $contentData = [
            'category_id' => $categoryID,
            'language_id' =>  $this->session->get('language'),
            'designer_id' => $formData['designer_id'],
        ];
        $contentSave  = $contents->save($contentData);
        $contentID = $contents->insertID();
        $form__categories2 = [
            'category_id' => $categoryID,
            'content_id' => $contentID
        ];
        $categorySave2  = $categories->save($form__categories2);


        return redirect()->to('/panel/categories')
            ->with('mesaj', 'Category Save Successfuly')
            ->with('renk', 'success');
    }

    public function edit($id = null)
    {
        $this->h_data(lang('PanelTXT.catEditTitle'));
        //$languages = new Languages();
        $designers = new Designers();
        $categories = new CategoriesModel();
        $data['currentCategory'] = $categories->find($id);
        $data['designers'] = $designers->orderBy('designer_sort_order')->findAll();
        $data['categories'] = $categories->orderBy('category_sort_order')->findAll();
        //$data['languages'] = $languages->orderBy('language_sort_order')->findAll();
        $data['saveButton']            = lang('PanelTXT.kaydetLabel');
        return view('panel/core/head', $this->header_data)
            . view('panel/core/header')
            . view('panel/core/sidebar')
            . view('panel/core/category_edit', $data)
            . view('panel/core/footer');
    }

    public function update()
    {
        $categories = new CategoriesModel();
        $contents = new Contents();
        $formData = $this->request->getPost();
        $form__categories = [
            'category_id' => $formData['category_id'],
            'parent_id' => $formData['parent_id'],
            'designer_id' => $formData['designer_id'],
            'category_name' => $formData['name'],
            'category_sort_order' => $formData['sortCategory'],
            'in_header_menu' => isset($formData['in_header_menu']) ? 1 : 0,
            'in_footer_menu' => isset($formData['in_footer_menu']) ? 1 : 0,
            'in_panel_menu' => isset($formData['in_panel_menu']) ? 1 : 0,
            'icon' => $formData['icon'],
            'status' => isset($formData['status']) ? 1 : 0
        ];
        $categorySave  = $categories->save($form__categories);

        $content_id = $contents->where('category_id', $formData['category_id'])->first();
        $contentData = [
            'content_id' =>  $content_id->content_id,
            'designer_id' => $formData['designer_id'],
        ];
        $contentSave  = $contents->save($contentData);

        return redirect()->to('/panel/categories')
            ->with('mesaj', 'Category Save Successfuly')
            ->with('renk', 'success');
    }

    public function delete($id = null)
    {
        $categories = new CategoriesModel();
        if ($categories->delete($id)) {
            
          
            return redirect()->to('/panel/categories')
                ->with('mesaj', 'Category Delete Successfuly')
                ->with('renk', 'success');
        }
    }

    private function deleteContents($categoryID)
    {
        $contents = new Contents();
        $find = $contents->where('category_id', $categoryID)->findAll();
        foreach($find as $content)
        {
            //
        }
    }
}
