<section class="content">
  <div class="">
  <form role="form" action="#" method="post" id="form">
    <input type="hidden" name="prevPage" value="<?=$prevPage?>">
    <div class="card">
      <div class="card-footer" style="text-align: right; ">
        <button type="submit" class="btn btn-success"><i class="far fa-save" style="margin-right:3px;"></i> Oluştur ve Düzenle</button>
      </div>
    </div>

    
        <div class="gurup">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Genel Bilgiler</h3>
            </div>
            <!-- /.card-header -->
              <div class="card-body">

                <div class="form-group">
                  <label for="content_name">Başlık</label>
                  <input type="text" class="form-control" id="baslik" name="content_name" required>
                </div>
                <div class="form-group">
                  <label for="row">Sıralama</label>
                  <input type="text" class="form-control" id="row" name="row">
                </div>

                <div class="form-group" style="  <?php if(!$gelistirici){ echo "display:none" ; }  ?>">
                      <label for="category">Üst Kategorisi</label>
                      <select class="form-control" name="parents_id" id="parents_id">
                          <?php
                            if($gelistirici)
                            {
                              echo '<option value="0" >Ana Kategori</option>';
                            }
                            if($categories != NULL){
                              foreach($categories as $cat)
                              {
                                $selected = "";
                                if($cat["content_id"] == $currentCategory)
                                {
                                  $selected =" selected";
                                }
                                echo '<option value="'.$cat["content_id"].'" '.$selected.'>'.$cat["content_name"].'</option>';
                              }
                            }

                          ?>
                      </select>
                  </div>
                  <div class="form-group" style="  <?php if(!$gelistirici){ echo "display:none" ; }  ?>">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                     <input type="checkbox"  class="custom-control-input" id="customSwitch3" name="isCategory" value="1">
                     <label class="custom-control-label" for="customSwitch3">Alt Kategori Olarak Oluştur</label>
                    </div>
                  </div>


                   <div style="display: none">
                  <div class="form-group">
                      <label for="designer">Sayfa Tasarımı</label>
                      <select class="form-control" name="designer_id" id="designer">
                          <?php
                            foreach($designer_data as $des)
                            {
                              $sl1 = "";
                              if(isset($currentDesigner))
                              {
                                if($currentDesigner == $des["designer_id"])
                                  $sl1 = " selected";
                              }
                              echo '<option value="'.$des["designer_id"].'" '.$sl1.'>'.$des["name"].'</option>';
                            }
                          ?>
                      </select>
                  </div>

                  <div class="form-group">
                    <label for="view">Sayfa View</label>
                    <input type="text" class="form-control" id="view" name="view" >
                  </div>
                  <div class="form-group">
                    <label for="childView">Alt Sayfaların View'i</label>
                    <input type="text" class="form-control" id="childView" name="childView">
                  </div>

                  <div class="form-group">
                    <label for="font_icon">Sol Taraf İkon fontawesome</label>
                    <input type="text" class="form-control" id="font_icon" name="font_icon">
                  </div>

                </div>



                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                   <input type="checkbox" checked class="custom-control-input" id="customSwitch4" name="status" value="1">
                   <label class="custom-control-label" for="customSwitch4">Pasif / Aktif</label>
                </div>


              </div>
              <!-- /.card-body -->
          </div>
        </div>


    <div class="card">
      <div class="card-footer" style="text-align: right; ">
        <button type="submit" class="btn btn-success"><i class="far fa-save" style="margin-right:3px;"></i> Oluştur ve Düzenle</button>
      </div>
    </div>
    </form>
  </div>
</section>
