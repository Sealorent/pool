<?php

namespace App\Interfaces;

interface PemakaianInterface
{
    public function get();
    public function getHistory($request);
}
