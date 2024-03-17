<div>
    <div class="row justify-content-center">
        <div class="text-header mb-5 text-primary">Create User</div>
        <div class="col-md-6">
            <div class="shadow p-4">
                <div class="form-group mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" wire:model="email">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Level</label>
                    <select class="form-control  @error('level') is-invalid @enderror" wire:model="level">
                        <option selected>--</option>
                        <option value="admin">Admin</option>
                        <option value="operator">operator</option>
                        <option value="pelanggan">pelanggan</option>
                        <option value="pemilik">pemilik</option>
                    </select>
                    @error('level')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label class="form-label">aktif</label>
                    <select class="form-control  @error('aktif') is-invalid @enderror" wire:model="aktif">
                        <option selected>--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                    </select>
                    @error('aktif')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button wire:click="createUser" class="btn btn-primary">Submit</button>
                    <button wire:click="closeForm" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>