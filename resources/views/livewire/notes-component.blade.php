<div>
    <div class="container">
        <button type="button" class="btn btn-primary" wire:click="create">
            Create Notes
        </button>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($isOpen)
            <div class="modal fade show" tabindex="-1" aria-labelledby="notesModalLabel" style="display: block">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form wire:submit.prevent="{{ $noteId ? 'update' : 'store' }}">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="notesModalLabel">
                                    {{ $noteId ? 'Edit Post' : 'Create Post' }}
                                </h1>
                                <button type="button" class="btn-close" wire:click="closeModal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" wire:model="title" class="form-control" id="title"
                                        placeholder="Enter post title">
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="body">Post Body</label>
                                    <textarea wire:model="body" class="form-control" id="body" rows="4" placeholder="Enter post body"></textarea>

                                    <span class="text-danger">
                                        @error('body')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ $noteId ? 'Update' : 'Create' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-backdrop fade show"></div>
        @endif
        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Body</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            @forelse ($notes as $note)
                <tbody wire:key="{{ $note->id }}">
                    <tr class="{{ $note->isFinish ? 'opacity-25' : '' }}">
                        <th scope="row">{{ $note->id }}</th>
                        <td> {{ $note->title }}</td>
                        <td> {{ $note->body }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="done({{ $note->id }})">
                                <i class="bi bi-pen"></i>
                            </button>
                            <span class="cursor-pointer" wire:click="edit({{ $note->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-pencil cursor-pointer" viewBox="0 0 16 16">
                                    <path
                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                </svg>
                            </span>
                            <span class="cursor-pointer" wire:click="delete({{ $note->id }})"
                                onclick="return confirm('Are you sure you want to delete this item?') || event.stopImmediatePropagation()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path
                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                    <path
                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                </svg>
                            </span>
                        </td>
                    </tr>
                </tbody>
            @empty
                <p>No note found</p>
            @endforelse
        </table>
        {{ $notes->links() }}
    </div>
</div>
