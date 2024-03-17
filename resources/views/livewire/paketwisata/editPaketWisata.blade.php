<div>
    <div class="row justify-content-center">
        <div class="text-header mb-5 text-primary">Edit Paket Wisata</div>
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
                    <label class="form-label">Deskripsi</label>
                    <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" wire:model="deskripsi">
                    @error('deskripsi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Fasilitas</label>
                    <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" wire:model="fasilitas">
                    @error('fasilitas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">Itinerary</label>
                    <input type="text" class="form-control @error('itinerary') is-invalid @enderror" wire:model="itinerary">
                    @error('itinerary')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">diskon</label>
                    <input type="number" class="form-control @error('diskon') is-invalid @enderror" wire:model="diskon">
                    @error('diskon')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="form-label">foto1</label>
                    <input type="file" class="form-control @error('new_foto1') is-invalid @enderror" wire:model="new_foto1">
                    @error('new_foto1')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div wire:loading wire:target="new_foto1">
                        uploading...
                    </div>

                    @if ($new_foto1)
                        <img src="{{ $new_foto1->temporaryUrl() }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @else
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto1 }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @endif

                </div>
                <div class="form-group mb-3">
                    <label class="form-label">foto2</label>
                    <input type="file" class="form-control @error('new_foto2') is-invalid @enderror" wire:model="new_foto2">
                    @error('new_foto2')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div wire:loading wire:target="new_foto2">
                        uploading...
                    </div>

                    @if ($new_foto2)
                        <img src="{{ $new_foto2->temporaryUrl() }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @else
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto2 }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @endif

                </div>
                <div class="form-group mb-3">
                    <label class="form-label">foto3</label>
                    <input type="file" class="form-control @error('new_foto3') is-invalid @enderror" wire:model="new_foto3">
                    @error('new_foto3')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div wire:loading wire:target="new_foto3">
                        uploading...
                    </div>

                    @if ($new_foto3)
                        <img src="{{ $new_foto3->temporaryUrl() }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @else
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto3 }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @endif

                </div>
                <div class="form-group mb-3">
                    <label class="form-label">foto4</label>
                    <input type="file" class="form-control @error('new_foto4') is-invalid @enderror" wire:model="new_foto4">
                    @error('new_foto4')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div wire:loading wire:target="new_foto4">
                        uploading...
                    </div>

                    @if ($new_foto4)
                        <img src="{{ $new_foto4->temporaryUrl() }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @else
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto4 }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @endif

                </div>
                <div class="form-group mb-3">
                    <label class="form-label">foto5</label>
                    <input type="file" class="form-control @error('new_foto5') is-invalid @enderror" wire:model="new_foto5">
                    @error('new_foto5')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                    <div wire:loading wire:target="new_foto5">
                        uploading...
                    </div>

                    @if ($new_foto5)
                        <img src="{{ $new_foto5->temporaryUrl() }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @else
                        <img src="{{ asset('uploads/paketWisata_images') }}/{{ $old_foto5 }}" class="mt-2" style="width: 100px; height: 100px; object-fit: cover">
                    @endif

                </div>

                <div>
                    <button wire:click="updatePaketWisata" class="btn btn-primary">Submit</button>
                    <button wire:click="closeForm" class="btn btn-danger">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>