<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Welcome extends Component
{
    public $text;

    public function mount(): void
    {
        $this->text  = "HELLO WORLD";
    }
    public function render(): View
    {
        return view('livewire.welcome');
    }
}
