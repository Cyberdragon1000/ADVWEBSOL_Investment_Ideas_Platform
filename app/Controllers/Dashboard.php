<?php

namespace App\Controllers;
use App\Models\RMIdeas;
use App\Models\RMinvestors;

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
				$model = new RMinvestors();
        		$data['investorprefs'] = $model->getinvestorsrm();
        		$data['decisions'] = $model->getinvestordecision();
				return view('templates/header', $data) . view('dashboard_rm') . view('templates/footer');
			  break;
			case "C":
				$model = new RMIdeas();
				$data['ideas'] = $model->getapprovedideas(session('id'));
				
				return view('templates/header', $data) . view('dashboard_investor') . view('templates/footer');
			  break;
			case "IG":
				return view('templates/header', $data) . view('dashboard_ig') . view('templates/footer');
			  break;
			default:
				return redirect()->to('/');
		  }

		
	}

	public function getidea($id)
	{
		$model= new RMideas();
		$results = array(
			"ideainfo" => $model->getselectedidea($id),
			"investedinfo" => $model->getselectedideadecisions($id),
			"notsentyet" => $model->getideanotsentlist($id)
		  );
		return json_encode($results);

	}
	
	public function getinvestor($id)
	{
		$model= new RMinvestors();
		$results = array(
			"investorinfo" => $model->getselectedinvestor($id),
			"investedinfo" => $model->getselectedinvestordecisions($id),
		  );
		return json_encode($results);

	}

	public function sendidearm()
	{
		$investorid=$this->request->getPost('rmsentidea');
		$ideaid=$this->request->getPost('ideano');
		$model= new RMideas();
		$model->sendfordecision($ideaid,$investorid);
		return redirect()->to('/dashboard');

	}

}
