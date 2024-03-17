<div>
    <div class="row justify-content-center">
        <div class="text-header mb-5 text-primary">Create Pelanggan</div>
        <div class="col-md-6">
            <div class="shadow p-4">
                <div class="form-group mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" wire:model="nama_lengkap">
                    @error('nama_lengkap')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">No HP</label>
                    <input type="number" class="form-control @error('no_hp') is-invalid @enderror" wire:model="no_hp">
                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" wire:model="alamat">
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" wire:model="foto">
                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div wire:loading wire:target="foto">
                        uploading...
                    </div>

                    @if ($foto)
                        <img src="{{ $foto->temporaryUrl() }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @endif

                </div>
                <div class="form-group mb-3">
                    <label class="form-label">User</label>
                    <select class="form-control  @error('id_user') is-invalid @enderror" wire:model="id_user">
                        <option selected>--</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}">{{ $item->email }}</option>
                        @endforeach
                    </select>
                    @error('id_user')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button wire:click="createPelanggan" class="btn btn-primary">Submit</button>
                    <button wire:click="closeForm" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>