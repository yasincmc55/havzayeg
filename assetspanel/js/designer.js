
var gruplar = document.getElementById("gruplar");

var num = 0;
var formNum = 0;
function grupAdd(grupData={}) {
    let duzenleme = false; 
    if(grupData.length > 0 ){ duzenleme = true; }

    for (var i = 1; i < 300; i++) {
        var sor = GetElementInsideContainer("gruplar", "grup" + i);
        if (sor.length > 0) { /* var ekleme */ } else {  num++; break; }
    }

    var grName = "grup" + num;
    if(duzenleme)
    {
        let sel1 = "selected";
        let sel2 = "";
        if(grupData[2] == 2){ sel1 = ""; sel2 = "selected"; }
        gruplar.insertAdjacentHTML("beforeend", '<div class="card card-danger col-12 p0 gruplar" id="'+grName+'"><div class="card-header col"><div class="row"><div class="form-group col-12 col-sm-3"><label for="groups_name">Grup Adı</label><input class="form-control" id="groups_name" name="groups_name" placeholder="Grup Adı" value="'+grupData[0]+'"></div><div class="form-group col-12 col-sm-3"><label for="groups_row">Sıralama</label><input class="form-control" id="groups_row" name="groups_row" placeholder="S.No" value="'+grupData[1]+'"></div><div class="form-group col-12 col-sm-3"><label for="groups_type">Grup Tipi</label><select class="form-control" name="groups_type" id="groups_type"><option value="1" '+sel1+'>Standart</option><option value="2" '+sel2+'>Form</option></select></div></div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="grupSil(\''+grName+'\')" style="display:block;margin-top:-45px">Grubu Sil ×</span></button></div><div class="card-body"><div class="row"><div class="form-group col-12 col-sm-3"><label for="form_type">Form Tipi</label><select class="form-control" name="form_type" id="form_type"><option value="Input" selected>Input</option><option value="Text Alanı">Text Alanı</option><option value="Tekli Resim">Tekli Resim</option><option value="Çoklu Resim">Çoklu Resim</option><option value="Video">Video</option><option value="Dosya">Dosya</option><option value="Seçmeli">Seçmeli</option><option value="Çoklu Seçmeli">Çoklu Seçmeli</option></select></div><div class="col-12 col-sm-3 align-self-end bot-15"><div class="card-tools col"><button type="button" class="btn btn-outline-info btn-sm" onclick="formAdd(\''+grName+'\')"><i class="fas fa-plus" style="margin-right:3px"></i>Ekle</button></div></div></div><hr><div class="row" id="formlar"></div></div></div>');
        return grName;
    }else{
        gruplar.insertAdjacentHTML("beforeend", '<div class="card card-danger col-12 p0 gruplar" id="'+grName+'"><div class="card-header col"><div class="row"><div class="form-group col-12 col-sm-3"><label for="groups_name">Grup Adı</label><input class="form-control" id="groups_name" name="groups_name" placeholder="Grup Adı"></div><div class="form-group col-12 col-sm-3"><label for="groups_row">Sıralama</label><input class="form-control" id="groups_row" name="groups_row" placeholder="S.No"></div><div class="form-group col-12 col-sm-3"><label for="groups_type">Grup Tipi</label><select class="form-control" name="groups_type" id="groups_type"><option value="1" selected>Standart</option><option value="2">Form</option></select></div></div><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="grupSil(\''+grName+'\')" style="display:block;margin-top:-45px">Grubu Sil ×</span></button></div><div class="card-body"><div class="row"><div class="form-group col-12 col-sm-3"><label for="form_type">Form Tipi</label><select class="form-control" name="form_type" id="form_type"><option value="Input" selected>Input</option><option value="Text Alanı">Text Alanı</option><option value="Tekli Resim">Tekli Resim</option><option value="Çoklu Resim">Çoklu Resim</option><option value="Video">Video</option><option value="Dosya">Dosya</option><option value="Seçmeli">Seçmeli</option><option value="Çoklu Seçmeli">Çoklu Seçmeli</option></select></div><div class="col-12 col-sm-3 align-self-end bot-15"><div class="card-tools col"><button type="button" class="btn btn-outline-info btn-sm" onclick="formAdd(\''+grName+'\')"><i class="fas fa-plus" style="margin-right:3px"></i>Ekle</button></div></div></div><hr><div class="row" id="formlar"></div></div></div>');
    }
}

