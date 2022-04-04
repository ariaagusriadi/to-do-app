<div>
    <form wire:submit.prevent="update">
        <input type="hidden" name="" wire:model="todoId">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <textarea wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        placeholder="What Your plan today?">
                    </textarea>
                    @error('name')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark btn-sm mt-3">Save</button>
    </form>
</div>
