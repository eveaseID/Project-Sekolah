<div>
    <div class="row justify-content-center">
        <div class="text-header mb-5 text-primary">Create Daftar Paket</div>
        <div class="col-md-6">
            <div class="shadow p-4">
                <div class="form-group mb-3">
                    <label class="form-label">Nama Paket</label>
                    <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" wire:model="nama_paket">
                    @error('nama_paket')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group mb-3">
                    <label class="form-label">Paket Wisata</label>
                    <div class="input-group">
                        <input type="text" class="form-control" wire:model="id_paket_wisata" id="id_paket_wisata" hidden>
                        <input type="text" class="form-control rounded-start @error('id_paket_wisata') is-invalid @enderror" wire:model="nm_paket_wisata" placeholder="-- paket wisata --" disabled>
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#createDaftarPaket">Pilih Paket</button>
                        @error('id_paket_wisata')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @include('layouts.components.modal')
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Jumlah Peserta</label>
                    <input type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror" wire:model="jumlah_peserta">
                    @error('jumlah_peserta')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Harga Paket</label>
                    <input type="number" class="form-control @error('harga_paket') is-invalid @enderror" wire:model="harga_paket">
                    @error('harga_paket')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button wire:click="createDaftarPaket" class="btn btn-primary">Submit</button>
                    <button wire:click="closeForm" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
