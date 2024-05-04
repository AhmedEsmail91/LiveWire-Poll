<div>
    {{-- The whole world belongs to you. --}}
    {{-- Hello From LiveWire --}}
    <form wire:submit.prevent="createPoll" action="{{route('home')}}">
        <label for="title" class="label">Poll Title</label> 
        <input id="title" name="P-title" type="text" wire:model.live="title" class="input">
        @error('title')
                            <div class="alert alert-danger text-red-500">{{ $message }}</div>
        @enderror
            <br>
        
            {{-- wire:click.prevent --> this means adding a callable method, and keyword prevent which is from  Event Modifiers --}}
            Current Title: <p>{{$title}}</p>
            <button class="btn mt-3" wire:click.prevent="addOption('')">Add Option</button>
        
        <div>
            @foreach ($options as $index=>$option)
                    <div class="p-3 align-items-center gap-2">
                        <div>
                            <label>Option {{$index+1}}</label>
                        </div>
                        <div class="flex">
                            <input type="text" wire:model.live="options.{{$index}}" name="options.{{$index}}">
                            
                            
                            <button class="btn ml-2" wire:click.prevent="removeOption({{$index}})">Remove</button> 
                            
                        </div>
                        @foreach ($errors->get('options.'.$index) as $message)
                            <div class="alert alert-danger text-red-500">{{ $message }}</div>@endforeach  
                            
                    </div> 
                    
            @endforeach
        </div>
        @foreach ($errors->get('options') as $message)
                            <div class="alert alert-danger text-red-500">{{ $message }}</div>@endforeach 
        <div class="flex w-full" style="justify-content: end">
            <button class="btn mt-3" wire:click.prevent="createPoll">Create Poll</button>
        </div>
    </form>
</div>
