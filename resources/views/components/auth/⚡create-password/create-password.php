<?php

use Livewire\Component;
use Livewire\Attributes\Validate;

new class extends Component
{

    #[Validate([
        'required',
        'min:8',
        'max:16',
        'regex:/[a-z]/',
        'regex:/[A-Z]/',
        'regex:/^[\pL\pN\pP\pS]+$/u'
    ], message: [
        'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, and only letters, numbers, or common punctuation.'
    ])]
    public $password;

    public function signUp(): void
    {
        $this->validate();

        $this->dispatch('password-set', $this->password);

        $this->password = '';
    }
};
