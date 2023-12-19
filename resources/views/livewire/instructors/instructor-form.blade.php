<div>
    <div class="card">
        <div class="card-header">
            <h2>{{ __("Instructor Form") }}</h2>
        </div>
        <div class="card-body">
            <form wire:submit="save" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input wire:model="name" type="text" class="form-control" id="name" >
                    @error('name') <span class="d-flex bg-light text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="father_name" class="form-label">Father's Name</label>
                    <input wire:model="father_name" type="text" class="form-control" id="father_name" >
                    @error('father_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input wire:model="position" type="text" class="form-control" id="position" >
                    @error('position') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="phone_number" class="form-label">Phone Number</label>
                    <input wire:model="phone_number" type="text" class="form-control" id="phone_number" >
                    @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input wire:model="email" type="email" class="form-control" id="email" >
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label for="photo_url" class="form-label">Photo</label>
                    <input wire:model="photo_url" type="file" class="form-control" id="photo_url">
                    @error('photo_url') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    @if ($instructor->photo_url || $photo_url)
                        <div style="position: relative; max-width: min-content;">
                            <button type="button" class="badge text-bg-danger rounded-circle" wire:click="removePic()" style="position: absolute; top: 5px; right: 5px;">X</button>
                            <img class="rounded" style="max-width: 150px" src="{{ $photo_url?->temporaryUrl() ?? asset('storage' . $instructor->photo_url) }}">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">{{ __("Save") }}</button>
            </form>
        </div>
    </div>

</div>
