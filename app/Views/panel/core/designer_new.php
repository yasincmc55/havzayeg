
<div class="col">
  <div class="card card-primary col-12  p0">
    <div class="card-header">
      <h3 class="card-title"><?= $title; ?></h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" class="form" id="form" action="<?= base_url('panel/designer/create') ?>" method="POST">
      <?= csrf_field() ?>
     
      <div class="card-body">
        <div class="row">
          <div class="form-group col-12 col-sm-3">
            <label for="d_name">Dizayn Name</label>
            <input type="text" class="form-control" id="d_name" name="name" placeholder="Lütfen Dizayn İsmini Yazınız" required>
            <input type="hidden" name="data" id="data">
          </div>
          <div class="form-group col-12 col-sm-3">
            <label for="v_name">View Name</label>
            <input type="text" class="form-control" id="v_name" name="view_name" placeholder="View name" required>
          </div>

          <div class="form-group col-12 col-sm-3">
            <label for="Sort">Dizayn Sıra</label>
            <input type="text" class="form-control" id="Sort" name="sortDesign" placeholder="Sıra">
          </div>

          <div class="col-12 col-sm-6 align-self-end bot-15 ">
            <div class="card-tools col ">
              <a class="btn btn-danger btn-sm" onclick="addGroup()">
                <i class="fas fa-plus" style="margin-right:3px;"> </i>
                Yeni Form Grubu Ekle
              </a>
            </div>
          </div>
        </div>

        <hr>
        <input type="hidden" name="form_data" id="form_data">
        <div class="row" id="groups">
          <div id="grupVerileri"></div>
          <!-- Bu Alandaki veriler javascript tarafından oluşturulacak -->


          <!-- Bu Alandaki veriler js tarafından oluşturulacak SONU -->
        </div>

      </div>
      <!-- /.card-body -->


    </form>
    <div class="card-footer">
      <button onclick="postFormData()" class="btn btn-success"><i class="fas fa-save"></i><?= $saveButton; ?></button>
    </div>

    <div class="results__display"></div>

  </div>
</div>


<!-- v1 JS document here -->
<!-- <script src="<?= $frontLink; ?>js/designer.js"></script> -->

