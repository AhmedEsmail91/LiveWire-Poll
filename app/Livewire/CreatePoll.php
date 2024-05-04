<?php

namespace App\Livewire;

use App\Models\Poll;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Livewire\Component;

class CreatePoll extends Component
{
    
    
    public $title;
    public $options = []; // initial option is valued with 'First'
    public function render()
    {
        return view('livewire.create-poll');
    }
    public function addOption($option)
    {
        $this->options[] = $option;
    }
    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // re-index the array
    }
    
    public function createPoll()
    {
        $this->validate([
            'title' => 'required',
            'options.*' => 'required'
        ]);
        
        $poll = Poll::create([
            'title' => $this->title,
        ]);
        foreach ($this->options as $option) {
            $poll->options()->create([
                'name' => $option,
            ]);
        }
        $this->reset(); // reset the form (make the values in the inputs empty) in case of spacifing the fields in the reset method, it will reset only the specified fields reset(['title', 'options'])
        
        session()->flash('message', 'Poll created.');
    }

}
