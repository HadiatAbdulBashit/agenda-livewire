<div class="my-2">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form wire:submit='save'>
        <div class="d-flex gap-2">
            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model.live='task'
                    aria-label="Agenda yang akan di lakukan" placeholder="Tulis agendamu disini!">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{ $tag_id ? $tags->where('id', (int) $tag_id[0])->first()?->name : 'Tag' }}
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <select class="form-select border-0 -my-1" multiple wire:model.live='tag_id'>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}" class="py-1 px-2">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <livewire:add-tag-component>
                    </li>
                </ul>
            </div>
            <div class="">
                <button class="btn btn-success" type="submit" {{ $task === '' ? 'disabled' : '' }}>Tambah</button>
            </div>
        </div>

        @error('task')
            {{ $message }}
        @enderror
        @error('tag_id')
            {{ $message }}
        @enderror
        <div class="d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="priority" id="priority1" value="high"
                    wire:model='priority'>
                <label class="form-check-label" for="priority1">
                    High Priority
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="priority" id="priority2" value="medium"
                    wire:model='priority'>
                <label class="form-check-label" for="priority2">
                    Medium Priority
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="priority" id="priority3" value='low'
                    wire:model='priority'>
                <label class="form-check-label" for="priority3">
                    Low Priority
                </label>
            </div>
        </div>
        @error('priority')
            {{ $message }}
        @enderror
    </form>
</div>
