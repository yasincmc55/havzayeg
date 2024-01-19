<div class="col">

    <div class="card card-primary col-12  p0">
        <div class="card-header">
            <h3 class="card-title"><?= $title; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" class="form" id="form" action="<?= base_url("panel/contents/update/$currentContentID") ?>" method="POST">
            <?= csrf_field() ?>

            <ul class="nav nav-tabs" id="custom-tabs-one-tab_main" role="tablist">
                <?php
                $active = '_';
                foreach ($languages as $lang) :
                    if ($active == '_') :
                        $active = 'active';
                    else :
                        $active = '';
                    endif;
                ?>

                    <li class="nav-item">
                        <a class="nav-link <?= $active ?>" id="custom-tabs-one-home-tab_main_<?= $lang->language_id; ?>" data-toggle="pill" href="#custom-tabs-one-home_main_<?= $lang->language_id; ?>" role="tab" aria-controls="custom-tabs-one-home_main_<?= $lang->language_id; ?>" aria-selected="true"><?= $lang->language_name; ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent_main">

                    <?php

                    $active = '_';
                    foreach ($languages as $lang) :
                        if ($active == '_') :
                            $active = 'active show';
                        else :
                            $active = '';
                        endif;

                        $currentContentData = $currentContent;
                        foreach ($allContents as $content_) :
                            if (isset($content_->language_id) && $content_->language_id  ==  $lang->language_id) :
                                $currentContentData = $content_;
                            endif;
                        endforeach;
                    ?>
                        <div class="tab-pane fade <?= $active ?>" id="custom-tabs-one-home_main_<?= $lang->language_id; ?>" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab_main_<?= $lang->language_id; ?>">

                            <div class="row">
                                <div class="form-group col-12 col-sm-3">
                                    <label for="d_name">İçerik Adı</label>
                                    <input type="text" value="<?= $currentContentData->content_name ?>" class="form-control" id="d_name" name="content_name_<?= $lang->language_id; ?>" placeholder="Lütfen İçerik İsmini Yazınız" required>

                                </div>

                                <div class="form-group col-12 col-sm-3">
                                    <label for="Sort">Sıralama</label>
                                    <input type="text" value="<?= $currentContentData->content_sort_order ?>" class="form-control" id="Sort" name="content_sort_order_<?= $lang->language_id; ?>" placeholder="İçerik Sırası">
                                </div>

                                <div class="form-group col-12 col-sm-3">
                                    <label for="Slug">SEO_URL</label>
                                    <input type="text" value="<?= $currentContentData->slug ?>" class="slug form-control" id="Sort" name="slug_<?= $lang->language_id; ?>" placeholder="Benzersiz URL Girin !">
                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>
                    <div class="row">
                        <div class="form-group col-12 col-sm-3">
                            <label for="Sort">Kategori</label>
                            <select name="category_id" class="form-control">

                                <?php foreach ($categories as $category) : ?>
                                    <option value="<?= $category->category_id; ?>" <?= ($currentCategory == $category->category_id) ? "selected" : "" ?>><?= $category->category_name; ?></option>
                                    <!-- <?php if ($currentContent->content_id != $category->content_id) : ?>
                                    <option value="<?= $category->category_id; ?>" <?= ($currentCategory == $category->category_id) ? "selected" : "" ?>><?= $category->category_name; ?></option>
                                <?php endif; ?> -->
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-12 col-sm-3">
                            <label for="Sort">İçerik Şablonu</label>
                            <select name="designer_id" class="form-control">

                                <?php foreach ($designers_ as $design) : ?>
                                    <option value="<?= $design->designer_id; ?>" <?= ($currentContentData->designer_id == $design->designer_id) ? "selected" : "" ?>><?= $design->designer_name; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                </div>

                <hr>
            </div>
            <!-- /.card-body -->

            <?php
            if (isset($designers->designer_data)) :

                $designData  = json_decode($designers->designer_data);
                $designerLanguageData = json_decode($designersLanguage->language_data, true);

                //We sorted groups here
                usort($designData, function ($a, $b) {
                    if ($a->groupOrder == '')
                        $a->groupOrder = 99;
                    if ($b->groupOrder == '')
                        $b->groupOrder  = 98;
                    return $a->groupOrder - $b->groupOrder;
                });

                foreach ($designData as $group) {
                    $groupID = $group->groupId;
                    //We will find group labels for default language. We are finding current group here
                    $filteredLanguageData = array_filter($designerLanguageData, function ($item) use ($groupID) {
                        return $item['groupId'] === $groupID;
                    });

                    $grouplabel =  reset($filteredLanguageData);
                    // --------------------------------------
                    // Group Cart create here ---------------
                    // --------------------------------------

                    //TODO: Dillere göre döngüye alıp verileri ekleyeceğiz
                    // her dile göre postu bir düğüme toplamak gerek. Bunu Nası ayıklayacağız?????
                  ?>
                    <div class="container">
                        <h4><?= $grouplabel["groupName"] ?></h4>
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">

                                <ul class="nav nav-tabs" id="custom-tabs-one-tab_<?= $groupID ?>" role="tablist">
                                    <?php
                                    $active = '_';
                                    foreach ($languages as $lang) :
                                        if ($active == '_') :
                                            $active = 'active';
                                        else :
                                            $active = '';
                                        endif;
                                    ?>

                                        <li class="nav-item">
                                            <a class="nav-link <?= $active ?>" id="custom-tabs-one-home-tab_<?= $groupID ?>_<?= $lang->language_id; ?>" data-toggle="pill" href="#custom-tabs-one-home_<?= $groupID ?>_<?= $lang->language_id; ?>" role="tab" aria-controls="custom-tabs-one-home_<?= $groupID ?>_<?= $lang->language_id; ?>" aria-selected="true"><?= $lang->language_name; ?></a>
                                        </li>
                                    <?php endforeach; ?>

                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent_<?= $groupID ?>">
                                    <?php
                                    $textarea = false;
                                    $active = '_';
                                    foreach ($languages as $lang) :
                                        if ($active == '_') :
                                            $active = 'active show';
                                        else :
                                            $active = '';
                                        endif;

                                        $currentContentData = $currentContent;
                                        foreach ($allContents as $content_) :
                                            if (isset($content_->language_id) && $content_->language_id  ==  $lang->language_id) :
                                                $currentContentData = json_decode($content_->content_data);
                                            endif;
                                        endforeach;

                                    ?>
                                        <div class="tab-pane fade <?= $active ?>" id="custom-tabs-one-home_<?= $groupID ?>_<?= $lang->language_id; ?>" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab_<?= $groupID ?>_<?= $lang->language_id; ?>">

                                            <?php
                                            //We sorted forms here
                                            usort($group->forms, function ($a, $b) {
                                                if ($a->formElementRow == '')
                                                    $a->formElementRow = 99;
                                                if ($b->formElementRow == '')
                                                    $b->formElementRow  = 98;
                                                return $a->formElementRow - $b->formElementRow;
                                            });

                                            //Start foreach create form;
                                            foreach ($group->forms as $form) {
                                                $formID = $form->formElementId;
                                                //We will find form labels for default language. We are finding current formData here
                                                $filteredFormsData = array_filter($grouplabel['forms'], function ($item) use ($formID) {
                                                    return $item['formElementId'] === $formID;
                                                });
                                                $formItem = (object) reset($filteredFormsData);
                                                // --------------------------------------
                                                // Forms create here --------------------
                                                // --------------------------------------

                                            ?>

                                                <?php
                                                $inp_elem_value = $form->formElementName . '_' . $lang->language_id;
                                                if (isset($currentContentData->$inp_elem_value)) :
                                                    $value_ = $currentContentData->$inp_elem_value;
                                                else :
                                                    $value_ = "";
                                                endif;
                                                //Create Input Text Here
                                                //value kısmı eğer content dile göre oluşmuş ise oradaki arraydan gelcek
                                                if ($form->formElementType == "Input") :
                                                ?>
                                                    <div class="form-group col-12 col-md-4">
                                                        <label for=""><?php if (isset($formItem->formElementLabel)) {
                                                                            echo $formItem->formElementLabel;
                                                                        } ?></label>
                                                        <input type="text" class="form-control" name="<?= $form->formElementName . '_' . $lang->language_id; ?>" value="<?= htmlspecialchars($value_); ?>">
                                                    </div>
                                                <?php endif; ?>

                                                <?php

                                                //Create Textarea Here
                                                if ($form->formElementType == "Text Area") :
                                                    if (!$textarea) {
                                                        $textarea = true;
                                                    } ?>
                                                    <label for="summernote"><?= $formItem->formElementLabel ?></label>
                                                    <textarea class="summernote" id="summernote" name="<?= $form->formElementName . '_' . $lang->language_id; ?>"><?= $value_; ?></textarea>
                                                    <script>

                                                    </script>
                                                <?php endif; ?>

                                                <?php
                                                //Select
                                                if ($form->formElementType == "Select") :
                                                ?>

                                               <script>
                                                    var data = <?=$form->formElementDefault?>;
                                                    $.each(data, function (index, value) {
                                                        $('#select_box_datas').append($('<option/>', { 
                                                            value: value,
                                                            text : value 
                                                        }));
                                                    });     
                                                </script>

                                                <div class="form-group col-12 col-md-4">
                                                    <label for=""><?= $formItem->formElementLabel ?></label>
                                                      <select class="form-control" name="<?= $form->formElementName . '_' . $lang->language_id; ?>" id="select_box_datas">
                                                          
                                                     </select>
                                                </div>

                                                <?php endif; ?>

                                                <?php if ($form->formElementType == "Multiple Select") : ?>
                                                 
                                            
                                                    <div class="form-group col-12 col-md-4">
                                                        <label for=""><?= $formItem->formElementLabel ?></label>
                                                        <select id="MultipleSelectBoxData" class="form-control" name="<?= $form->formElementName . '_' . $lang->language_id; ?>[]" multiple>
                                                            <?php
                                                            $relatedContent = new \App\Models\Panel\Core\Contents();
                                                            
                                                            $selectedValues =  $relatedContent
                                                                               ->where('content_id',$currentContentID)
                                                                               ->first();
                                                             
                                                            $veriler =  $selectedValues->content_data; 
                                                            print_r(json_decode($veriler));
                                                            die();                 


                                                            $contents = $relatedContent
                                                                    ->where('designer_id', $form->formElementRelatedVariable)
                                                                    ->where('language_id', $lang->language_id)
                                                                    ->findAll();
                               
                                                            foreach ($contents as $cont) {
                                                                echo '<option value="' . $cont->content_id . '">' . $cont->content_name . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                <?php endif; ?>

                                                <?php
                                                //Files images or videos
                                                if ($form->formElementType == "File") :
                                                    $rnd = $form->formElementName . '_' . $lang->language_id;

                                                ?>
                                                    <button class="modal-btn" onclick="uploadFileModal(event, '<?= $rnd ?>')"><i class="fas fa-file"></i>Dosya & Resim Ekle</button>

                                                    <div class="files_" id="files_<?= $rnd ?>">
                                                        <!-- add files here -->
                                                        <?php

                                                        $sirali_dizi = [];
                                                        foreach ($currentContentData as $key => $value) {
                                                            if (strpos($key, $rnd) !== false) {
                                                                $sirali_dizi[] = $value;
                                                            }
                                                        }

                                                        usort($sirali_dizi, function ($a, $b) {
                                                            return $a[1] <=> $b[1];
                                                        });

                                                        foreach ($sirali_dizi as $val) {
                                                            $f_name = $rnd . '_' . rand(1, 1000000);
                                                        ?>
                                                            <div class="file_" id="file_<?= $f_name; ?>">
                                                                <div class="fileImageContent">
                                                                    <img class="fileImage" src="<?= base_url() ?>uploads/<?= $val[0] ?>" alt="image">
                                                                </div>
                                                                <p class="file-name"><?= $val[0] ?></p>
                                                                <span class="file-manage">
                                                                    <input type="hidden" value="<?= $val[0] ?>" name="<?= $f_name; ?>">
                                                                    <input type="number" class="file-row" value="<?= $val[1] ?>" name="<?= $f_name; ?>_row" placeholder="sıra no">
                                                                    <button class="delete-file" onclick="deleteFile('file_<?= $f_name; ?>')"><img src="<?= $frontLink; ?>images/delete.png" alt="delete"></button>
                                                                </span>
                                                            </div>

                                                        <?php }

                                                        ?>

                                                    </div>
                                                <?php endif; ?>

                                            <?php } //endforeach form create here
                                            ?>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                        </div>
                    </div>
            <?php }
            endif;
            ?>

            <div class="card-footer">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i><?= $saveButton; ?></button>
            </div>
        </form>




        <div class="results__display"></div>

    </div>
</div>
</div>

<!-- Upload File Modal Here -----  -->
<div class="modal-container" id="modal">
    <div class="modal-content upload-modal">
        <span class="close" onclick="uploadFileModal(event)">&times;</span>
        <h2 class="modal-title">Dosya & Resim Yükleme</h2>
        <div class="set-icons">
            <span class="upload-icon"><img src="<?= $frontLink; ?>/images/upload.png" alt=""></span>
            <span class="new-folder-icon" onclick="showFolderTooltip()"><img src="<?= $frontLink; ?>images/new-folder.png" alt=""></span>
            <span class="delete-icon" onclick="removeFiles()"><img src="<?= $frontLink; ?>images/delete.png" alt=""></span>
        </div>
        <div class="file_content">
            <div class="folder">
                <img src="<?= $frontLink; ?>/images/folder.png" alt="folder">
                <p>Klasör İsmi</p>
            </div>
            <div class="file" onclick="selectFile(this)" data-value="file1">
                <img src="<?= $frontLink; ?>/images/file.png" alt="folder Docx">
                <div class="fileType">docx</div>
                <p>Dosya Adı Denemesi</p>
            </div>

            <div class="image_upload" onclick="selectFile(this)" data-value="Deneme_image_Vertical">
                <img src="<?= $frontLink; ?>/images/vertical_demo.jpg" alt="folder">
                <p>deneme_resmi_adresi_bilmem_ne.jpg</p>
            </div>

        </div>

        <div class="addInto">
            <button class="addIntoButton" onclick="addFiles()">Ekle</button>
        </div>


        <!-- Progress Bar -->
        <div class="progress-container" id="progressContainer">
            <div class="progress-bar" id="progressBar"></div>
        </div>
        <!-- Progress Bar End -->
    </div>
</div>
<div class="fileUploadContent" id="fileUploadContent"></div>
<!-- Upload File Modal End Here -----  -->
<!-- Folder Tooltip -->
<div class="tooltip-container" id="folderTooltip">
    <div class="tooltip-content">
        <input type="text" placeholder="Klasör İsmi" id="folderName">
        <button onclick="saveFolder()"><img src="<?= $frontLink; ?>/images/plus.png" alt=""></button>
    </div>
</div>
<!-- Folder Tooltip End -->

<script>
    var activeFolderId = 0;
    var selectedFiles = [];
    var addSelectedFiles = [];
    var activeArea = "";
    // ================================
    // Upload File SYSTEM Start Here
    // ================================
    function uploadFileModal(event, area = null) {
        // if there multiple file upload system
        if (area != null)
            activeArea = area;

        event.preventDefault();
        const modal = document.getElementById('modal');
        modal.classList.toggle('active');

    }
    // ---------------------------------------
    // FOLDER PROCESSES ----------------------
    // ---------------------------------------
    // Show Folder Tooltip Function
    let isFolderTooltipActive = false;

    function showFolderTooltip() {

        // Eğer tooltip açıksa kapat ve input alanını temizle
        if (isFolderTooltipActive) {
            hideFolderTooltip();
        } else {
            const folderTooltip = document.getElementById('folderTooltip');
            folderTooltip.classList.add('active');
            isFolderTooltipActive = true;
        }
    }

    // Hide Folder Tooltip Function
    function hideFolderTooltip() {
        const folderTooltip = document.getElementById('folderTooltip');
        folderTooltip.classList.remove('active');
        // Input alanındaki metni temizle
        const folderNameInput = document.getElementById('folderName');
        folderNameInput.value = "";
        isFolderTooltipActive = false;
    }

    // Save Folder Function
    function saveFolder() {
        const folderName = document.getElementById('folderName').value;
        const formData = new FormData();
        formData.append('folder_name', folderName);
        formData.append('parent_folder', activeFolderId);

        fetch('<?= base_url(); ?>panel/fileManager/createFolder', {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Folder create unsuccessful');
                }
                return response.json();
            })
            .then(data => {
                //get result json here
                console.log(data)
                getFiles();
            })
            .catch(error => {
                console.error('Hata:', error.message);
            });

        // Input alanındaki metni temizle
        const folderNameInput = document.getElementById('folderName');
        folderNameInput.value = "";

        hideFolderTooltip();
    }
    // FOLDER PROCESSES END ---------------
    // ------------------------------------

    // ---------------------------------------
    // Get Files and Folders to Server PROCESSES
    // ---------------------------------------

    function getFiles(folderId = activeFolderId) {
        selectedFiles = [];
        addSelectedFiles = [];
        const url = `<?= base_url(); ?>/panel/fileManager/show/${folderId}`;
        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Veri alınamadı.');
                }
                return response.json();
            })
            .then(data => {
                //0 = Folders, 1 = Files, 2 = Parent Folder ID
                listFoldersFiles(data[0], data[1], data[2])
            })
            .catch(error => {
                console.error('Hata:', error.message);
            });
    }

    getFiles();

    function getFolder(id) {
        activeFolderId = id;
        getFiles();
    }

    function listFoldersFiles(folders_, files_, parentFolderId_) {
        clearModal();
        const fileContent = document.querySelector('.file_content');
        //FOLDER CREATE ------
        // if child folder..
        if (activeFolderId != 0) {
            const folderDiv = document.createElement('div');
            if (parentFolderId_ == null) parentFolderId_ = 0;
            const folderId = parentFolderId_;
            const folderName = "...";
            folderDiv.classList.add('folder');
            folderDiv.setAttribute('onclick', 'getFolder(' + folderId + ')');
            folderDiv.innerHTML = `
             <img src="<?= $frontLink; ?>/images/folder_up.png" alt="folder">
             <p>${folderName}</p>
            `;
            fileContent.appendChild(folderDiv);

        }
        // if there is other folder
        folders_.forEach(folder => {
            const folderDiv = document.createElement('div');
            const folderId = folder.folder_id;
            const folderName = folder.folder_name;
            folderDiv.classList.add('folder');
            folderDiv.setAttribute('onclick', 'getFolder(' + folderId + ')');
            folderDiv.innerHTML = `
             <img src="<?= $frontLink; ?>/images/folder.png" alt="folder">
             <p>${folderName}</p>
             <button class="deleteFolder" onclick="deleteFolder(${folderId}, event)"> <img src="<?= $frontLink; ?>images/delete.png" alt="deleteFolder">Sil</button>
            `;
            fileContent.appendChild(folderDiv);
        });
        //-----------

        //File Create
        files_.forEach(file => {
            const fileId = file.upload_id;
            const fileName = file.upload_file;
            const ext = getFileType(fileName);

            const fileDiv = document.createElement('div');
            fileDiv.setAttribute('onclick', 'selectFile(this)');
            fileDiv.setAttribute('data-value', fileId);
            fileDiv.setAttribute('data-src', fileName);
            if (ext[0] == 1) {
                fileDiv.classList.add('image_upload');
                fileDiv.innerHTML = `
                    <img src="<?= base_url(); ?>/uploads/${fileName}" alt="${fileName}">
                    <p>${fileName}</p>
                `;
            } else if (ext[0] == 2) {
                fileDiv.classList.add('file');
                fileDiv.innerHTML = `
                    <img src="<?= $frontLink; ?>/images/file.png" alt="${fileName}">
                    <div class="fileType">.${ext[1]}</div>
                    <p>${fileName}</p>
                `;
            }
            fileContent.appendChild(fileDiv);
        });

        // console.log('Klasörler:', folders_);
        // console.log('Dosyalar:', files_);



    }

    function deleteFolder(folderId, event) {
        event.stopPropagation();
        const confirmDelete = confirm("Klasörü silmek istediğinize emin misiniz? Alt klasörler ve bunlara bağlı tüm resimlerin de silineceğini unutmayın !");
        if (confirmDelete) {
            const url = `<?= base_url(); ?>/panel/fileManager/deleteFolder/${folderId}`;
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Veri alınamadı.');
                    }
                    return response.json();
                })
                .then(data => {
                    //0 = Folders, 1 = Files, 2 = Parent Folder ID
                    getFiles();
                    console.log(data.result);
                })
                .catch(error => {
                    console.error('Hata:', error.message);
                });
        }
    }

    function clearModal() {
        const fileContent = document.querySelector('.file_content');
        fileContent.innerHTML = '';
    }

    function getFileType(fileName) {
        const dotIndex = fileName.lastIndexOf('.');
        if (dotIndex !== -1) {
            const extension = fileName.slice(dotIndex + 1).toLowerCase();
            const imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
            if (imageExtensions.includes(extension)) {
                return [1, extension]; // IMAGE Extention
            } else {
                return [2, extension]; // Other File Extention
            }
        } else {
            return array[-1]; // Not Extention
        }
    }




    // Get Files PROCESSES END ------------
    // ------------------------------------

    // ---------------------------------------
    // Upload Files to Server PROCESSES ------
    // ---------------------------------------

    // Upload File Function ------------------
    let isUploading = false;
    document.querySelector('.upload-icon').addEventListener('click', function() {
        if (!isUploading) { // isUploading false olduğunda upload ikonuna tıklanmasına izin veriyoruz.
            isUploading = true;
            const fileContent = document.getElementById("fileUploadContent");
            const fileInput = document.createElement('input');
            fileInput.type = 'file';
            fileInput.multiple = true;
            fileInput.style.display = 'none';
            document.body.appendChild(fileInput);
            fileInput.click();
            fileInput.addEventListener('change', function(event) {
                const files = event.target.files;
                if (files.length > 0) {
                    const formData = new FormData();
                    formData.append('folderId', activeFolderId);

                    for (let i = 0; i < files.length; i++) {
                        formData.append('files[' + i + ']', files[i]); // Her dosyayı benzersiz bir isimle ekleyin
                    }
                    const progressContainer = document.getElementById('progressContainer');
                    progressContainer.style.display = 'block';

                    fetch('<?= base_url(); ?>panel/fileManager/create', {
                            method: 'POST',
                            body: formData,
                            onProgress: function(event) {
                                const progress = (event.loaded / event.total) * 100;
                                const progressBar = document.getElementById('progressBar');
                                progressBar.style.width = progress + '%';
                            }
                        })
                        .then(response => {
                            progressContainer.style.display = 'none';
                            if (!response.ok) {
                                throw new Error('Dosya gönderimi başarısız oldu.');
                            }
                            isUploading = false;
                            document.body.removeChild(fileInput);
                            console.log('Dosyalar başarıyla gönderildi.');
                            return response.json();
                        })
                        .then(data => {
                            console.log(data)
                            getFiles();
                        })
                        .catch(error => {
                            console.error('Hata:', error.message);
                        });
                }
            });
        }
    });


    // Upload Files PROCESSES END ---------------
    // ------------------------------------------

    // ---------------------------------------
    // Files Select & Add or Remove PROCESSES
    // ---------------------------------------

    //File Selected --------------------------


    function selectFile(e) {
        if (e.classList.contains("file_selected")) {
            cancelSelect(e);
            e.classList.remove("file_selected");
        } else {
            addSelect(e);
            e.classList.add("file_selected");
        }
        console.log(selectedFiles);
    }

    function addSelect(e) {
        let dataValue = e.dataset.value;
        let srcValue = e.dataset.src;
        let index = selectedFiles.indexOf(dataValue);
        if (index == -1) {
            selectedFiles.push(dataValue);
            addSelectedFiles.push(srcValue);
        }

    }

    function cancelSelect(e) {
        let dataValue = e.dataset.value;
        let index = selectedFiles.indexOf(dataValue);
        if (index != -1) {
            selectedFiles.splice(index, 1);
            addSelectedFiles.splice(index, 1);
        }
    }

    function removeFiles() {
        if (selectedFiles.length > 0) {
            const promises = selectedFiles.map(fileId => {
                return fetch(`<?= base_url(); ?>panel/fileManager/delete/${fileId}`, {
                        method: 'GET',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.result === 1) {
                            console.log(`Dosya ${fileId} başarıyla silindi.`);
                        } else {
                            console.error(`Dosya ${fileId} silinirken bir hata (${data.result})  oluştu.`);
                        }
                    })
                    .catch(error => {
                        console.error(`Dosya ${fileId} silinirken bir hata  oluştu:`, error);
                    });
            });

            Promise.all(promises)
                .then(() => {
                    getFiles();
                    selectedFiles.splice(0);
                });
        }
    }




    // file src input name params :  activeArea(DB_input_name + _ + language_id) + i
    // file row input name params :  activeArea(DB_input_name + _ + language_id) + i + _ + row
    function addFiles() {
        uploadFileModal(event);
        let i = Math.floor(Math.random() * 10000);
        addSelectedFiles.forEach(file => {
            let filesContent = document.getElementById("files_" + activeArea);
            const fileDiv = document.createElement('div');
            let fileNameLNG = activeArea + "_" + i;
            fileDiv.setAttribute('id', 'file_' + fileNameLNG);
            fileDiv.innerHTML = ` <div class="file_">
                        <div class="fileImageContent">
                            <img class="fileImage" src="<?= base_url() ?>uploads/${file}" alt="image">
                        </div>
                        <p class="file-name">${file}</p>
                        <span class="file-manage">
                            <input type="hidden" value="${file}" name="${fileNameLNG}">
                            <input type="number" class="file-row" value="99" name="${fileNameLNG}_row" placeholder="sıra no">
                            <button class="delete-file" onclick="deleteFile('file_${fileNameLNG}')"><img src="<?= $frontLink; ?>images/delete.png" alt="delete"></button>
                        </span>
                    </div>`;
            filesContent.appendChild(fileDiv);
            i++;
        });


        getFiles(); // modalı resetledik selectFiles sıfırladık.
        updateFileImages();
    }

    function deleteFile(id) {
        event.preventDefault();
        let delete_ = document.getElementById(id);
        delete_.remove();
    }



    // Files Select & Add or Remove PROCESSES end
    // ------------------------------------------


    // ================================
    // Upload File SYSTEM End
    // ================================


    const defaultImagePath = '<?= $frontLink ?>images/file.png';

    function updateFileImages() {
        const fileDivs = document.querySelectorAll('.file_');
        fileDivs.forEach(fileDiv => {
            const imageElement = fileDiv.querySelector('.fileImage');
            const fileName = imageElement.src;
            const [fileType, extension] = getFileType(fileName);
            console.log(fileType);
            if (fileType === 1) {
                //imageElement.src = `<?= base_url() ?>uploads/${fileName}`;
            } else {
                imageElement.src = defaultImagePath;
            }
        });
    }
    document.addEventListener('DOMContentLoaded', updateFileImages);
