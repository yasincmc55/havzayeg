<?php

namespace App\Controllers\Panel\Core;

use App\Controllers\BaseControllerPanel;
use App\Models\Panel\Core\Sidebar;
class Home extends BaseControllerPanel
{
	public function index()
	{
		$data['frontLink'] 		= assetsPanel();
		$data['name'] 			= $this->session->get("name");
		$data['title'] 			= lang('PanelTXT.dashboard');
		$data['gelistirici'] 	= $this->gelistirici;
		$side  					= new Sidebar();
		$sidebar['sidebarData'] = $side->generateSidebar();

		echo view('panel/core/head', $data);
		echo view('panel/core/header');
		echo view('panel/core/sidebar',$sidebar);
		echo view('panel/core/dashboard');
		echo view('panel/core/footer');
	}
}
