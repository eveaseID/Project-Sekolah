<div>
    <div class="row justify-content-center">
        <div class="text-header mb-5 text-primary">Detail Paket Wisata</div>
        <div class="col-md-6">
            <div class="shadow p-4">
                <div class="form-group mb-3">
                    <label class="form-label">Nama Paket</label>
                    <input type="text" class="form-control @error('nama_paket') is-invalid @enderror" readonly
                        wire:model="nama_paket">
                    @error('nama_paket')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" readonly
                        wire:model="deskripsi">
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Fasilitas</label>
                    <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" readonly
                        wire:model="fasilitas">
                    @error('fasilitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Itinerary</label>
                    <input type="text" class="form-control @error('itinerary') is-invalid @enderror" readonly
                        wire:model="itinerary">
                    @error('itinerary')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">diskon</label>
                    <input type="number" class="form-control @error('diskon') is-invalid @enderror" readonly
                        wire:model="diskon">
                    @error('diskon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3 d-flex flex-wrap justify-content-center align-content-center">
                    <div class="photo-group d-flex">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto1 }}" class="mt-2"
                        style="width: 100px; height: 100px; object-fit: cover">
                        <label class="form-label">foto1</label>
                    </div>

                    <div class="photo-group d-flex">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto2 }}" class="mt-2"
                        style="width: 100px; height: 100px; object-fit: cover">
                        <label class="form-label">foto2</label>
                    </div>

                    <div class="photo-group d-flex">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto3 }}" class="mt-2"
                        style="width: 100px; height: 100px; object-fit: cover">
                        <label class="form-label">foto3</label>
                    </div>

                    <div class="photo-group d-flex">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto4 }}" class="mt-2"
                        style="width: 100px; height: 100px; object-fit: cover">
                        <label class="form-label">foto4</label>
                    </div>

                    <div class="photo-group d-flex">
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto5 }}" class="mt-2"
                        style="width: 100px; height: 100px; object-fit: cover">
                        <label class="form-label">foto5</label>
                    </div>
                </div>

                <div>
                    <button wire:click="closeForm" class="btn btn-secondary">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
