<?php

namespace App\Controllers\Panel\Core;

use App\Controllers\BaseControllerPanel;
use App\Models\Panel\Core\Folders;
use App\Models\Panel\Core\Uploads;



class FileManager extends BaseControllerPanel
{


    public function index()
    {
        $files  = new Uploads();
        $folder = new Folders();
        $folderData = $folder->where('parent_id', null)->findAll();
        $fileData = $files->where('folder_id', null)->findAll();
        return json_encode(array($folderData, $fileData));
    }

    public function show($folderId = null)
    {
        if ($folderId == 0) $folderId = null;
        $files  = new Uploads();
        $folder = new Folders();
        $parentId = $folder->where('folder_id', $folderId)->first();
        if (!empty($parentId)) {
            $parentId  = $parentId->parent_id;
        } else {
            $parentId = 0;
        }
        $folderData = $folder->where('parent_id', $folderId)->findAll();
        $fileData = $files->where('folder_id', $folderId)->findAll();
        return json_encode(array($folderData, $fileData, $parentId));
    }



    public function create()
    {
        $formData = $this->request->getPost();
        $files = $this->request->getFiles();
        $folderId = $formData["folderId"];
        if ($folderId == 0) $folderId = null;
        $ups = new Uploads();
        $result = array("result" => "File Save Successful!");


        // Dosyayı kaydet
        foreach ($files['files'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $originalName = $file->getName();
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);

                $fileName = url_title(pathinfo($originalName, PATHINFO_FILENAME), "-", true);
                if ($folderId != null)
                    $fileName .= "_" . $folderId . "_";

                $newFileName = $fileName . '.' . $extension;
                // TODO:Foreign Chars Problem Solve!!
                // $unwanted_array = array( 'Ğ'=>'G', 'İ'=>'I', 'Ş'=>'S', 'ğ'=>'g', 'ı'=>'i', 'ş'=>'s', 'ü'=>'u', 'ç'=> 'c', 'Ç'=>'C');
                // $newFileName = strtr( $newFileName, $unwanted_array );
                $file->move(ROOTPATH . 'uploads/', $newFileName, true);
                //array_push($log, array("dosya" => $newFileName));
                $fileData = array("upload_file" => $newFileName, "folder_id" => $folderId);
                $query = $ups->where($fileData)->first();
                if (!$query) {
                    $ups->save($fileData);
                }
            } else {
                //ERROR Message : File is not vailidated
                $result = array("result" => "A Problem Has Occurred!");
            }
        }
        return json_encode($result);
    }

    public function createFolder()
    {
        $folder = new Folders();
        $formData = $this->request->getPost();
        $result = array("result" => "A Problem Has Occurred!");

        $parentFolder = $formData["parent_folder"];
        if ($parentFolder == 0) $parentFolder = null;
        $dbData = array("folder_name" => $formData["folder_name"], "parent_id" => $parentFolder);
        $query = $folder->where($dbData)->first();
        if (!$query) {
            $folder->save($dbData);
            $result = array("result" => "Folder create successful!");
        }

        return json_encode($result);
    }


    public function delete($id = null)
    {
        $uploadsModel = new Uploads();
        $file = $uploadsModel->find($id);
        if (!$file) {
            return json_encode(array('result' => 0));
        }
        if ($uploadsModel->delete($id)) {
            $filePath = ROOTPATH . 'uploads/' . $file->upload_file;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            return json_encode(array('result' => 1));
        } else {
            return json_encode(array('result' => -1));
        }
    }

    public function deleteFolder($id)
    {
        $folderDB   = new Folders();
        $fileDB     = new Uploads();
        $folderControl = $folderDB->find($id);
        if(empty($folderControl))
            return json_encode(array('result' => -1));
        
        
        $childFolders = $folderDB->where("parent_id", $id)->findAll();
        foreach ($childFolders as $folder) {
            $files = $fileDB->where("folder_id", $folder->folder_id)->findAll();
            foreach ($files as $file) {
                $filePath = ROOTPATH . 'uploads/' . $file->upload_file;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
                $fileDB ->delete($file->upload_id);
            }
            $folderDB ->delete($folder->folder_id);
        }

        $files = $fileDB->where("folder_id", $id)->findAll();
        foreach ($files as $file) {
            $filePath = ROOTPATH . 'uploads/' . $file->upload_file;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $fileDB ->delete($file->upload_id);
        }
        $folderDB ->delete($id);
        return json_encode(array('result' => 1));
    }
}
