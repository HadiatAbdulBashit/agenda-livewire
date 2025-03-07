<div>
    <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Tag
    </button>

    @teleport('body')
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
            wire:ignore>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <form wire:submit='save'>
                            <label for="validationServer05" class="form-label fs-4 text-center d-block">Tambah Tag
                                Disini</label>
                            <div class="input-group has-validation">
                                <div class="d-flex gap-2">

                                    <div>
                                        <input type="text"
                                            class="form-control @error('name')
                                            is-invalid
                                        @enderror"
                                            wire:model='name' id="validationServer05"
                                            aria-describedby="validationServer05Feedback">
                                        <div id="validationServer05Feedback" class="invalid-feedback">
                                            Please provide a valid zip.
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <div class="invalid-feedback" id="tagNameFeedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endteleport
</div>
