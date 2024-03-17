<?php

namespace App\Http\Livewire\Daftarpaket;

use Livewire\Component;
use App\Models\DaftarPaket;
use App\Models\PaketWisata;
use Livewire\WithPagination;
use PDF;

class DaftarPaketComponent extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $nama_paket, $id_paket_wisata, $jumlah_peserta, $harga_paket, $nm_paket_wisata;

    public $componentType = 'LIST';

    public function resetInput()
    {
        $this->nama_paket = null;
        $this->id_paket_wisata = null;
        $this->jumlah_peserta = null;
        $this->harga_paket = null;
        $this->nm_paket_wisata = null;
    }

    public function closeForm()
    {
        $this->componentType = "LIST";
        $this->resetInput();
    }

    public $rules = [
       "nama_paket" => 'required',
       "id_paket_wisata" => 'required',
       "jumlah_peserta" => 'required',
       "harga_paket" => 'required',
    ];

    // ! ================================================================= CREATE

    public function addForm()
    {
        $this->componentType = "ADD";
    }

    public function select($id)
    {
        $this->id_paket_wisata = $id;
        $paketWisata = PaketWisata::find($this->id_paket_wisata);
        $this->nm_paket_wisata = $paketWisata->nama_paket;
    }

    public function createDaftarPaket()
    {
        $this->validate();

        DaftarPaket::create([
            "nama_paket" => $this->nama_paket,
            "id_paket_wisata" => $this->id_paket_wisata,
            "jumlah_peserta" => $this->jumlah_peserta,
            "harga_paket" => $this->harga_paket,
             ]);

        $this->resetInput();
        $this->componentType = "LIST";
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }

    // ! ==================================================================== UPDATE

    public $editDaftarPaketId;

    public function editForm($id)
    {
        $this->componentType = "EDIT";

        
        
        $daftarPaket = DaftarPaket::find($id);
        
        $paketWisata = PaketWisata::find($daftarPaket->id_paket_wisata);
        $this->nm_paket_wisata = $paketWisata->nama_paket;

        if ($daftarPaket) {
            $this->editDaftarPaketId = $id;
            $this->nama_paket = $daftarPaket->nama_paket;
            $this->id_paket_wisata = $daftarPaket->id_paket_wisata;
            $this->jumlah_peserta = $daftarPaket->jumlah_peserta;
            $this->harga_paket = $daftarPaket->harga_paket;
        }
    }

    public function updateDaftarPaket()
    {
        $this->validate();

        DaftarPaket::find($this->editDaftarPaketId)->update([
            "nama_paket" => $this->nama_paket,
            "id_paket_wisata" => $this->id_paket_wisata,
            "jumlah_peserta" => $this->jumlah_peserta,
            "harga_paket" => $this->harga_paket,
        ]);

        $this->componentType = "LIST";
        $this->resetInput();
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }


    // ! ==================================================================== DELETE

    public $deletedId;
    public function deleteDaftarPaket($id)
    {
        $this->deletedId = $id;
        
        $this->dispatchBrowserEvent('showDeleteAlert');
    }

    public $listeners = ['removeDaftarPaket'];

    public function removeDaftarPaket()
    {
        DaftarPaket::find($this->deletedId)->delete();
    }

    public function printPdf()
    {   
        $daftarPaket = DaftarPaket::all();
        $pdf = PDF::loadview('livewire.Daftarpaket.daftarPaket_pdf',['daftarPaket' => $daftarPaket]);
    	// return $pdf->download('laporan-daftarPaket-pdf.pdf');
        return view('livewire.daftarPaket.daftarPaket_pdf',['daftarPaket' => $daftarPaket]);
    }

    public function render()
    {
        $paketWisata = PaketWisata::all();
        $daftarPaket = DaftarPaket::where('nama_paket', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.daftarpaket.daftar-paket-component', [
            'daftarPaket' => $daftarPaket,
            'paketWisata' => $paketWisata,
        ])->extends('layouts.app');
    }
}
