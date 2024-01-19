<?php

namespace App\Controllers\Panel\Core;

use App\Controllers\BaseControllerPanel;
use App\Models\Panel\Core\Users;

class Login extends BaseControllerPanel
{

	public function index()
	{
		// Login Session Kontrolü ( Eğer giriş yapmışsa dashboarda gitcek )
		if ($this->session->has("loggedIn")) {
			return redirect()->to('/panel');
		}

		// Eğer session kontrolünden geçemezse login post olmuşsa burda post denetlemesi yapacak
		$data['frontLink'] = assetsPanel();

		if ($this->request->getPost("username") &&  $this->request->getPost("password")) {
			$rules = [
				'username' => 'required|valid_email',
				'password' => 'required|min_length[1]'
			];
			if (!$this->validate($rules)) {
				$hata = implode($this->validator->getErrors());
				$this->session->setFlashdata(array('mesaj' =>  $hata, 'renk' => 'error'));
				return redirect()->route('panel.login');
			}
			return $this->login();
		} else {
			echo view('panel/core/login', $data);
		}
	}


	public function login()
	{
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$userModel = new Users();
		$user = $userModel->where('mail', $username)->first();
		if(!$user)
		{
			$this->session->setFlashdata(array('mesaj' => lang('Mesajlar.login.kullanici_yanlis'), 'renk' => 'error'));
			return redirect()->route('panel.login');
		}
		if ($user && password_verify($password, $user['password'])) {
			$newdata = [
				'name'  		=> $user['name'],
				'email'     => $user['mail'],
				'authority' => $user['authority'],
				'loggedIn' 	=> TRUE
			];
			//status check here ....
			//
			$this->session->set($newdata);
			$this->session->setFlashdata(array('mesaj' => lang('Mesajlar.login.basarili') . ' ' . $user['name'], 'renk' => 'success'));
			return redirect()->route('panel.dashboard');
		} else {
			$this->session->setFlashdata(array('mesaj' => lang('Mesajlar.login.sifre_yanlis'), 'renk' => 'error'));
			return redirect()->route('panel.login');
		}
	}


	public function logout()
	{
		$this->session->destroy();
		$this->session->setFlashdata(array('mesaj' => lang('Mesajlar.login.loggedOut'), 'renk' => 'success'));
		return redirect()->route('panel.login');
	}




	//kullanıcı yetkilerini unutma..




}
