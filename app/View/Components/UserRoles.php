<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserRoles extends Component
{
    public $user;
    public $roles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user, $roles)
    {
        $this->user = $user;
        $this->roles = $roles;
    }

    public function userContainsRole($role)
    {
        return $this->user->roles->contains($role);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('admin.users.user-roles');
    }
}
