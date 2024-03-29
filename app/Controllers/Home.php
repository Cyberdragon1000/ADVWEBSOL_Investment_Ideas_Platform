<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException; // for pages unknown

class Home extends BaseController
{
    public function index()
    {
        if (session('user_type')) {
            return redirect()->to('/dashboard');
        }
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

    public function tempideaform($id)
    {
        $page='ideaform';

        $data['title'] = ucfirst($page); // Capitalize the first letter
        $data['ideaid'] = $id;

        return view('templates/header', $data)
            . view('idea_page_edit')
            . view('templates/footer');
    }
        public function tempinvestorform()
    {
        $page='investorform';
        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view('investor_profile_page')
            . view('templates/footer');
    }
    public function faq()
    {
        $page='faq';

        $data['title'] = ucfirst($page); // Capitalize the first letter

        return view('templates/header', $data)
            . view('FAQ/index.php')
            . view('templates/footer');
    }

        
}
