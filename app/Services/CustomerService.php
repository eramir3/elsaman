<?php

namespace App\Services;

use Saman\Models\Customer;
use Illuminate\Database\Eloquent\Collection;

class CustomerService
{   
    public function all(): Collection
    {
        return Customer::all();
    }

    public function update(array $input, int $id): void
    {
        $user = Customer::findOrFail($id);
        $user->update($input);
    }

    public function destroy(int $id): void
    {
        $user = Customer::findOrFail($id);
        $user->delete();
    }
}