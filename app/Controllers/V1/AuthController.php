<?php


namespace App\Controllers\V1;

use CodeIgniter\RESTful\ResourcePresenter;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class AuthController extends ResourcePresenter
{
    use ResponseTrait;

    public function register()
    {
        $userModel = new UserModel();
        $rules = $userModel->getRule('register');
        $userModel->setValidationRules($rules);
        $request = $this->request->getJSON();
        $user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirm' => $request->password_confirm
        ];
        if (!$userModel->save($user)) {
            return $this->respond(['messages' => $userModel->errors()], 400);
        }

        return $this->respond(null, 201);
    }

    public function login()
    {
        $users = new UserModel();
        $rules = $users->getRule('login');
        $request = $this->request->getJSON();
        if ($this->validate($rules)) {
            return $this->respond(['messages' => $this->validator->getErrors()], 401);
        }
        $user = $users->where('email', $request->email)->first();
        if ($user || password_verify($request->password, $user['password'])) {
            return $this->respond(null, 201);
        }

        return $this->respond(
            ['messages' => 'The email address or password is incorrect. Please retry!'
            ], 401);
    }
}
