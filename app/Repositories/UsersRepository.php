<?php

namespace App\Repositories;

use App\Interfaces\UsersInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersRepository implements UsersInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get()
    {
        $roleId = Auth::user()->role_id;
        return $this->user->with('role')->whereNotIn('role_id', [$roleId, 5])->get();
    }

    public function store($request): bool
    {
        $this->user->create($request->except('_token'));
        return true;
    }

    public function edit($id)
    {
        return $this->user->with('role')->find($id);
    }

    public function update($request, $id): bool
    {
        $this->user->find($id)->update($request->except('_token', '_method'));
        return true;
    }

    public function destroy($id): bool
    {
        $this->user->destroy($id);
        return true;
    }

    public function getOperator()
    {
        return $this->user->with('role')->where('role_id', 5)->get();
    }
}
