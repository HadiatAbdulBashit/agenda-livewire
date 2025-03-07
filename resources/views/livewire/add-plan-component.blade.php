<div class="my-2">
    <form wire:submit='save'>
        <div class="d-flex gap-2">

            <div class="input-group mb-3">
                <input type="text" class="form-control" wire:model.live='task'
                    aria-label="Text input with dropdown button">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    wire:model.live='tag' aria-expanded="false">Tag</button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                </ul>
            </div>
            <div class="">
                <button class="btn btn-success" type="submit"
                    @if ($canSubmit === false) disabled @endif>Tambah</button>
            </div>
        </div>
        <div class="d-flex gap-3">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="priority" id="priority1" value="high"
                    wire:model.live='priority'>
                <label class="form-check-label" for="priority1">
                    High Priority
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="priority" id="priority2" value="medium"
                    wire:model.live='priority'>
                <label class="form-check-label" for="priority2">
                    Medium Priority
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="priority" id="priority2" value='low'
                    wire:model.live='priority'>
                <label class="form-check-label" for="priority2">
                    Low Priority
                </label>
            </div>
        </div>
    </form>
</div>
