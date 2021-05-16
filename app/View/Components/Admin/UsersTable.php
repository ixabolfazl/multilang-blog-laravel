<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class UsersTable extends Component
{
    public $users;
    public $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($users, $type = 'users')
    {
        $this->users = $users;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.users-table');
    }
}
