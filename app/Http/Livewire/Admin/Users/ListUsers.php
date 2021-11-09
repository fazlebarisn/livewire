<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
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
        
        $validateData = Validator::make( $this->user,[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);
        
        User::create($validateData);

        $this->dispatchBrowserEvent('hide-form' , ['message' => 'User Added Successfully!']);

        return redirect()->back();

    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users' , compact('users'));
    }
}
