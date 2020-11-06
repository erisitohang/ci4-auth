<?php
namespace App\Validations;

class CustomRules
{
    public function strong_password(string $password, string &$error = null): bool
    {
        if (preg_match('#[0-9]#', $password) && preg_match('#[a-zA-Z]#', $password)) {
            return TRUE;
        }
        $error = ' Password must contain one uppercase, lowercase and number';
        return FALSE;
    }
}
