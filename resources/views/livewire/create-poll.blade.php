<div>
    {{-- The whole world belongs to you. --}}
    {{-- Hello From LiveWire --}}
    <form method="GET">
        <label for="title" class="label">Poll Title</label>
        <input id="title" type="text" wire:model.live="title" class="input">
        <button wire:click="increment" class="btn mt-3">+</button> 
        
        <br>

        Counter: {{$counter}}
        <br>
        Current Title: {{$title}}
        
    </form>
</div>
