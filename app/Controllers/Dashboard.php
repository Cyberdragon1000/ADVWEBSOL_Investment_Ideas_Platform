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

	public function senddecision()
	{
		$investorid=$this->request->getPost('investorid');
		$choice=$this->request->getPost('choice');
		$model= new RMinvestors();
		$model->sendfordecision($investorid,$choice);
		return redirect()->to('/dashboard');

	}

	public function getnewideaslistrm()
	{
		$model = new RMIdeas();
        return json_encode($model->getideasrm());

	}

	public function getsentideaslistrm()
	{
		$model = new RMinvestors();
        return json_encode($model->getinvestordecision());

	}

	public function getinvestorslistrm()
	{
		$model = new RMinvestors();
        return json_encode($model->getinvestorsrm());

	}

	public function getpreferencesinvestor($id)
	{
		$model = new RMinvestors();
        return json_encode($model->getpreferences($id));

	}


}
