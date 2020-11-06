<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';

    /**
     * @var string[]
     */
    protected $allowedFields = ['name', 'email', 'password'];

    /**
     * @var \string[][]
     */
    private $rules = [
        'register' => [
            'name' => 'required|min_length[5]',
            'email' => 'trim|required|valid_email|is_unique[users.email]',
            'password' => 'trim|required|min_length[6]|max_length[25]|strong_password',
            'password_confirm' => 'matches[password]'
        ]
    ];

    /**
     * @var string[]
     */
    protected $beforeInsert = ['hashPassword'];

    public function getRule($name)
    {
        return $this->rules[$name];
    }

    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password'])) return $data;
        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        unset($data['data']['password_confirm']);
        return $data;
    }
}
