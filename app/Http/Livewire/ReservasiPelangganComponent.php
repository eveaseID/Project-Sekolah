<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use App\Models\Reservasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class ReservasiPelangganComponent extends Component
{

    use WithFileUploads;
    public $id_pelanggan, $id_daftar_paket, $tgl_reservasi_wisata, $harga, $jumlah_peserta, $diskon, $nilai_diskon, $total_bayar, $file_bukti_tf, $status_reservasi_wisata;

    public $paketId;
    public function mount($paketId)
    {
        $this->paketId = $paketId;
    }

    public function updated()
    {
        $daftarPaket = DaftarPaket::find($this->id_daftar_paket);
        if ($daftarPaket) {
            $paketWisata = PaketWisata::find($daftarPaket->id_paket_wisata);
            $this->harga = $daftarPaket->harga_paket;
            $this->diskon = number_format($paketWisata->diskon);
            // $this->jumlah_peserta = $daftarPaket->jumlah_peserta;
            $this->jumlah_peserta;
            if ($this->jumlah_peserta == 0 || $this->jumlah_peserta == null) {
                $this->jumlah_peserta = 1;
            }
            $this->nilai_diskon = ($this->harga * $this->diskon / 100) * $this->jumlah_peserta;
            $this->total_bayar = ($this->harga * $this->jumlah_peserta - $this->nilai_diskon) ;
        } else {
            $this->harga = 0;
            $this->diskon = 0;
            $this->jumlah_peserta = 0;
            $this->nilai_diskon = 0;
            $this->total_bayar = 0;
        }
    }

    public function submit()
    {
        // $fotoName = Carbon::now()->timestamp. '.' .$this->file_bukti_tf->extension();
        // $this->file_bukti_tf->storeAs('reservasi_images', $fotoName);  
        $tanggalNow = Carbon::now();
        $this->tgl_reservasi_wisata = $tanggalNow;
        // dd($tanggalNow);
        $this->validate([
            'id_pelanggan' => 'required',
            'id_daftar_paket' => 'required',
            'tgl_reservasi_wisata' => 'required',
            'harga' => 'required',
            'jumlah_peserta' => 'required',
            'diskon' => 'required',
            'nilai_diskon' => 'required',
            'total_bayar' => 'required',
        ]);
        if ($this->status_reservasi_wisata == null) {
            $this->status_reservasi_wisata = 'pesan';
        };
        Reservasi::create([
            'id_pelanggan' => $this->id_pelanggan,
            'id_daftar_paket' => $this->id_daftar_paket,
            // 'tgl_reservasi_wisata' => $this->tgl_reservasi_wisata,
            'tgl_reservasi_wisata' => $tanggalNow,
            'harga' => $this->harga,
            'jumlah_peserta' => $this->jumlah_peserta,
            'diskon' => $this->diskon,
            'nilai_diskon' => $this->nilai_diskon,
            'total_bayar' => $this->total_bayar,
            // 'file_bukti_tf' => $fotoName,
            'status_reservasi_wisata' => $this->status_reservasi_wisata,
        ]);
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
        redirect()->to('reservasi');
    }

    public function render()
    {
        $userId = Auth::user()->id;
        $pelanggan = Pelanggan::where('id_user', $userId)->get();
        $this->id_pelanggan = $pelanggan[0]->id;
        $daftarPaket = DaftarPaket::all();
        $this->id_daftar_paket = $this->paketId;
        $view = view('livewire.reservasi.reservasiPelanggan', [
            'paketId' => $this->paketId,
            'daftarPaket' => $daftarPaket,
            'pelanggan' =>  $pelanggan
        ])->extends('layouts.blank');

        $this->updated();
        
        return $view;
    }
}
