<div>
    <div class="row justify-content-center">
        <div class="text-header mb-5 text-primary">Create Reservasi</div>
        <div class="col-md-9">
            <div class="shadow p-4">

                <div class="form-group mb-3">
                    <label class="form-label">Pelanggan</label>
                    <select wire:model="id_pelanggan" class="form-control @error('id_pelanggan') is-invalid @enderror">
                        <option selected>--</option>
                        @foreach ($pelanggan as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                        @endforeach
                    </select>
                    @error('id_pelanggan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">daftar_paket</label>
                    <select wire:model="id_daftar_paket" class="form-control @error('id_daftar_paket') is-invalid @enderror">
                        <option selected>--</option>
                        @foreach ($daftarPaket as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_paket }}</option>
                        @endforeach
                    </select>
                    @error('id_daftar_paket')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Tanggal Reservasi Wisata</label>
                    <input wire:model="tgl_reservasi_wisata" type="date" class="form-control @error('tgl_reservasi_wisata') is-invalid @enderror">
                    @error('tgl_reservasi_wisata')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Harga</label>
                    <input wire:model="harga" type="text" class="form-control @error('harga') is-invalid @enderror">
                    @error('harga')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Jumlah Peserta</label>
                    <input wire:model="jumlah_peserta" type="number" class="form-control @error('jumlah_peserta') is-invalid @enderror">
                    @error('jumlah_peserta')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Diskon</label>
                    <input wire:model="diskon" type="number" class="form-control @error('diskon') is-invalid @enderror">
                    @error('diskon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Nilai Diskon</label>
                    <input wire:model="nilai_diskon" type="number" class="form-control @error('nilai_diskon') is-invalid @enderror" disabled>
                    @error('nilai_diskon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Total Bayar</label>
                    <input wire:model="total_bayar" type="number" class="form-control @error('total_bayar') is-invalid @enderror" disabled>
                    @error('total_bayar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Foto Bukti Tf</label>
                    <input wire:model="file_bukti_tf" type="file" class="form-control @error('file_bukti_tf') is-invalid @enderror">
                    @error('file_bukti_tf')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <div wire:loading wire:target="file_bukti_tf">Uploading...</div>
                    
                    @if ($file_bukti_tf)
                        <img src="{{ $file_bukti_tf->temporaryUrl() }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Status Reservasi Wisata</label>
                    <select wire:model="status_reservasi_wisata" class="form-control @error('status_reservasi_wisata') is-invalid @enderror">
                        <option selected>--</option>
                        <option value="pesan">Pesan</option>
                        <option value="dibayar">Dibayar</option>
                        <option value="selesai">Selesai</option>
                    </select>
                    @error('status_reservasi_wisata')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>



                <div>
                    <button wire:click="createReservasi" class="btn btn-primary">Submit</button>
                    <button wire:click="closeForm" class="btn btn-danger">Cancel</button>
                </div>

            </div>
        </div>
    </div>
</div>