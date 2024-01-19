<?php
/*
		 Bu Class Tüm dosya Yükleme silme kontrollerini yapan class dır

*/

namespace App\Controllers\Panel\Core;

use App\Controllers\BaseControllerPanel;

class Uploads extends BaseControllerPanel
{

	public function __construct()
	{
		//$this->files = $this->request->getFiles();
	}

	public function upload()
	{
      
        	// Eğer Dropzone dosya yüklemesi varsa burası çalışacak

				// Eğer Dropzone dosya yüklemesi varsa burası çalışacak
				if($file = $this->request->getFile('file'))
				{
				//	$image_uploads	= model('Panel/Uploads');
				//	$upload_ = $image_uploads->upload($file);
				//	return $upload_; 
				return json_encode(array(
					"status" => 1,
					"file" =>"file",
					"filename" =>"name1"
				));
				}
				return json_encode(array(
					"status" => 1,
					"file" =>"file",
					"filename" =>"name2"
				));

         
     
	}
}
