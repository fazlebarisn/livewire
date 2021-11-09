<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ListUsers extends Component
{
    public $user = [];
    // public $name;

    // protected $rules = [
    //     'user.name' => 'required',
    //     'user.email' => 'required|email',
    //     'user.password' => 'required|confirmed',
    //     'user.password_confirmation' => 'required',
    // ];

    public function addNew(){
        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser(){
        //dd($this->user);
        Validator::make( $this->user,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ])->validate();
        dd(1111);
        //$this->validate();
        
        dd($this->validate());

    }

    public function render()
    {
        return view('livewire.admin.users.list-users');
    }
}
