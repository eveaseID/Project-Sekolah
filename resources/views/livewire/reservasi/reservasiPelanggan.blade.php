{{-- 
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Reservasi</div>
                    <div class="card-body">
                        <div class="form-group mb-2">
                            <div class="label-form">Email</div>
                            <input type="text" class="form-control" value={{ $user }} disabled>
                        </div>
                        <div class="form-group mb-2">
                            <div class="label-form">Paket</div>
                            <select wire:model="id_daftar_paket" wire:change="harga" class="form-control">
                                <option>--</option>
                                @forelse ($daftarPaket as $paket)
                                    <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                                @empty
                                    <option>No Option</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <div class="label-form">Tanggal</div>
                            <input type="date" class="form-control" wire:model="tgl_reservasi_wisata">
                        </div>
                        <div class="form-group mb-2">
                            <div class="label-form">Harga</div>
                            <input type="number" class="form-control" wire:model="harga">
                        </div>
                        <div class="form-group mb-2">
                            <div class="label-form">Jumlah Peserta</div>
                            <input type="number" class="form-control" wire:model="jumlah_peserta">
                        </div>
                        <div class="form-group mb-2">
                            <div class="label-form">Diskon</div>
                            <input type="number" class="form-control" wire:model="diskon">
                        </div>
                        <div class="form-group mb-2">
                            <div class="label-form">Nilai Diskon</div>
                            <input type="number" class="form-control" wire:model="nilai_diskon">
                        </div>
                        <div class="form-group mb-2">
                            <div class="label-form">Total Bayar</div>
                            <input type="number" class="form-control" wire:model="total_bayar">
                        </div>
                        <div class="form-group mb-2">
                            <div class="label-form">File Bukti Transfer</div>
                            <input type="file" class="form-control" wire:model="file_bukti_tf">
                        </div>
                        <div class="form-group mt-4">
                            <button class="btn btn-primary">Pesan</button>
                            <button class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <form wire:submit.prevent="submit" method="POST">
            <div class="formbold-mb-5">
              <label for="id_pelanggan" class="formbold-form-label"> Pelanggan </label>
              {{-- <input
                type="text"
                wire:model="id_pelanggan"
                id="id_pelanggan"
                readonly
                placeholder="Pelanggan"
                class="formbold-form-input"
              /> --}}
              <select readonly wire:model="id_pelanggan" class="formbold-form-input">
                <option>--</option>
                @foreach ($pelanggan as $item)
                    <option value="{{ $id_pelanggan }}">{{ $item->nama_lengkap }}</option>
                @endforeach
              </select>
            </div>
            <div class="formbold-mb-5">
              <label for="id_daftar_paket" class="formbold-form-label"> Daftar Paket </label>
              <select readonly wire:model="id_daftar_paket"  class="formbold-form-input">
                <option>--</option>
                @foreach ($daftarPaket as $paket)
                    <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                @endforeach
              </select>
            </div>
            {{-- <div class="formbold-mb-5">
              <label for="tgl_reservasi_wisata" class="formbold-form-label"> Tanggal Reservasi </label>
              <input
                type="date"
                wire:model="tgl_reservasi_wisata"
                id="tgl_reservasi_wisata"
                class="formbold-form-input"
              />
            </div> --}}
            <div class="flex flex-wrap formbold--mx-3">
              <div class="w-full sm:w-half formbold-px-3">
                <div class="formbold-mb-5 w-full">
                  <label for="harga" class="formbold-form-label"> Harga </label>
                  <input
                    type="text"
                    wire:model="harga"
                    id="harga"
                    class="formbold-form-input"
                    placeholder="0"
                    readonly
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                  />
                </div>
              </div>
              <div class="w-full sm:w-half formbold-px-3">
                <div class="formbold-mb-5">
                  <label for="jumlah_peserta" class="formbold-form-label"> Jumlah Peserta </label>
                  <input
                    type="number"
                    wire:model="jumlah_peserta"
                    id="jumlah_peserta"
                    class="formbold-form-input"
                    placeholder="0"
                    min="1"
                    {{-- readonly --}}
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                  />
                </div>
              </div>
            </div>
      
            <div class="formbold-mb-5 formbold-pt-3">
              <div class="flex flex-wrap formbold--mx-3">
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                  <label for="diskon" class="formbold-form-label"> Diskon </label>
                    <input
                      type="text"
                      wire:model="diskon"
                      id="diskon"
                      placeholder="0"
                      readonly
                      class="formbold-form-input"
                      oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                    />
                  </div>
                </div>
                <div class="w-full sm:w-half formbold-px-3">
                  <div class="formbold-mb-5">
                  <label for="nilai_diskon" class="formbold-form-label"> Nilai Diskon </label>
                  <input
                      type="text"
                      wire:model="nilai_diskon"
                      id="nilai_diskon"
                      placeholder="0"
                      readonly
                      class="formbold-form-input"
                      oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                    />
                  </div>
                </div>
              </div>
              <div class="formbold-mb-5">
                <label for="total_bayar" class="formbold-form-label"> Total Bayar </label>
                <input
                  type="text"
                  wire:model="total_bayar"
                  id="total_bayar"
                  placeholder="0"
                  readonly
                  class="formbold-form-input"
                  oninput="this.value = this.value.replace(/[^0-9]/g, '')" 
                />
              </div>
            </div>
      
            <div>
              <button class="formbold-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }
        body {
          font-family: "Inter", Arial, Helvetica, sans-serif;
          background: white;
        }
        .formbold-mb-5 {
          margin-bottom: 20px;
        }
        .formbold-pt-3 {
          padding-top: 12px;
        }
        .formbold-main-wrapper {
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 48px;
        }
      
        .formbold-form-wrapper {
          margin: 0 auto;
          max-width: 550px;
          width: 100%;
          background: white;
        }
        .formbold-form-label {
          display: block;
          font-weight: 500;
          font-size: 16px;
          color: #07074d;
          margin-bottom: 12px;
        }
        .formbold-form-label-2 {
          font-weight: 600;
          font-size: 20px;
          margin-bottom: 20px;
        }
      
        .formbold-form-input {
          width: 100%;
          padding: 12px 24px;
          border-radius: 6px;
          border: 1px solid #e0e0e0;
          background: white;
          font-weight: 500;
          font-size: 16px;
          color: #6b7280;
          outline: none;
          resize: none;
        }
        .formbold-form-input:focus {
          border-color: #6a64f1;
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
      
        .formbold-btn {
          text-align: center;
          font-size: 16px;
          border-radius: 6px;
          padding: 14px 32px;
          border: none;
          font-weight: 600;
          background-color: #6a64f1;
          color: white;
          width: 100%;
          cursor: pointer;
        }
        .formbold-btn:hover {
          box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }
      
        .formbold--mx-3 {
          margin-left: -12px;
          margin-right: -12px;
        }
        .formbold-px-3 {
          padding-left: 12px;
          padding-right: 12px;
        }
        .flex {
          display: flex;
        }
        .flex-wrap {
          flex-wrap: wrap;
        }
        .w-full {
          width: 100%;
        }
        @media (min-width: 540px) {
          .sm\:w-half {
            width: 50%;
          }
        }
      </style>
      