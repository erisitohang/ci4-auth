<?php namespace App\Controllers;

use CodeIgniter\Session\Session;
use Config\Services;

class Home extends BaseController
{
    /**
     * Access to current session.
     *
     * @var Session
     */
    protected $session;

    public function __construct()
    {
        $this->session = Services::session();
    }

	public function index()
	{
        if (!$this->session->isLoggedIn) {
			return redirect()->to('login');
		}

        return view('welcome_message', [
            'user' => $this->session->user,
        ]);
	}
}
