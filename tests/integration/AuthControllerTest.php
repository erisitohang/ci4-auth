<?php

use CodeIgniter\Test\FeatureTestCase;
use App\Models\UserModel;

class AuthControllerTest extends FeatureTestCase
{
    public function testRegisterPage()
    {
        $result = $this->withRoutes([])
            ->get('/register');

        $result->assertSee('Register');
        $result->assertSee('E-Mail Address');
        $result->assertSee('Password');
    }

    public function testLoginPage()
    {
        $result = $this->withRoutes([])
            ->get('/login');

        $result->assertOK();
        $result->assertSee('LogIn');
        $result->assertSee('Email');
        $result->assertSee('Password');
    }

    public function testRegisterAndLogin()
    {
        $result = $this->withRoutes([])
            ->post('/register',
                [
                    'name' => 'John Doe',
                    'email' => 'johndoe@example.com',
                    'password' => 'Password1',
                    'password_confirm' => 'Password1'
                ]
            );

        $result->assertOK();

        $model = new UserModel();
        $objects = $model->findAll();
        $this->assertCount(1, $objects);

        $result = $this->withRoutes([])
            ->post('/login',
                [
                    'email' => 'johndoe@example.com',
                    'password' => 'Password1',
                ]
            );
        $result->assertOK();
        $this->assertEquals($result->getRedirectUrl(), site_url('/'));

    }
}
