<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class ViewPolls extends Component
{
    public $polls;

    public function __construct() {
        $this->polls = Poll::all();
    }
    public function render()
    {
        return view('livewire.view-polls');
    }
}
