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
				$data['newideas'] = $model->getrmsentideas(session('id'));
				$model = new RMinvestors();
				$data['appideas'] = $model->getapprovedideas(session('id'));

				return view('templates/header', $data) . view('dashboard_investor') . view('templates/footer');
				break;
			case "IG":
				$model = new RMIdeas();
				$data['newideas'] = $model->getmyideas(session('id'));
				$model = new RMinvestors();
				$data['appideas'] = $model->getmyapprovedideas(session('id'));
				return view('templates/header', $data) . view('dashboard_ig') . view('templates/footer');
				break;
			default:
				return redirect()->to('/');
		}
	}

	public function getidea($id)
	{
		$model = new RMideas();
		$results = array(
			"ideainfo" => $model->getselectedidea($id),
			"investedinfo" => $model->getselectedideadecisions($id),
			"notsentyet" => $model->getideanotsentlist($id)
		);
		return json_encode($results);
	}

	public function getinvestor($id)
	{
		$model = new RMinvestors();
		$results = array(
			"investorinfo" => $model->getselectedinvestor($id),
			"investedinfo" => $model->getselectedinvestordecisions($id),
		);
		return json_encode($results);
	}

	public function sendidearm()
	{
		$investorid = $this->request->getPost('rmsentidea');
		$ideaid = $this->request->getPost('ideano');
		$model = new RMideas();
		$model->sendfordecision($ideaid, $investorid);
		return redirect()->to('/dashboard');
	}

	public function senddecision()
	{
		$investorid = $this->request->getPost('investorid');
		$ideaid = $this->request->getPost('ideaid');
		$choice = $this->request->getPost('choice');
		if ($choice === 'A') {
			$model = new RMinvestors();
			$model->sendfordecision($investorid, $choice, $ideaid);
			return redirect()->to('/dashboard');
		}
		else {
			$model = new RMinvestors();
			$model->sendfordecision($investorid, $choice, $ideaid);
			return redirect()->to('/dashboard');
		}
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

	public function deleteidea(){
		$ideaid = $this->request->getPost('ideadel');
		$model = new RMinvestors();
		$model->ideadelete($ideaid);
			return redirect()->to('/dashboard');
	}
	public function rejectidea(){
		$model = new RMinvestors();
		$model->rmreject($this->request->getPost('id'));
			return redirect()->to('/dashboard');
	}

	public function addidea(){
		$model = new RMinvestors();
		$model->ideaenter(
			$this->request->getPost('title'),
			$this->request->getPost('abs'),
			$this->request->getPost('auth'),
			$this->request->getPost('risk'),
			$this->request->getPost('pd'),
			$this->request->getPost('ed'),
			$this->request->getPost('cont'),
			$this->request->getPost('cur'),
			$this->request->getPost('int'),
			$this->request->getPost('pt'),
			$this->request->getPost('maj'),
			$this->request->getPost('min'),
			$this->request->getPost('reg'),
			$this->request->getPost('con'),
			($this->request->getPost('ideaid')=='0')?'':$this->request->getPost('ideaid')
		);
			return redirect()->to('/dashboard');
	}

	public function prefup(){
		$model = new RMinvestors();
		$model->prefupdate(
			$this->request->getPost('auth'),
			$this->request->getPost('a'),
			$this->request->getPost('b'),
			$this->request->getPost('c'),
			$this->request->getPost('d'),
			$this->request->getPost('e'),
			$this->request->getPost('f'),
			$this->request->getPost('g'),
			$this->request->getPost('h'),
			$this->request->getPost('i'),
			$this->request->getPost('j'),
			$this->request->getPost('k'),
			$this->request->getPost('l')
		);
		return redirect()->to('/dashboard');
	}
}
