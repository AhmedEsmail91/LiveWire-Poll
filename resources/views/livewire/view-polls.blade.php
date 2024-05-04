<div>
    <div class="flex justify-between">
        <h1 class="text-2xl font-bold">Polls</h1>
        <a href="{{route('create-poll')}}" class="btn">Create Polls</a>
    </div>
    <div class="p-3 align-items-center gap-2">
        @foreach ($polls as $poll)
            <div class="p-3 border rounded-lg mb-3">
                <div>
                    <div>
                        <h1 class="text-lg font-semibold">{{$poll->title}}</h1>
                    </div>
                    <div class="flex flex-wrap"> <!-- Added flex-wrap to wrap options -->
                        @foreach ($poll->options as $key=>$option)
                            <div class="flex items-center mr-3"> <!-- Added flex and items-center -->
                                <input type="radio" name="{{$option->name}}" id="option_{{$option->id}}" {{$key === 0 ? 'checked' : ''}}>
                                <label for="option_{{$option->id}}" class="text-sm font-thin">{{$option->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
