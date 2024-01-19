<?php

namespace App\Controllers\Panel\Core;

use App\Controllers\BaseControllerPanel;
use App\Models\Panel\Core\Designers;
use App\Models\Panel\Core\DesignerDataLanguages;
use App\Models\Panel\Core\Sidebar;
use App\Models\Panel\Core\Languages;
use App\Models\Panel\Core\Categories;
use App\Models\Panel\Core\Contents as ContentsModel;
use stdClass;

class Contents extends BaseControllerPanel
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

	public function index($categoryID)
	{
		$this->h_data(lang('PanelTXT.contTitle'));
		$categories                   	= new Categories();
		$languages						= new Languages();
		$currentLang					= $languages->where('default_admin', 1)->first();
		$data['subCategories']         	= $categories->where('parent_id', $categoryID)->orderBy('category_sort_order')->findAll();
		$data['addButton']            	= lang('PanelTXT.contAddTitle');
		$data['addButtonLink']        	= base_url() . "/panel/contents/new";
		$data["keys"]                	= array("name"); /// veri tabanındaki isimleri
		$data["keysName"]             	= array("İçerik İsmi");
		$data["width"]                 	= array("50");
		$data["id_name"]            	= "content_id";
		$data["categoryID"]            	= $categoryID;
		$data["currentCategory"]        = $categories->where('category_id', $categoryID)->first();
		$data["currentLang"]            = $currentLang;

		return view('panel/core/head', $this->header_data)
			. view('panel/core/header')
			. view('panel/core/sidebar')
			. view('panel/core/contents_list', $data)
			. view('panel/core/footer');
	}



	public function new()
	{
		$this->h_data(lang('PanelTXT.contAddTitle'));
		$categories = new Categories();
		$languages = new Languages();
		$designers = new Designers();
		$data['currentCategory'] = $this->request->getVar('cat');
		$data['categories'] = $categories->orderBy('category_sort_order')->findAll();
		$data['languages'] = $languages->orderBy('language_sort_order')->findAll();
		$data['designers'] = $designers->orderBy('designer_sort_order')->findAll();
		$data['saveButton']            = lang('PanelTXT.kaydetLabel');
		return view('panel/core/head', $this->header_data)
			. view('panel/core/header')
			. view('panel/core/sidebar')
			. view('panel/core/contents_new', $data)
			. view('panel/core/footer');
	}

	public function create()
	{
		$postData = $this->request->getPost();

	

		return($this->postContent($postData));
	}

	public function edit($id)
	{
		$this->h_data(lang('PanelTXT.contEditTitle'));
		$categories = new Categories();
		$contents = new ContentsModel();
		$designers = new Designers();
		$languages = new Languages();
		$designersLang = new DesignerDataLanguages();
		$curCont = $contents->where('content_id', $id)->first();
		$childContent = $contents->where('content_parent_id', $id)->findAll();
		$combinedResults = new \stdClass();
		foreach ($curCont as $key => $value) {
			$combinedResults->$key = $value;
		}
		foreach ($childContent as $key => $value) {
			$combinedResults->$key = $value;
		}
		$data['allContents'] =  $combinedResults;
		$data['languages'] = $languages->orderBy('language_sort_order')->findAll();
		$data['designers'] = $designers->where('designer_id', $curCont->designer_id)->first();
		$data['designers_'] = $designers->orderBy('designer_sort_order')->findAll();
		$data['designersLanguage'] = $designersLang
			->where('designer_id', $curCont->designer_id)
			->where('language_id', $this->session->get('language'))->first();
		$data['currentContent'] = $curCont;
		$data['currentContentID'] = $id;
		$data['currentCategory'] = $curCont->category_id;
		$data['categories'] = $categories->orderBy('category_sort_order')->findAll();
		$data['saveButton'] = lang('PanelTXT.kaydetLabel');

  

		return view('panel/core/head', $this->header_data)
			. view('panel/core/header')
			. view('panel/core/sidebar')
			. view('panel/core/contents_edit', $data);
	}

	public function update($id = null)
	{
		$postData = $this->request->getPost();

		return($this->postContent($postData, $id));
	}

	public function postContent($postData, $content_id = 0)
	{
		$designer = new Designers();
		$categories = new Categories();
		$languages_ = new Languages();
		$contents = new ContentsModel();
		$goBackURL= base_url().'panel';

		$categoryID = $postData['category_id'];
		$catDesigner = $categories->where('category_id', $categoryID)->first();
		$designerID =0; 
		if (empty($catDesigner->designer_id)) {
			return false;
		}
		if(isset($postData['designer_id'])){
			$designers = $designer->find($postData['designer_id']);
			$designerID = $postData['designer_id'];
		}else{
			$designers = $designer->find($catDesigner->designer_id);
			$designerID = $catDesigner->designer_id;
		}
		$designData  = json_decode($designers->designer_data);
		

		$create = false;
		$languages = $languages_->orderBy('default_admin', 'DESC')->findAll();
		$dataReturn = array();
		foreach ($languages as $lang) {
			//echo "Dil ===> " . $lang->language_name . "<br />";
			$id = $lang->language_id;
			$contentData = array();
			$contentData["category_id"] = $categoryID;
			// Ana dil hangisi ise ana content o olacak, diğer dillerdeki contentler parent id olarak
			// oluşturulan bu anadile ait content id sini alacak ; 
			//$formData["content_parent_id"] = ;
			$contentData["designer_id"] = $designerID;
			$contentData["language_id"] = $id;
			$contentData["content_name"] = $postData["content_name_$id"];
			$contentData["content_sort_order"] = $postData["content_sort_order_$id"];
			$contentData["slug"] = $postData["slug_$id"];
			$formData = array();


			foreach ($designData as $group) {
				foreach ($group->forms as $form) {
					foreach ($postData as $key => $data) {

						/* 
						   Gelen data içerisinde lang için eklenen _1 kısmını temizleyip hangi dile
						   aitse içeriği o şekilde yeniden düzenleyip veritabanına eklemeye
						   hazır hale getiriyoruz. Örn baslik_1 = Türkçe Başlık, baslik_2 = İngilizce Başlık gibi.
						*/

						//Resim veya Dosya eklimi kontrol ediyoruz. 
						// file src input name params :  activeArea(DB_input_name + _ + language_id) + i 
						// file row input name params :  activeArea(DB_input_name + _ + language_id) + i + _ + row 

						if ($form->formElementType == "File") {
							$extFile = $this->extractFile($key);
							// extForm [0] lang_id , [1] key, [2] row
							if (isset($extFile[2])) {
								if ($form->formElementName == $extFile[1]) {
									if ($extFile[0] == $id) {
										// _row = (File Sort Number);
										$formData[$key] = array($data, $postData[$key . "_row"]);
									}
								}
							}
						} //File Element Extract end

						$extForm = $this->extractForm($key);
						// extForm [0] lang_id , [1] key
						if (isset($extForm[1])) {
							if ($form->formElementName == $extForm[1]) {
								if ($extForm[0] == $id) {
									//echo 'Anahtar : ' . $key . '   =====> data : ' . $data . "<br />";
									$formData[$key] = $data;
								}
							}
						}
					} //end postData foreach
				} //end group form foreach
			} //end designdata group foreach
			//var_dump($formData);
			//array_push($dataReturn, $formData);
			$json_data = json_encode($formData);
			$contentData["content_data"] = $json_data;
			
			$formData = array();
			// if Update -------------------------------
			if ($content_id > 0) {
				$contentData['content_parent_id'] = $content_id;
				$contentReturn = array($contentData);
				//if content_id = content_id else null 
				$contentIsThere = $contents
					->where('language_id', $lang->language_id)
					->where('content_id', $content_id)->first();

				if ($contentIsThere != null) {
					// update main content; 
					$contentData['content_id'] = $content_id;
					if($contents->save($contentData))
					{

					}else{
						$contentReturn[1]= 'Current Content Update Problem';
						return $contentReturn;
					}
				}
				//if content_parent_id = content_id else null
				$parentContentIsThere = $contents
					->where('language_id', $lang->language_id)
					->where('content_parent_id', $content_id)
					->where('content_id !=', $content_id)
					->first();

				if ($parentContentIsThere == null) {
					//create children contents
					if( $contents->save($contentData))
					{

					}else{
						$contentReturn[1]= 'Child Create Save Problem';
						return $contentReturn;
						
					}
				} else {
					//update children contents
					$contentData['content_id'] = $parentContentIsThere->content_id;
					if($contents->save($contentData))
					{

					}else{
						$contentReturn[1]= 'Child Update Problem';
						return $contentReturn;
						
					}
				}
				$goBackURL = base_url().'panel/contents/'.$categoryID;
			} else {
				// if Create  -------------------------------
				$contentCreate = $contents->save($contentData);
				$contentID = $contents->insertID();
				$content_id = $contentID; // in the next cycle child content will be created!!
				$goBackURL = base_url().'panel/contents/'.$categoryID;

			}
			// Veritabanına yazdır her dile göre bir content atacaksın!

		} //end language foreach

		//return $dataReturn;
		return redirect()->to($goBackURL)
					->with('mesaj', 'Saving the changes was successful.')
					->with('renk', 'success');
	}



	public function delete($id = null)
	{
		$contents = new ContentsModel();
		$childContents = $contents->where('content_parent_id', $id)->findAll();
		//delete childs 
		foreach ($childContents as $cont) {
			if (!$contents->delete($cont->content_id)) {
				return redirect()->back()
					->with('mesaj', 'Content delete error')
					->with('renk', 'error');
			}
		}
		$deleteControl = $contents->find($id);
		if ($deleteControl) {
			if (!$contents->delete($id)) {
				return redirect()->back()
					->with('mesaj', 'Content delete error')
					->with('renk', 'error');
			}
		}
		return redirect()->back()
			->with('mesaj', 'Content Delete Successfuly')
			->with('renk', 'success');
	}

	private function extractForm($key)
	{
		$lastUnderscorePos = strrpos($key, '_');
		if ($lastUnderscorePos !== false) {
			$l_id = substr($key, $lastUnderscorePos + 1);
			$newKey = substr($key, 0, $lastUnderscorePos);
			return array($l_id, $newKey);
		}
	}
	private function extractFile($key)
	{
		// Son "_" karakterin pozisyonunu bulma
		$lastUnderscorePos = strrpos($key, "_");

		// Eğer "_" karakteri yoksa veya sondan ikinci "_" karakterin pozisyonu
		// 2. "_" karakterin pozisyonundan büyükse, geçersiz formatta bir giriş vardır.
		if ($lastUnderscorePos === false || $lastUnderscorePos >= strlen($key) - 2) {
			return false;
		}

		// Son iki "_" karakterin başlangıç pozisyonunu bulma
		$secondLastUnderscorePos = strrpos($key, "_", $lastUnderscorePos - strlen($key) - 1);

		// Son iki "_" karakter arasındaki bölümü alıyoruz
		$numPart = substr($key, $secondLastUnderscorePos + 1, $lastUnderscorePos - $secondLastUnderscorePos - 1);

		// Eğer bu bölüm sayı ise, diğer değerleri elde ederek döndürüyoruz
		if (ctype_digit($numPart)) {
			$newKey = substr($key, 0, $secondLastUnderscorePos);
			$l_id = $numPart;
			$row = substr($key, $lastUnderscorePos + 1);
			return array($l_id, $newKey, $row);
		}

		// Eğer son iki "_" karakter arasında sayı yoksa false döndürüyoruz
		return false;
	}
}
