<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

/*
 * --------------------------------------------------------------------
 * Panel Core Routes
 * --------------------------------------------------------------------
 */


// Multiple filter için Feature.php içinde $multipleFilters true olarak ayarlanmalı!!! 
 $routes->group('panel', ['namespace' => 'App\Controllers\Panel\Core', 'filter' => ['login','language'] ],  function ($routes) {
	$routes->get('/', 'Home::index', ['as' => 'panel.dashboard']);
	$routes->group('contents', function ($routes) {
		$routes->get('(:num)', 'Contents::index/$1');
		$routes->get('new', 'Contents::new');
		$routes->post('create', 'Contents::create', ['as'=>'panel.contents.create']);
		$routes->get('edit/(:num)', 'Contents::edit/$1');
		$routes->post('update/(:num)', 'Contents::update/$1');
		$routes->get('delete/(:num)', 'Contents::delete/$1');
	});
	$routes->group('designer', function ($routes) {
		$routes->get('/', 'Designers::index');
		$routes->get('new', 'Designers::new');
		$routes->post('create', 'Designers::create', ['as'=>'panel.designer.create']);
		$routes->get('edit/(:num)', 'Designers::edit/$1');
		$routes->post('update', 'Designers::update', ['as'=>'panel.designer.update']);
		$routes->get('delete/(:num)', 'Designers::delete/$1');
	});
	$routes->group('categories', function ($routes) {
		$routes->get('/', 'Categories::index');
		$routes->get('new', 'Categories::new');
		$routes->post('create', 'Categories::create', ['as'=>'panel.categories.create']);
		$routes->get('edit/(:num)', 'Categories::edit/$1');
		$routes->post('update', 'Categories::update', ['as'=>'panel.categories.update']);
		$routes->get('delete/(:num)', 'Categories::delete/$1');
	});
	$routes->group('fileManager', function ($routes) {
		$routes->get('/', 'FileManager::index');
		$routes->post('create', 'FileManager::create', ['as'=>'panel.fileManager.create']);
		$routes->post('createFolder', 'FileManager::createFolder');
		$routes->get('show/(:num)', 'FileManager::show/$1');
		$routes->get('delete/(:num)', 'FileManager::delete/$1');
		$routes->get('deleteFolder/(:num)', 'FileManager::deleteFolder/$1');
	});
	//$routes->get('createdb/', 'Createdb::index');
	$routes->match(["get", "post"], 'login/', 'Login::index' , ['as'=>'panel.login']);
	$routes->get('logout/', 'Login::logout');
	$routes->get('uploads/up/', 'Uploads::upload');
	$routes->get('site-settings','SiteSettings::index');

 
});


//randevular

$routes->group('admin', ['namespace' => 'App\Controllers\Panel\Core'], function ($routes) {
    $routes->group('randevular', function ($routes) {
        $routes->get('/', 'RandevuController::index', ['filter' => 'login']);

		$routes->post('hasta-durumu', 'RandevuController::getHastaDurumu', ['as'=>'panel.randevu.hasta_durumu']);
        $routes->post('on-bilgi', 'RandevuController::getHastaAdiVeKonumu', ['as'=>'panel.randevu.hasta_adi_ve_konumu']);
        $routes->post('basvuru-formu', 'RandevuController::getDosyaAndOtherData', ['as'=>'panel.randevu.dosya_ve_veriler']);
        $routes->post('takvim', 'RandevuController::getTarihVeSaat', ['as'=>'panel.randevu.tarih_ve_saat']);

		$routes->post('emergency-add', 'RandevuController::emergency_add', ['as' => 'panel.emergency.add']); //acil aramalarda tutulacak kayıt
		$routes->get('emergency-list', 'RandevuController::emergency_list', ['as' => 'panel.emergency.list']);
		$routes->delete('emergency-delete/(:num)', 'RandevuController::emergency_delete/$1', ['as' => 'panel.emergency.delete']);
        $routes->get('show/(:num)','RandevuController::show/$1',['as'=>'panel.randevu.show']);
        $routes->delete('delete/(:num)','RandevuController::delete/$1',['as'=>'panel.randevu.delete']);
		$routes->post('onayla/(:num)', 'RandevuController::onayla/$1', ['as' => 'panel.randevu.onayla']);
		$routes->get('get-available-hours/(:any)', 'RandevuController::getAvailableHours/$1', ['as' => 'panel.randevu.get_available_hours']);

		$routes->get('randevu-ekle' , 'RandevuController::randevu_add' , ['as'=>'panel.randevu.randevu_add']);
		$routes->post('randevu-store' , 'RandevuController::randevu_store' , ['as'=>'panel.randevu.randevu_store']);
		$routes->post('randevu-update/(:num)' , 'RandevuController::randevu_update/$1' , ['as'=>'panel.randevu.randecu_update']);
		
		
    });
});

$routes->post('randevu-mail','RandevuController::randevu_mail_gonder');
//$routes->get('get-ip','Panel\Core\RandevuController::get_ip');

$routes->post('iletisim-mail', 'Site\Home::iletisim_mail_gonder');






/*
 * --------------------------------------------------------------------
 * Website Routes
 * --------------------------------------------------------------------
 */

 $routes->get('/', 'Site\Home::index');
 $routes->add('email_gonder', 'Site\Home::email_gonder');

$languagesModel = new \App\Models\Panel\Core\Languages();
$languages = $languagesModel->findAll();
foreach ($languages as $language) {
    $routes->get($language->language_code , 'Site\Home::index');
    $routes->get($language->language_code . '/(:any)', 'Site\Home::pages/$1');
}
$routes->get('/(:any)', 'Site\Home::pages/$1');





/*
 * --------------------------------------------------------------------
 * Test Routes
 * --------------------------------------------------------------------
 */


if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
