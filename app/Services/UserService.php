<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{   
    public function all(): Collection
    {
        return User::all();
    }

    public function update(array $input, int $id): void
    {
        $user = User::findOrFail($id);
        $user->update($input);
    }

    public function destroy(int $id): void
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}