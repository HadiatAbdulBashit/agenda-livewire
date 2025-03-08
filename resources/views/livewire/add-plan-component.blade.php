<div class="my-2">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form wire:submit='save'>
        <div class="d-flex gap-2">
            <div class="input-group">
                <input type="text" class="form-control @error('task') is-invalid @enderror"
                    wire:model.live.debounce.1000='task' aria-label="Agenda yang akan di lakukan"
                    placeholder="Tulis agendamu disini!">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ $tag_id ? $tags->where('id', $tag_id)->first()?->name : 'Tag' }}
                </button>
                <ul class="dropdown-menu">
                    @foreach ($tags as $tag)
                        <li wire:key='{{ $tag->id }}'>
                            <label class="dropdown-item" for="tag{{ $tag->id }}">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input @error('tag_id') is-invalid @enderror"
                                        id="tag{{ $tag->id }}" name="tag_id" value="{{ $tag->id }}"
                                        wire:model.live='tag_id'>
                                    <label class="form-check-label"
                                        for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                </div>
                            </label>
                        </li>
                    @endforeach
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <livewire:add-tag-component>
                    </li>
                </ul>
            </div>
            <div>
                <button
                    class="btn {{ $task === '' || $tag_id === '' || $priority === '' ? 'btn-secondary' : 'btn-success bg-success-subtle text-success-emphasis' }}"
                    type="submit"
                    {{ $task === '' || $tag_id === '' || $priority === '' ? 'disabled' : '' }}>Tambah</button>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            @error('task')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
            @error('tag_id')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-flex gap-3 mt-2">
            <div class="form-check">
                <input class="form-check-input @error('priority') is-invalid @enderror" type="radio" name="priority"
                    id="priority1" value="high" wire:model.live='priority'>
                <label class="form-check-label" for="priority1">
                    High Priority
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('priority') is-invalid @enderror" type="radio" name="priority"
                    id="priority2" value="medium" wire:model.live='priority'>
                <label class="form-check-label" for="priority2">
                    Medium Priority
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input @error('priority') is-invalid @enderror" type="radio" name="priority"
                    id="priority3" value='low' wire:model.live='priority'>
                <label class="form-check-label" for="priority3">
                    Low Priority
                </label>
            </div>
        </div>
        @error('priority')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </form>
</div>
