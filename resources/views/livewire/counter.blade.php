<div>
    @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif
    <h1 class="text-primary">Your count is: {{ $count }}</h1>
    <button wire:click="increment" class="btn btn-primary">Incrementing</button>
    <button wire:click="decrement" class="btn btn-secondary">Decrementing</button>
</div>
