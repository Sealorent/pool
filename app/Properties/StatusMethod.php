<?php

namespace App\Properties;

class StatusMethod
{
    public static function setStatus($status)
    {
        if ($status == 'POST') {
            return '<span class="badge bg-label-primary">' . $status . '</span>';
        } elseif ($status == 'GET') {
            return  '<span class="badge bg-label-success">' . $status . '</span>';
        } elseif ($status == 'DELETE') {
            return '<span class="badge bg-label-danger">' . $status . '</span>';
        } else {
            return '<span class="badge bg-label-warning">' . $status . '</span>';
        }
    }
}