function formAdd(id, formData={}) {
    let duzenleme = false; 
    if(formData["elem_name"] ){ duzenleme = true; }

    var eklencek = document.getElementById(id);
    var ekle = eklencek.querySelector("#formlar");
    var baslik = eklencek.querySelector("#form_type");
    baslik = baslik.value;

    for (var i = 1; i < 400; i++) {
        var sor = GetElementInsideContainer("formlar", "form" + i);
        if (sor.length > 0) { } else { formNum++; break; }
    }

    var frName = "form" + formNum;

    if(duzenleme)
    {
        let sel1 = "selected";
        let sel2 = "";
        if(formData["elem_required"] == 1){ sel1 = ""; sel2 = "selected"; }
        ekle.insertAdjacentHTML("beforeend", '<div class="card card-outline card-info col-12 col-sm-3 formlar" id="'+ frName +'"><div class="card-header"><h3 class="card-title" id="baslik">'+formData["elem_type"]+'</h3><input type="hidden" class="veriler" name="elem_type" value="'+formData["elem_type"]+'"><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button> <button type="button" class="close"><span aria-hidden="true" onclick="formSil(\''+frName+'\')">×</span></button></div></div><div class="card-body yakin_formlar" style="display:none"><div class="form-group col-12"><label for="elem_label">Label</label><input class="form-control veriler" id="elem_label" name="elem_label" placeholder="görünen ismi" value="'+formData["elem_label"]+'"></div><div class="form-group col-12"><label for="elem_name">Name</label><input class="form-control veriler" id="elem_name" name="elem_name" placeholder="veritabanı name" value="'+formData["elem_name"]+'"></div><div class="form-group col-12"><label for="elem_row">Sıra</label><input type="number" class="form-control veriler" id="elem_row" name="elem_row" placeholder="Sırası" value="'+formData["elem_row"]+'"></div><div class="form-group col-12"><label for="elem_default">Default Veri</label><input class="form-control veriler" id="elem_default" name="elem_default" placeholder="ön tanımlı veri" value="'+formData["elem_default"]+'"></div><div class="form-group col-12"><label for="elem_required">Zorunlu mu?</label><select class="form-control veriler" name="elem_required" id="elem_required"><option value="0" '+sel1+'>Hayır</option><option value="1" '+sel2+'>Evet</option></select></div></div></div>');
    }else{ 
        ekle.insertAdjacentHTML("beforeend", '<div class="card card-outline card-info col-12 col-sm-3 formlar" id="'+ frName +'"><div class="card-header"><h3 class="card-title" id="baslik">'+baslik+'</h3><input type="hidden" class="veriler" name="elem_type" value="'+baslik+'"><div class="card-tools"><button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i></button> <button type="button" class="close"><span aria-hidden="true" onclick="formSil(\''+frName+'\')">×</span></button></div></div><div class="card-body yakin_formlar" style="display:none"><div class="form-group col-12"><label for="elem_label">Label</label><input class="form-control veriler" id="elem_label" name="elem_label" placeholder="görünen ismi"></div><div class="form-group col-12"><label for="elem_name">Name</label><input class="form-control veriler" id="elem_name" name="elem_name" placeholder="veritabanı name"></div><div class="form-group col-12"><label for="elem_row">Sıra</label><input type="number" class="form-control veriler" id="elem_row" name="elem_row" placeholder="Sırası"></div><div class="form-group col-12"><label for="elem_default">Default Veri</label><input class="form-control veriler" id="elem_default" name="elem_default" placeholder="ön tanımlı veri"></div><div class="form-group col-12"><label for="elem_required">Zorunlu mu?</label><select class="form-control veriler" name="elem_required" id="elem_required"><option value="0" selected>Hayır</option><option value="1">Evet</option></select></div></div></div>');
    }
    
}

function grupSil(elem) {
    var elem = document.getElementById(elem);
    elem.remove();
}
function formSil(elem) {
    var elem = document.getElementById(elem);
    elem.remove();
}

function GetElementInsideContainer(containerID, childID) {
    var elm = {};
    var elms = document.getElementById(containerID).getElementsByTagName("*");
    for (var i = 0; i < elms.length; i++) {
        if (elms[i].id === childID) {
            elm = elms[i];
            break;
        }
    }
    return elm;
}

function gruptaBul(el, childID)
{
    var elm = {};
    var elms= el.getElementsByTagName("*")
    for (var i = 0; i < elms.length; i++) {
        if (elms[i].id === childID) {
            elm = elms[i];
            break;
        }
    }
    return elm;

}

const handleFormSubmit = (event) => {
    event.preventDefault();
    var data = [];
    data["name"]  = document.getElementById("d_name").value;
    var gr_data ={};
    let grps = document.getElementsByClassName("gruplar")
    for (var i = 0; i < grps.length; i++) {
        // Burda(döngüde) kaç adet gurup varsa onlar olacak 
        if(!gr_data["groups"]) 
            gr_data["groups"] = {}; 
            
        if(!gr_data["groups"][i] ) 
            gr_data["groups"][i] = {}; 
        
        if(!gr_data["groups"][i][0] )
            gr_data["groups"][i][0] = {}; 

        gr_data["groups"][i][0]["groupsName"] = gruptaBul(grps[i], "groups_name").value;
        gr_data["groups"][i][0]["row"] = gruptaBul(grps[i], "groups_row").value;
        gr_data["groups"][i][0]["type"] = gruptaBul(grps[i], "groups_type").value;

        let form_ = grps[i].getElementsByClassName("formlar");
        for (var f = 0; f < form_.length; f++) {
            let k = f+1;
            //burda (grupta) kaç tane form elemanı varsa onlar dönecek
            let inps_ = form_[f].getElementsByClassName("veriler");
            for (var g = 0; g < inps_.length; g++) {
                // burda (form elemanı içinde ) kaç input
                let inp_name = String(inps_[g].name);
                if(!gr_data["groups"][i][k])
                {
                    gr_data["groups"][i][k] ={};
                }
                gr_data["groups"][i][k][inp_name] = inps_[g].value
            }
        }
    }
    document.getElementById("data").value = JSON.stringify(gr_data);
    form.submit();
    
}
const form = document.getElementsByClassName('form')[0];
form.addEventListener('submit', handleFormSubmit);