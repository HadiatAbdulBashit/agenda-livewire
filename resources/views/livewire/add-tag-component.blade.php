<div>
    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#addTag">
        Add Tag
    </button>

    @teleport('body')
        <div class="modal fade" id="addTag" tabindex="-1" aria-labelledby="addTagLabel" aria-hidden="true" wire:ignore.self>
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <form wire:submit='save'>
                            <label for="tag" class="form-label fs-4 text-center d-block">Tambah Tag
                                Disini</label>
                            <div class="d-flex gap-2">
                                <div>
                                    <input type="text"
                                        class="form-control @error('nameTag')
                                            is-invalid
                                        @enderror"
                                        wire:model='nameTag' id="tag" aria-describedby="tagFeedback">
                                    @error('nameTag')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit"
                                        class="btn btn-success bg-success-subtle text-success-emphasis">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endteleport

    {{-- @script --}}
    <script>
        window.addEventListener('closeModal', (event) => {
            const modalId = event.detail;
            const modal = document.getElementById(modalId);
            modal.classList.remove('show');
            modal.setAttribute('aria-hidden', 'true');
            modal.setAttribute('style', 'display: none');
            modal.removeAttribute('aria-modal');
            modal.removeAttribute('role');
            const body = document.body;
            body.classList.remove('modal-open')
            body.setAttribute('style', '');

            const modalsBackdrops = document.getElementsByClassName('modal-backdrop');
            document.body.removeChild(modalsBackdrops[0]);
        })
    </script>
    {{-- @endscript --}}
</div>