<script>
  //v2 js document here
  // Add Group
  function addGroup() {
    var groupId = "group" + Math.random().toString(36).substr(2, 9);
    var groupHTML = `
    <div class="card card-danger col-12 p-0 groups" id="${groupId}">
      <div class="card-header col">
        <div class="row">
          <div class="form-group col-12 col-sm-3">
            <label for="${groupId}_groups_name">Group Name</label>
            <?php foreach ($languages as $lang) : ?>
             <input class="form-control" id="${groupId}_groups_name_<?= $lang->language_code ?>" name="${groupId}_groups_name_<?= $lang->language_code ?>" placeholder="Group Name <?= $lang->language_code ?>">
            <?php endforeach; ?>
          </div>
          <div class="form-group col-12 col-sm-3">
            <label for="${groupId}_groups_row">Order</label>
            <input class="form-control" id="${groupId}_groups_row" name="${groupId}_groups_row" placeholder="Order">
          </div>
          <div class="form-group col-12 col-sm-3">
            <label for="${groupId}_groups_type">Group Type</label>
            <select class="form-control" name="${groupId}_groups_type" id="${groupId}_groups_type">
              <option value="1" selected>Standard</option>
              <option value="2">Form</option>
            </select>
          </div>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" onclick="deleteGroup('${groupId}')">Delete Group ×</span>
        </button>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-12 col-sm-3">
            <label for="${groupId}_form_type">Form Type</label>
            <select class="form-control" name="${groupId}_form_type" id="${groupId}_form_type">
              <option value="Input" selected>Input</option>
              <option value="Text Area">Text Area</option>
              <option value="Single Image">Single Image</option>
              <option value="Multiple Images">Multiple Images</option>
              <option value="Video">Video</option>
              <option value="File">File</option>
              <option value="Select">Select</option>
              <option value="Multiple Select">Multiple Select</option>
            </select>
          </div>
          <div class="col-12 col-sm-3 align-self-end bot-15">
            <div class="card-tools col">
              <button type="button" class="btn btn-outline-info btn-sm" onclick="addForm('${groupId}')">
                <i class="fas fa-plus" style="margin-right:3px"></i>Add
              </button>
            </div>
          </div>
        </div>
        <hr>
        <div class="row" id="${groupId}_forms">
          <!-- This section should be dynamically generated with JavaScript to add forms -->
        </div>
      </div>
    </div>
  `;

    var groupsDiv = document.getElementById("groups");
    groupsDiv.insertAdjacentHTML("beforeend", groupHTML);
  }

  // Add Form
  function addForm(groupId) {
    var formId = "form" + Math.random().toString(36).substr(2, 9);
    var formType = document.getElementById(groupId + "_form_type").value;
    var formTitle = formType;

    var formHTML = `
    <div class="card card-outline card-info col-12 col-sm-3 forms" id="${formId}">
      <div class="card-header">
        <h3 class="card-title" id="${formId}_title">${formTitle}</h3>
        <input type="hidden" class="data" name="${formId}_elem_type" value="${formType}">
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="close">
            <span aria-hidden="true" onclick="deleteForm('${formId}')">×</span>
          </button>
        </div>
      </div>
      <div class="card-body related_forms" style="display: block;">
        <div class="form-group col-12">
          <label for="${formId}_elem_label">Label</label>
          <?php foreach ($languages as $lang) : ?>
          <input class="form-control data" id="${formId}_elem_label_<?= $lang->language_code ?>" name="${formId}_elem_label_<?= $lang->language_code ?>" placeholder="Label Name">
          <?php endforeach; ?>
        </div>
        <div class="form-group col-12">
          <label for="${formId}_elem_name">Name</label>
          <input class="form-control data" id="${formId}_elem_name" name="${formId}_elem_name" placeholder="Database Name">
        </div>
        <div class="form-group col-12">
          <label for="${formId}_elem_row">Row</label>
          <input type="number" class="form-control data" id="${formId}_elem_row" name="${formId}_elem_row" placeholder="Row">
        </div>
        <div class="form-group col-12">
          <label for="${formId}_elem_default">Default Value</label>
          <input class="form-control data" id="${formId}_elem_default" name="${formId}_elem_default" placeholder="Default Value">
        </div>

        <div class="form-group col-12">
          <label for="${formId}_elem_required">Required?</label>
          <select class="form-control data" name="${formId}_elem_required" id="${formId}_elem_required">
            <option value="0" selected>No</option>
            <option value="1">Yes</option>
          </select>
        </div>
        <!-- Form content -->
      </div>
    </div>
  `;


  /**
   * 
        <div class="form-group col-12">
          <label for="${formId}_elem_related_table">Related Table</label>
          <input class="form-control data" id="${formId}_elem_related_table" name="${formId}_elem_related_table" placeholder="Related Table">
        </div>

        <div class="form-group col-12">
          <label for="${formId}_elem_related_category">Related Category</label>
          <input class="form-control data" id="${formId}_elem_related_category" name="${formId}_elem_related_category" placeholder="Related Category">
        </div>


        <div class="form-group col-12">
          <label for="${formId}_elem_related_variable">Related Variable</label>
          <input class="form-control data" id="${formId}_elem_related_variable" name="${formId}_elem_related_variable" placeholder="Related Variable">
        </div>
   */

    var formsDiv = document.getElementById(groupId + "_forms");
    formsDiv.insertAdjacentHTML("beforeend", formHTML);
  }

  // Delete Group
  function deleteGroup(groupId) {
    var group = document.getElementById(groupId);
    group.remove();
  }

  // Delete Form
  function deleteForm(formId) {
    var form = document.getElementById(formId);
    form.remove();
  }

  // Get form data in a format to be posted
  function getFormData() {
    var formData = [];

    //Languages data 
    <?php foreach ($languages as $lang) : ?>
      var formData_<?= $lang->language_code ?> = [];
    <?php endforeach; ?>
    //Languages Data variable End

    var groups = document.getElementsByClassName("groups");
    for (var i = 0; i < groups.length; i++) {
      var group = groups[i];
      var groupId = group.id;
      // Languages Group Names here
      <?php foreach ($languages as $lang) : ?>
        var groupName_<?= $lang->language_code ?> = group.querySelector("[name$='_groups_name_<?= $lang->language_code ?>']").value;
      <?php endforeach; ?>
      //Languages Group Names End

      var groupOrder = group.querySelector("[name$='_groups_row']").value;
      var groupType = group.querySelector("[name$='_groups_type']").value;

      var forms = group.getElementsByClassName("forms");
      var groupForms = [];

      // Languages Group Forms here
      <?php foreach ($languages as $lang) : ?>
        var groupForms_<?= $lang->language_code ?> = [];
      <?php endforeach; ?>
      //Languages Group Forms end

      for (var j = 0; j < forms.length; j++) {
        var form = forms[j];
        var formId = form.id;
        var formElementType = form.querySelector("[name$='_elem_type']").value;
        var formElementName = form.querySelector("[name$='_elem_name']").value;
        var formElementRow = form.querySelector("[name$='_elem_row']").value;
        var formElementDefault = form.querySelector("[name$='_elem_default']").value;
        //var formElementRelatedTable = form.querySelector("[name$='_elem_related_table']").value;
        //var formElementRelatedCategory = form.querySelector("[name$='_elem_related_category']").value;
        //var formElementRelatedVariable = form.querySelector("[name$='_elem_related_variable']").value; 
        var formElementRequired = form.querySelector("[name$='_elem_required']").value;

        var formObject = {
          formElementId: formId,
          formElementType: formElementType,
          formElementName: formElementName,
          formElementRow: formElementRow,       
          formElementDefault: formElementDefault,
          //formElementRelatedTable:formElementRelatedTable,
          //formElementRelatedCategory:formElementRelatedCategory,
          //formElementRelatedVariable:formElementRelatedVariable,       
          formElementRequired: formElementRequired,
        };

        groupForms.push(formObject);

        //Languages forms data -----------------------
        <?php foreach ($languages as $lang) : ?>
          var formElementLabel_<?= $lang->language_code ?> = form.querySelector("[name$='_elem_label_<?= $lang->language_code ?>']").value;
          var formObject_<?= $lang->language_code ?> = {
            formElementId: formId,
            formElementLabel: formElementLabel_<?= $lang->language_code ?>,
          }
          groupForms_<?= $lang->language_code ?>.push(formObject_<?= $lang->language_code ?>);
        <?php endforeach; ?>
        //Languages forms Data End ------------------------
      }

      var groupObject = {
        groupId : groupId, 
        groupOrder: groupOrder,
        groupType: groupType,
        forms: groupForms,
      };
      formData.push(groupObject);

      //Languages Group Object  --------------
      <?php foreach ($languages as $lang) : ?>
        var groupObject_<?= $lang->language_code ?> = {
          groupId : groupId, 
          groupName: groupName_<?= $lang->language_code ?>,
          forms: groupForms_<?= $lang->language_code ?>,
        };
        formData_<?= $lang->language_code ?>.push(groupObject_<?= $lang->language_code ?>);
      <?php endforeach; ?>
      //Languages Group Object End -----------
    }

    var data = [
      formData,
      <?php foreach ($languages as $lang) : ?>
        formData_<?= $lang->language_code ?>,
      <?php endforeach; ?>
    ];
    return data;
  }

  // Post JSON data
  function postFormData() {

    var formData = getFormData();
    var jsonData = JSON.stringify(formData[0]);
    document.getElementById("form_data").value = jsonData;
    /// hidden languages datalar oluşturulup form datadan gelen değerler json olarak aktarılacak.
    var formContainer = document.getElementById('form');
    <?php
    $i = 1;
    foreach ($languages as $lang) { ?>
      var jsonData_<?= $lang->language_code ?> = JSON.stringify(formData[<?= $i ?>]);
      var input_<?= $lang->language_code ?> = document.createElement('input');
      input_<?= $lang->language_code ?>.type = 'hidden';
      input_<?= $lang->language_code ?>.name = 'languageData_<?= $lang->language_code ?>';
      input_<?= $lang->language_code ?>.value = jsonData_<?= $lang->language_code ?>;
      formContainer.appendChild(input_<?= $lang->language_code ?>);
    <?php
      $i++;
    } ?>
     
    document.getElementById("form").submit();
  }
</script>