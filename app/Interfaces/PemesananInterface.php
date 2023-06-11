<?php

namespace App\Interfaces;

interface PemesananInterface
{
    public function get();
    public function store($request): bool;
    public function update($request, $id): bool;
    public function getHistory($request);
}
