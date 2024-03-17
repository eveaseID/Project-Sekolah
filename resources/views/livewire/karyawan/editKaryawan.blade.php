<div>
    <div class="row justify-content-center">
        <div class="text-header mb-5 text-primary">Edit Karyawan</div>
        <div class="col-md-6">
            <div class="shadow p-4">
                <div class="form-group mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <input type="text" class="form-control @error('nama_karyawan') is-invalid @enderror" wire:model="nama_karyawan">
                    @error('nama_karyawan')
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
                    <label class="form-label">No HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" wire:model="no_hp">
                    @error('no_hp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Jabatan</label>
                    <select class="form-control  @error('jabatan') is-invalid @enderror" wire:model="jabatan">
                        <option selected>--</option>
                        <option value="administrasi">Administrasi</option>
                        <option value="operator">Operator</option>
                        <option value="pemilik">Pemilik</option>
                    </select>
                    @error('jabatan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Email User</label>
                    <div class="input-group">
                        <input type="text" class="form-control" wire:model="id_user" id="id_user" hidden>
                        <input type="text" class="form-control rounded-start @error('id_user') is-invalid @enderror" wire:model="email_user" placeholder="-- email user --" disabled>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateKaryawan">Pilih Email</button>
                        @error('id_user')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @include('layouts.components.modalKaryawan')
                </div>

                <div>
                    <button wire:click="updateKaryawan" class="btn btn-primary">Save</button>
                    <button wire:click="closeForm" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>