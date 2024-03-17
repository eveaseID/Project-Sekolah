<?php

namespace App\Http\Livewire\Reservasi;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pelanggan;
use App\Models\Reservasi;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use PDF;

class ReservasiComponent extends Component
{

    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $id_pelanggan, $id_daftar_paket, $tgl_reservasi_wisata, $harga, $jumlah_peserta, $diskon, $nilai_diskon, $total_bayar, $file_bukti_tf, $status_reservasi_wisata;

    public $componentType = 'LIST';

    public function resetInput()
    {
        $this->id_pelanggan = null;
        $this->id_daftar_paket = null;
        $this->tgl_reservasi_wisata = null;
        $this->harga = null;
        $this->jumlah_peserta = null;
        $this->diskon = null;
        $this->nilai_diskon = null;
        $this->total_bayar = null;
        $this->file_bukti_tf = null;
        $this->status_reservasi_wisata = null;
    }

    public function closeForm()
    {
        $this->componentType = "LIST";
        $this->resetInput();
    }

    public $rules = [
        'id_pelanggan' => 'required',
        'id_daftar_paket' => 'required',
        'tgl_reservasi_wisata' => 'required',
        'harga' => 'required',
        'jumlah_peserta' => 'required',
        'diskon' => 'required',
        'nilai_diskon' => 'required',
        'total_bayar' => 'required',
        'file_bukti_tf' => 'required',
        'status_reservasi_wisata' => 'required',
    ];

    public function updating()
    {
        $this->id_pelanggan;
        $this->id_daftar_paket;
        $this->tgl_reservasi_wisata;
        $this->harga;
        $this->jumlah_peserta;
        $this->diskon;
        $this->nilai_diskon;
        $this->total_bayar;
        $this->file_bukti_tf;
        $this->status_reservasi_wisata;    
    }

    public function updated()
    {

        if ($this->diskon > 100) {
            $this->diskon = 100;
        }

        if ($this->harga && $this->jumlah_peserta && $this->diskon) {
            $this->nilai_diskon = $this->harga * $this->diskon/100;
            $this->total_bayar = ($this->harga - $this->nilai_diskon) * $this->jumlah_peserta;
        } else {
            $this->nilai_diskon = 0;

            if ($this->harga && $this->jumlah_peserta) {
                $this->total_bayar = $this->harga * $this->jumlah_peserta;
            } else {
                $this->total_bayar = 0;
            }
        }
    }

    // ! ================================================================= CREATE

    public function addForm()
    {
        $this->componentType = "ADD";
    }

    public function createReservasi()
    {
        $this->validate();

        $fotoName = Carbon::now()->timestamp. '.' .$this->file_bukti_tf->extension();
        $this->file_bukti_tf->storeAs('reservasi_images', $fotoName);        

        Reservasi::create([
            'id_pelanggan' => $this->id_pelanggan,
            'id_daftar_paket' => $this->id_daftar_paket,
            'tgl_reservasi_wisata' => $this->tgl_reservasi_wisata,
            'harga' => $this->harga,
            'jumlah_peserta' => $this->jumlah_peserta,
            'diskon' => $this->diskon,
            'nilai_diskon' => $this->nilai_diskon,
            'total_bayar' => $this->total_bayar,
            'file_bukti_tf' => $fotoName,
            'status_reservasi_wisata' => $this->status_reservasi_wisata,
        ]);

        $this->componentType = "LIST";
        $this->resetInput();
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }

    // ! ==================================================================== UPDATE

    public $editReservasiId, $old_foto, $new_foto;

    public function editForm($id)
    {
        $this->componentType = "EDIT";

        $reservasi = Reservasi::find($id);

        if ($reservasi) {
            $this->editReservasiId = $id;
            $this->id_pelanggan = $reservasi->id_pelanggan;
            $this->id_daftar_paket = $reservasi->id_daftar_paket;
            $this->tgl_reservasi_wisata = $reservasi->tgl_reservasi_wisata;
            $this->harga = $reservasi->harga;
            $this->jumlah_peserta = $reservasi->jumlah_peserta;
            $this->diskon = $reservasi->diskon;
            $this->nilai_diskon = $reservasi->nilai_diskon;
            $this->total_bayar = $reservasi->total_bayar;
            $this->old_foto = $reservasi->file_bukti_tf;
            $this->status_reservasi_wisata = $reservasi->status_reservasi_wisata;    
        }
    }