</script>



<script>
    //SEO URL Generator and Turkish Char change.
    function initSlugInput(input) {
        function removeTurkishChars(text) {
            const turkishChars = {
                'ı': 'i',
                'ğ': 'g',
                'ü': 'u',
                'ş': 's',
                'ö': 'o',
                'ç': 'c',
                'İ': 'I',
                'Ğ': 'G',
                'Ü': 'U',
                'Ş': 'S',
                'Ö': 'O',
                'Ç': 'C'
            };
            return text.replace(/[^\w\s-]/g, char => turkishChars[char] || '');
        }

        function formatSlug(text) {
            const withoutTurkishChars = removeTurkishChars(text.trim().toLowerCase());
            return withoutTurkishChars.replace(/\s+/g, '-');
        }

        input.addEventListener('input', function(event) {
            const caretPosition = input.selectionStart;
            const text = formatSlug(input.value);
            input.value = text;
            input.setSelectionRange(caretPosition, caretPosition);
        });

        input.addEventListener('keydown', function(event) {
            if (event.key === ' ') {
                event.preventDefault();
                const caretPosition = input.selectionStart;
                const currentValue = input.value;
                const newValue = currentValue.slice(0, caretPosition) + '-' + currentValue.slice(caretPosition);
                input.value = newValue;
                input.setSelectionRange(caretPosition + 1, caretPosition + 1);
            }
        });
    }

    const slugInputs = document.querySelectorAll('.slug');
    slugInputs.forEach(input => initSlugInput(input));

</script>


<?php
$dataControl['bos'] = ' ';
$data['loadController'] = true;
if (isset($textarea) && $textarea)
    $dataControl['textarea'] = true;

echo view('panel/core/footer', $dataControl);

?>