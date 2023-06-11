<?php

namespace App\Interfaces;

interface UsersInterface
{
    public function get();
    public function store($request): bool;
    public function edit($id);
    public function update($request, $id): bool;
    public function destroy($id): bool;
    public function getOperator();
}
