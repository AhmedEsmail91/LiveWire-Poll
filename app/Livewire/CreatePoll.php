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
    private $options_chars_num=12;
    public $rules=[
        'title' => 'required|min:5|max:255',
        'options' => ['required', 'array', 'min:1', 'max:4'],
        'options.*' => "required|min:12|max:150"
        // this rule is applied to all the options in the array of options means that the name of the option is required
    ];
    
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
    // the function updated is used to validate the input fields when the user types in the input field. auto rendering the error message.
    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    protected $messages = [
        'title.required' => 'Title cannot be empty.',
        'title.min' => 'Title must be at least 5 characters.',
        'title.max' => 'Title must not be greater than 255 characters.',
        'options.*.required' => 'Option cannot be empty.',
        'options.*.min' => "Option must be at least 12 character.",
        'options.*.max' => 'Option must not be greater than 150 characters.',
    ];
    public function createPoll()
    {
        $this->validate($this->rules);
        
        $poll = Poll::create([
            'title' => $this->title,
        ])->options()->createMany( //new method to create many records
            collect($this->options)
                ->map(fn($option) => ['name' => $option])
                ->all() 
            // map the options to an array of options with the key 'name' and the value of the option.
            // the all() method is used to convert the collection to an array.
        );

        // refactored code
        // foreach ($this->options as $option) {
        //     $poll->options()->create([
        //         'name' => $option,
        //     ]);
        // }
        $this->reset(); // reset the form (make the values in the inputs empty) in case of spacifing the fields in the reset method, it will reset only the specified fields reset(['title', 'options'])
        
        session()->flash('message', 'Poll created.');
    }

}
