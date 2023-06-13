<?php

namespace App\Interfaces;

interface AktifitasInterface
{
    public function get();
    public function destroy($id): bool;
}
