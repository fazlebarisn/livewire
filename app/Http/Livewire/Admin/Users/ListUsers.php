<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class ListUsers extends Component
{
    public $user = [];
    public $euser;
    public $showEditModel = false;

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

    }

    public function edit( User $user ){

        $this->showEditModel = true;
        $this->euser = $user;
        $this->user = $user->toArray();
        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser(){

        $validateData = Validator::make( $this->user,[
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->euser->id,
            'password' => 'sometimes|confirmed',
        ])->validate();

        if( !empty( $validateData['password'] )){
            $validateData['password'] = bcrypt($validateData['password']);
        }

        $this->euser->update($validateData);

        $this->dispatchBrowserEvent('hide-form' , ['message' => 'User updated Successfully!']);

    }

    public function render()
    {
        $users = User::latest()->paginate();
        return view('livewire.admin.users.list-users' , compact('users'));
    }
}