    public function updateReservasi()
    {
        
        $this->validate([
            'id_pelanggan' => 'required',
            'id_daftar_paket' => 'required',
            'tgl_reservasi_wisata' => 'required',
            'harga' => 'required',
            'jumlah_peserta' => 'required',
            'diskon' => 'required',
            'nilai_diskon' => 'required',
            'total_bayar' => 'required',
            'status_reservasi_wisata' => 'required',
            ]);
        

        if ($this->new_foto) {
            $fotoName = Carbon::now()->timestamp. '.' .$this->new_foto->extension();
            $this->new_foto->storeAs('reservasi_images', $fotoName);  
            // unlink(public_path('uploads/reservasi_images/'.$this->old_foto));
        } else {
            $fotoName = $this->old_foto;
        }

        Reservasi::find($this->editReservasiId)->update([
            'id_pelanggan' => $this->id_pelanggan,
            'id_daftar_paket' => $this->id_daftar_paket,
            'tgl_reservasi_wisata' => $this->tgl_reservasi_wisata,
            'harga' => $this->harga,
            'jumlah_peserta' => $this->jumlah_peserta,
            'diskon' => $this->diskon,
            'nilai_diskon' => $this->nilai_diskon,
            'total_bayar' => $this->total_bayar,
            'file_bukti_tf' => $fotoName,
            'status_reservasi_wisata' => $this->status_reservasi_wisata,
        ]);

        $this->componentType = "LIST";
        $this->resetInput();
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }


    // ! ==================================================================== DELETE

    public $deletedId;
    public function deleteReservasi($id)
    {
        $this->deletedId = $id;
        
        $this->dispatchBrowserEvent('showDeleteAlert');
    }

    public $listeners = ['removeReservasi', 'updatedDaftarPaket'];

    public function removeReservasi()
    {
        $reservasi = Reservasi::find($this->deletedId);
        // unlink(public_path('uploads/reservasi_images/'.$reservasi->file_bukti_tf));
        $reservasi->delete();
    }

    public function printPdf()
    {   
        // $reservasi = Reservasi::all();
        $reservasi = Reservasi::where('status_reservasi_wisata', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->get();
        $pdf = PDF::loadview('livewire.reservasi.reservasi_pdf',['reservasi' => $reservasi]);
    	// return $pdf->download('laporan-reservasi-pdf.pdf');
        return view('livewire.reservasi.reservasi_pdf',['reservasi' => $reservasi]);
    }

    public function updatedDaftarPaket()
    {
        dd('test');
        $paketSelected = DaftarPaket::where('id', $this->id_daftar_paket)->get();
        dd($paketSelected);
    }

    public function render()
    {
        $user = Auth::user();
        if ($user->level == 'pelanggan') {
            $pelanggan = Pelanggan::where('id_user',$user->id)->get();
            $daftarPaket = DaftarPaket::all();
            // $reservasi = Reservasi::where('id_pelanggan', 'like', '%'.$this->search.'%')->orWhere('status_reservasi_wisata', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
            $reservasi = Reservasi::where('id_pelanggan', $pelanggan[0]->id)->get();
            return view('livewire.reservasi.reservasi-component', [
                'reservasi' => $reservasi,
                'pelanggan' => $pelanggan,
                'daftarPaket' => $daftarPaket,
            ])->extends('layouts.app');
        }


        $pelanggan = Pelanggan::all();
        $daftarPaket = DaftarPaket::all();
        // $reservasi = Reservasi::where('id_pelanggan', 'like', '%'.$this->search.'%')->orWhere('status_reservasi_wisata', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
        $reservasi = Reservasi::where('id_pelanggan', 'like', '%'.$this->search.'%')->orWhere('status_reservasi_wisata', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.reservasi.reservasi-component', [
            'reservasi' => $reservasi,
            'pelanggan' => $pelanggan,
            'daftarPaket' => $daftarPaket,
        ])->extends('layouts.app');
    }
}
