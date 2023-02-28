<?php

namespace App\Controllers;
use App\Models\RMIdeas;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = ucfirst('dashboard');
		$usertype = session('user_type');

		switch ($usertype) {
			case "RM":
				$model = new RMIdeas();
        		$data['ideas'] = $model->getideasrm();
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

}
