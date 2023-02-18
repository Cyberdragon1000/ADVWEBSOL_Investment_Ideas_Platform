<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // for pages unknown

class Home extends BaseController
{
    public function index()
    {
        $page='homepage';

        if (! is_file(APPPATH . 'Views/' . $page . '.php')) {
            // we don't have a page for that!
            throw new PageNotFoundException($page);
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view($page)
            . view('templates/footer');
        //return view('welcome_message');
    }

        
}
