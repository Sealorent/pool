<?php

namespace App\Properties;

class Role
{
    public static function role($id)
    {
        if ($id == 1) {
            return 'Admin';
        } elseif ($id == 2) {
            return 'Manager';
        } elseif ($id == 3) {
            return 'Officer';
        } elseif ($id == 4) {
            return 'Admin Site';
        } elseif ($id == 5) {
            return 'Operator';
        }
    }
}
