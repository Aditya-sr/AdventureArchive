<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Login extends Component
{
    use Actions,WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $loginpage = false;
    public $image;
    public $login;
    public $registration = false;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];

    public function mount()
    {
        $this->registration = true;
        $this->loginpage = false;
    }

    public function update($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $rules = [
            'login.email' => 'required|email',
            'login.password' => 'required',
        ];

        $message = [
            'login.email.required' => 'Please enter your email.',
            'login.email.email' => 'Please enter a valid email address.',
            'login.password.required' => 'Please enter your password.',
        ];
        $this->validate($rules, $message);
        if (Auth::attempt(['email' => $this->login['email'], 'password' => $this->login['password']])) {
            $messagenotification = "You have successfully logged in";
            $this->notification()->success($messagenotification);

            return redirect()->intended('/home');
        } else {
            $message = "Invalid email or password. Please try again.";
            $this->notification()->error($message);
        }
    }

    public function register()
    {
        // dd("Regsitration methode called");s
        $imagePath = null;
        if (isset($this->image)) {
            $imagePath = $this->image->store('journey-image', 'public');
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'profile_image' => $imagePath ?? null, // Store the first image path or null

        ]);
        // Auth::login($user);
        $this->reset(['name', 'email', 'password']);
        $message = "You have successfully registered";
        $this->notification()->success($message);
        // return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.login');
    }

    public function goToRegister()
    {
        $this->registration = true;
        $this->loginpage = false;
        $this->resetValidation();
    }

    public function goToLogin()
    {
        $this->loginpage = true;
        $this->registration = false;
        $this->resetValidation();
    }

    public function testNotification()
    {
        $this->notification()->success(
            $title = 'Test Success',
            $description = 'This is a test notification.'
        );
    }
}
