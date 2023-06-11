<?php

namespace App\Properties;

use App\Interfaces\CustomLogger;
use App\Models\LogActivity as ModelsLogActivity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LogActivity
{

    public static function info($activity)
    {
        ModelsLogActivity::create([
            'user_id' => Auth::user()->id,
            'subject' => $activity,
            'ip' => request()->ip(),
            'user_agent' => Request::header('user-agent'),
            'url' => request()->fullUrl(),
            'method' => request()->method(),
            'user_id' => Auth::user()->id,
        ]);
    }
}
