<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Component;

class ViewPolls extends Component
{
    
    public function render()
    {
        $polls = Poll::with('options.votes')->latest()->get();
        return view('livewire.view-polls', ['polls'=>$polls]);
    }
    public function vote($optionId)
    {
        $poll = Option::findOrFail($optionId)->votes()->create();
        
    }
}
