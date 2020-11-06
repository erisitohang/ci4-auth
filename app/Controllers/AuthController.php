<?php


namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;

class AuthController extends BaseController
{
    /**
     * Access to current session.
     *
     * @var \CodeIgniter\Session\Session
     */
    protected $session;

    public function __construct()
    {
        $this->session = Services::session();
    }

    public function login()
    {
        if ($this->session->isLoggedIn) {
            return redirect('/');
        }

        return view('login');
    }

    public function register()
    {
        if ($this->session->isLoggedIn) {
            return redirect('/');
        }
        return view('register');
    }

    public function storeRegister()
    {
        $userModel = new UserModel();
        $rules = $userModel->getRule('register');
        $userModel->setValidationRules($rules);
        $user = [
            'name'          	=> $this->request->getPost('name'),
            'email'         	=> $this->request->getPost('email'),
            'password'     		=> $this->request->getPost('password'),
            'password_confirm'	=> $this->request->getPost('password_confirm'),
        ];
        if (!$userModel->save($user)) {
            return redirect()->back()->withInput()->with('errors', $userModel->errors());
        }

        return redirect()->to('login')->with('success', 'Registration Successful. Please Login');
    }
}
