<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = ucfirst('dashboard');
		$usertype = session('user_type');

		switch ($usertype) {
			case "RM":
				return view('templates/header', $data) . view('dashboard_rm') . view('templates/footer');
			  break;
			case "C":
				return view('templates/header', $data) . view('dashboard_investor') . view('templates/footer');
			  break;
			case "IG":
				return view('templates/header', $data) . view('dashboard_ig') . view('templates/footer');
			  break;
			default:
			  echo "Login pls!";
		  }

		
	}

	public function rmswitch(){
		$data = [];
		$data['title'] = ucfirst('dashboard');
		$usertype = session('user_type');
		if (session('user_type')=='RM') {
			return view('templates/header', $data) . view('investor_list_rm') . view('templates/footer');
		}
	}
}
