<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePoll extends Component
{
    
    public $counter=0;
    public $title="";
    
    public function render()
    {
        return view('livewire.create-poll');
    }
    public function increment()
    {
        $this->counter++;
    }
}
