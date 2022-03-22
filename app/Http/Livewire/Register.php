<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Rules\PhoneNumber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $username;
    public $phone;
    public $gender;
    public $bio;
    public $birth_date;
    public $password;
    public $password_confirmation;
    public bool $stepOne = true;
    public bool $stepTwo;
    public bool $stepThree;

    public function checkStepOne()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)],
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
        ]);

        $this->stepOne = false;
        $this->stepTwo = true;
    }

    public function checkStepTwo()
    {
        $this->validate([
            'phone' => ['required', new PhoneNumber(), 'numeric', Rule::unique(User::class)],
            'bio' => ['required', 'string', 'min:1', 'max:255'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', Rule::in(['male', 'female'])],
        ]);

        $this->stepTwo = false;
        $this->stepThree = true;
    }

    public function backToStepOne()
    {
        $this->stepOne = true;
        $this->stepTwo = false;
    }

    public function backToStepTwo()
    {
        $this->stepTwo = true;
        $this->stepThree = false;
    }

    public function store()
    {
        $this->validate([
            'password' => ['required', 'string', 'confirmed']
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'username' => $this->username,
            'phone' => $this->phone,
            'password' => bcrypt($this->password),
            'bio' => $this->bio,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
