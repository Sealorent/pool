<?php

namespace App\Repositories;

use App\Interfaces\AktifitasInterface;
use App\Models\LogActivity;

class AktifitasRepository implements AktifitasInterface
{
    private $log;

    function __construct(LogActivity $log)
    {
        $this->log = $log;
    }

    public function get()
    {
        return $this->log->with('user', 'user.role')->orderBy('created_at', 'desc')->get();
    }

    public function destroy($id): bool
    {
        $this->log->find($id)->delete();
        return true;
    }
}
