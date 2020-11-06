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

    public function postLogin()
    {
        if ($this->session->isLoggedIn) {
            return redirect('/');
        }

        $userModel = new UserModel();
        $rules = $userModel->getRule('login');
        if (! $this->validate($rules)) {
            return redirect()->to('login')
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $users = new UserModel();
        $user = $users->where('email', $this->request->getPost('email'))->first();

        if (!$user || !password_verify($this->request->getPost('password'), $user['password'])) {
            return redirect()->to('login')->withInput()->with(
                'error',
                'The email address or password is incorrect. Please retry!'
            );
        }
        $this->session->set('isLoggedIn', true);
        $this->session->set('user', [
            'id' 			=> $user['id'],
            'name' 			=> $user['name'],
            'email' 		=> $user['email']
        ]);
        return redirect('/');
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

    public function logout()
    {
        $this->session->remove(['isLoggedIn', 'userData']);
        return redirect()->to('login');
    }
}
