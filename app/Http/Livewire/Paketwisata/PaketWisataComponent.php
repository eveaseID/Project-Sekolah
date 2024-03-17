<?php

namespace App\Http\Livewire\PaketWisata;

use App\Models\DaftarPaket;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Pelanggan;
use App\Models\PaketWisata;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class PaketWisataComponent extends Component
{

    
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $nama_paket, $deskripsi, $fasilitas, $itinerary, $diskon, $foto1, $foto2, $foto3, $foto4, $foto5;

    public $componentType = 'LIST';

    public function resetInput()
    {
        $this->nama_paket = null;
        $this->deskripsi = null;
        $this->fasilitas = null;
        $this->itinerary = null;
        $this->diskon = null;
        $this->foto1 = null;
        $this->foto2 = null;
        $this->foto3 = null;
        $this->foto4 = null;
        $this->foto5 = null;
    }

    public function updated()
    {
        if ($this->diskon > 100) {
            $this->diskon = 100;
        }
    }

    public function closeForm()
    {
        $this->componentType = "LIST";
        $this->resetInput();
    }

    public $rules = [
        'nama_paket' => 'required',
        'deskripsi' => 'required',
        'fasilitas' => 'required',
        'itinerary' => 'required',
        'diskon' => 'required',
        'foto1' => 'required',
        'foto2' => 'required',
        'foto3' => 'required',
        'foto4' => 'required',
        'foto5' => 'required',
    ];

    // ! ================================================================= CREATE

    public function addForm()
    {
        $this->componentType = "ADD";
    }

    public function createPaketWisata()
    {
        $this->validate();

        $fotoName1 = Carbon::now()->addHour(1)->timestamp. '.' .$this->foto1->extension();
        $this->foto1->storeAs('paketWisata_images', $fotoName1);        
        
        $fotoName2 = Carbon::now()->addHour(2)->timestamp. '.' .$this->foto2->extension();
        $this->foto2->storeAs('paketWisata_images', $fotoName2);        

        $fotoName3 = Carbon::now()->addHour(3)->timestamp. '.' .$this->foto3->extension();
        $this->foto3->storeAs('paketWisata_images', $fotoName3);        

        $fotoName4 = Carbon::now()->addHour(4)->timestamp. '.' .$this->foto4->extension();
        $this->foto4->storeAs('paketWisata_images', $fotoName4);        

        $fotoName5 = Carbon::now()->addHour(5)->timestamp. '.' .$this->foto5->extension();
        $this->foto5->storeAs('paketWisata_images', $fotoName5);        

        PaketWisata::create([
            'nama_paket' => $this->nama_paket,
            'deskripsi' => $this->deskripsi,
            'fasilitas' => $this->fasilitas,
            'itinerary' => $this->itinerary,
            'diskon' => $this->diskon,
            'foto1' => $fotoName1,
            'foto2' => $fotoName2,
            'foto3' => $fotoName3,
            'foto4' => $fotoName4,
            'foto5' => $fotoName5,
        ]);

        $this->componentType = "LIST";
        $this->resetInput();
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }

    // ! ==================================================================== UPDATE

    public $editPaketWisataId;
    public $old_foto1, $old_foto2, $old_foto3, $old_foto4, $old_foto5;
    public $new_foto1, $new_foto2, $new_foto3, $new_foto4, $new_foto5;

    public function editForm($id)
    {
        $this->componentType = "EDIT";

        $paketWisata = PaketWisata::find($id);

        if ($paketWisata) {
            $this->editPaketWisataId = $id;
            $this->nama_paket = $paketWisata->nama_paket;
            $this->deskripsi = $paketWisata->deskripsi;
            $this->fasilitas = $paketWisata->fasilitas;
            $this->itinerary = $paketWisata->itinerary;
            $this->diskon = $paketWisata->diskon;
            $this->old_foto1 = $paketWisata->foto1;
            $this->old_foto2 = $paketWisata->foto2;
            $this->old_foto3 = $paketWisata->foto3;
            $this->old_foto4 = $paketWisata->foto4;
            $this->old_foto5 = $paketWisata->foto5;
        }
    }

    public function updatePaketWisata()
    {
        
        $this->validate([
            'nama_paket' => 'required',
            'deskripsi' => 'required',
            'fasilitas' => 'required',
            'itinerary' => 'required',
            'diskon' => 'required',
        ]);
        

        if ($this->new_foto1) {
            $fotoName1 = Carbon::now()->timestamp. '.' .$this->new_foto1->extension();
            $this->new_foto1->storeAs('paketWisata_images', $fotoName1);  
            // unlink(public_path('uploads/paketWisata_images/'.$this->old_foto1));
        } else {
            $fotoName1 = $this->old_foto1;
        }
        
        if ($this->new_foto2) {
            $fotoName2 = Carbon::now()->timestamp. '.' .$this->new_foto2->extension();
            $this->new_foto2->storeAs('paketWisata_images', $fotoName2);  
            // unlink(public_path('uploads/paketWisata_images/'.$this->old_foto2));
        } else {
            $fotoName2 = $this->old_foto2;
        }

        if ($this->new_foto3) {
            $fotoName3 = Carbon::now()->timestamp. '.' .$this->new_foto3->extension();
            $this->new_foto3->storeAs('paketWisata_images', $fotoName3);  
            // unlink(public_path('uploads/paketWisata_images/'.$this->old_foto3));
        } else {
            $fotoName3 = $this->old_foto3;
        }

        if ($this->new_foto4) {
            $fotoName4 = Carbon::now()->timestamp. '.' .$this->new_foto4->extension();
            $this->new_foto4->storeAs('paketWisata_images', $fotoName4);  
            // unlink(public_path('uploads/paketWisata_images/'.$this->old_foto4));
        } else {
            $fotoName4 = $this->old_foto4;
        }

        if ($this->new_foto5) {
            $fotoName5 = Carbon::now()->timestamp. '.' .$this->new_foto5->extension();
            $this->new_foto5->storeAs('paketWisata_images', $fotoName5);  
            // unlink(public_path('uploads/paketWisata_images/'.$this->old_foto5));
        } else {
            $fotoName5 = $this->old_foto5;
        }


        PaketWisata::find($this->editPaketWisataId)->update([
            'nama_paket' => $this->nama_paket,
            'deskripsi' => $this->deskripsi,
            'fasilitas' => $this->fasilitas,
            'itinerary' => $this->itinerary,
            'diskon' => $this->diskon,
            'foto1' => $fotoName1,
            'foto2' => $fotoName2,
            'foto3' => $fotoName3,
            'foto4' => $fotoName4,
            'foto5' => $fotoName5,
        ]);


        $this->componentType = "LIST";
        $this->resetInput();
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }


    // ! ==================================================================== DETAIL

    public $detailPaketWisataId;

    public function detailForm($id)
    {
        $this->componentType = "DETAIL";
        $detailPaket = PaketWisata::find($id);

        if ($detailPaket) {
            $this->detailPaketWisataId = $id;
            $this->nama_paket = $detailPaket->nama_paket;
            $this->deskripsi = $detailPaket->deskripsi;
            $this->fasilitas = $detailPaket->fasilitas;
            $this->itinerary = $detailPaket->itinerary;
            $this->diskon = $detailPaket->diskon;
            $this->old_foto1 = $detailPaket->foto1;
            $this->old_foto2 = $detailPaket->foto2;
            $this->old_foto3 = $detailPaket->foto3;
            $this->old_foto4 = $detailPaket->foto4;
            $this->old_foto5 = $detailPaket->foto5;
        }
    }


    // ! ==================================================================== DELETE

    public $deletedId;
    public function deletePaketWisata($id)
    {
        $this->deletedId = $id;
        
        $this->dispatchBrowserEvent('showDeleteAlert');
    }

    public $listeners = ['removePaketWisata'];

    public function removePaketWisata()
    {
        $paketWisata = PaketWisata::find($this->deletedId);
        unlink(public_path('uploads/paketWisata_images/'.$paketWisata->foto1));
        unlink(public_path('uploads/paketWisata_images/'.$paketWisata->foto2));
        unlink(public_path('uploads/paketWisata_images/'.$paketWisata->foto3));
        unlink(public_path('uploads/paketWisata_images/'.$paketWisata->foto4));
        unlink(public_path('uploads/paketWisata_images/'.$paketWisata->foto5));
        $paketWisata->delete();
    }


    public function render()
    {
        $paketWisata = PaketWisata::where('nama_paket', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.paketwisata.paket-wisata-component', [
            'paketWisata' => $paketWisata
        ])->extends('layouts.app');
    }

    public function detailPaket($id)
    {
        $paketWisata = PaketWisata::where('id', $id)->get();
        $daftarPaket = DaftarPaket::where('id', $paketWisata[0]->id)->get();
        // $harga = $daftarPaket[0]->harga_paket;
        // $hargaDiskon = $harga - ($harga * $paketWisata[0]->diskon / 100);
        $harga = $daftarPaket[0]->harga_paket * $daftarPaket[0]->jumlah_peserta;
        $hargaDiskon = $harga - ($harga * $paketWisata[0]->diskon / 100);
        return view('livewire.paketWisata.detail', [
            'paketWisata' => $paketWisata,
            'daftarPaket' => $daftarPaket,
            'harga' => $harga,
            'hargaDiskon' => $hargaDiskon,
            'diskon' => $paketWisata[0]->diskon,

        ]);
    }

    public function allPaket()
    {
        $paketWisata = PaketWisata::all();
        return view('livewire.paketWisata.moreTour', [
            'paketWisata' => $paketWisata
        ]);
    }
}
