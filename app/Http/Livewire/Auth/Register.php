<?php

namespace App\Http\Livewire\Auth;

use Hash;
use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name                  = "";
    public $email                 = "";
    public $password              = "";
    public $password_confirmation = "";

    protected $rules = [
        'name'     => 'required|min:6',
        'email'    => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ];

    public function updatedName()
    {
        $this->validate([ 'name' => 'required' ]);
    }

    public function updatedEmail()
    {
        $this->validate([ 'email' => 'required|email|unique:users' ]);
    }

    public function updatedPassword()
    {
        $this->validate([ 'password' => 'required|min:6' ]);
    }
    public function updatedPasswordConfirmation()
    {
        $this->validate([ 'password_confirmation' => 'required|same:password' ]);
    }

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        auth()->login($user);

        return redirect('/success');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
