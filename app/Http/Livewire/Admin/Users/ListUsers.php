<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ListUsers extends Component
{
    public $user = [];

    public function addNew(){
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser(){

        Validator::make( $this->user,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        dd(1111);

    }

    public function render()
    {
        return view('livewire.admin.users.list-users');
    }
}
