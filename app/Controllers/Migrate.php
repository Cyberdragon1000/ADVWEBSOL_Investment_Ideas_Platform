<?php  

namespace App\Controllers;

class Migrate extends BaseController{

    public function index(){
        $migrate = \Config\Services::migrations();

      if(! $migrate->latest()){
          show_error( $migrate->latest());
      }   
    }
}