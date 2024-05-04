<div>
    <div class="flex justify-between">
        <h1 class="text-2xl font-bold">Polls</h1>
        <a href="{{route('create-poll')}}" class="btn">Create Polls</a>
    </div>
    <div class="p-3 align-items-center gap-2">
        @forelse ($polls as $poll)
            <div class="p-3 border rounded-lg mb-3">
                <div>
                    <div>
                        <h1 class="text-lg font-semibold">{{$poll->title}}</h1>
                    </div>
                    <div class="flex flex-wrap justify-center"> <!-- Added flex-wrap to wrap options -->
                        @foreach ($poll->options as $key=>$option)
                            <div class="flex items-center mr-3 flex-col"> <!-- Added flex and items-center -->
                                <label for="option_{{$option->id}}" class="text-sm font-thin">{{$option->name}}</label>
                                <button class="btn" wire:click="vote({{$option->id}})">Vote</button>
                                {{$option->votes->count()}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- {{$poll->load('options.votes')}}; --}}
        @empty
            <div class="p-3 border rounded-lg mb-3">
                <h1 class="text-lg font-semibold">No Polls Found</h1>
            </div>
        @endforelse
    </div>
</div>
