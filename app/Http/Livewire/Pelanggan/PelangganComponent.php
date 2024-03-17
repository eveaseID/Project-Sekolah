<?php

namespace App\Http\Livewire\Pelanggan;

use App\Models\User;
use Livewire\Component;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use PDF;

class PelangganComponent extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $nama_lengkap, $alamat, $no_hp, $foto, $id_user;

    public $componentType = 'LIST';

    public function resetInput()
    {
        $this->nama_lengkap = null;
        $this->no_hp = null;
        $this->alamat = null;
        $this->foto = null;
        $this->id_user = null;
    }

    public function closeForm()
    {
        $this->componentType = "LIST";
        $this->resetInput();
    }

    public $rules = [
        'nama_lengkap' => 'required',
        'no_hp' => 'required',
        'alamat' => 'required',
        'foto' => 'required',
        'id_user' => 'required',
    ];

    // ! ================================================================= CREATE

    public function addForm()
    {
        $this->componentType = "ADD";
    }

    public function createPelanggan()
    {
        $this->validate();

        $fotoName = Carbon::now()->timestamp. '.' .$this->foto->extension();
        $this->foto->storeAs('pelanggan_images', $fotoName);        

        Pelanggan::create([
            'nama_lengkap' => $this->nama_lengkap,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
            'foto' => $fotoName,
            'id_user' => $this->id_user,
        ]);

        $this->componentType = "LIST";
        $this->resetInput();
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }

    // ! ==================================================================== UPDATE

    public $editPelangganId, $old_foto, $new_foto;

    public function editForm($id)
    {
        $this->componentType = "EDIT";

        $pelanggan = Pelanggan::find($id);

        if ($pelanggan) {
            $this->editPelangganId = $id;
            $this->nama_lengkap = $pelanggan->nama_lengkap;
            $this->no_hp = $pelanggan->no_hp;
            $this->alamat = $pelanggan->alamat;
            $this->old_foto = $pelanggan->foto;
            $this->id_user = $pelanggan->id_user;
        }
    }

    public function updatePelanggan()
    {
        
        $this->validate([
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'id_user' => 'required',
        ]);
        

        if ($this->new_foto) {
            $fotoName = Carbon::now()->timestamp. '.' .$this->new_foto->extension();
            $this->new_foto->storeAs('pelanggan_images', $fotoName);  
            // unlink(public_path('uploads/pelanggan_images/'.$this->old_foto));
        } else {
            $fotoName = $this->old_foto;
        }

        Pelanggan::find($this->editPelangganId)->update([
            'nama_lengkap' => $this->nama_lengkap,
            'no_hp' => $this->no_hp,
            'alamat' => $this->alamat,
            'foto' => $fotoName,
            'id_user' => $this->id_user,
        ]);


        $this->componentType = "LIST";
        $this->resetInput();
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }


    // ! ==================================================================== DELETE

    public $deletedId;
    public function deletePelanggan($id)
    {
        $this->deletedId = $id;
        
        $this->dispatchBrowserEvent('showDeleteAlert');
    }

    public $listeners = ['removePelanggan'];

    public function removePelanggan()
    {
        $pelanggan = Pelanggan::find($this->deletedId);
        // unlink(public_path('uploads/pelanggan_images/'.$pelanggan->foto));
        $pelanggan->delete();
    }

    public function printPdf()
    {   
        $pelanggan = Pelanggan::all();
        $pdf = PDF::loadview('livewire.pelanggan.pelanggan_pdf',['pelanggan' => $pelanggan]);
    	// return $pdf->download('laporan-pelanggan-pdf.pdf');
        return view('livewire.pelanggan.pelanggan_pdf',['pelanggan' => $pelanggan]);
    }
    
    public function render()
    {
        $user = Auth::user();
        if ($user->level == 'pelanggan') {
            $users = User::all();
            $pelanggan = Pelanggan::where('id_user',$user->id)->get();
            return view('livewire.pelanggan.pelanggan-component', [
                'pelanggan' => $pelanggan,
                'users' => $users,
            ])->extends('layouts.app');
        }

        $users = User::all();
        $pelanggan = Pelanggan::where('nama_lengkap', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.pelanggan.pelanggan-component', [
            'pelanggan' => $pelanggan,
            'users' => $users,
        ])->extends('layouts.app');
    }
}
