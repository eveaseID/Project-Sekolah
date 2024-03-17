<?php

namespace App\Http\Livewire\Karyawan;

use App\Models\User;
use Livewire\Component;
use App\Models\Karyawan;
use Livewire\WithPagination;
use PDF;

class KaryawanComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $nama_karyawan, $alamat, $no_hp, $jabatan, $id_user, $email_user;

    public $componentType = 'LIST';

    public function resetInput()
    {
        $this->nama_karyawan = null;
        $this->jabatan = null;
        $this->alamat = null;
        $this->no_hp = null;
        $this->id_user = null;
        $this->email_user = null;
    }

    public function closeForm()
    {
        $this->componentType = "LIST";
        $this->resetInput();
    }

    public $rules = [
        'nama_karyawan' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'jabatan' => 'required',
        'id_user' => 'required',
    ];

    // ! ================================================================= CREATE

    public function addForm()
    {
        $this->componentType = "ADD";
    }

    public function select($id)
    {
        $user = User::find($id);
        $this->id_user = $id;
        $this->email_user = $user->email;    
    }

    public function createKaryawan()
    {
        $this->validate();

        Karyawan::create([
            'nama_karyawan' => $this->nama_karyawan,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'jabatan' => $this->jabatan,
            'id_user' => $this->id_user,
        ]);

        $this->resetInput();
        $this->componentType = "LIST";
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }

    // ! ==================================================================== UPDATE

    public $editKaryawanId;

    public function editForm($id)
    {
        $this->componentType = "EDIT";

        $karyawan = Karyawan::find($id);
        $userEmail = User::find($karyawan->id_user);
        $this->email_user = $userEmail->email;

        if ($karyawan) {
            $this->editKaryawanId = $id;
            $this->nama_karyawan = $karyawan->nama_karyawan;
            $this->alamat = $karyawan->alamat;
            $this->no_hp = $karyawan->no_hp;
            $this->jabatan = $karyawan->jabatan;
            $this->id_user = $karyawan->id_user;
        }
    }

    public function updateKaryawan()
    {
        $this->validate();

        Karyawan::find($this->editKaryawanId)->update([
            'nama_karyawan' => $this->nama_karyawan,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'jabatan' => $this->jabatan,
            'id_user' => $this->id_user,
        ]);

        $this->resetInput();
        $this->componentType = "LIST";
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
    }


    // ! ==================================================================== DELETE

    public $deletedId;
    public function deleteKaryawan($id)
    {
        $this->deletedId = $id;
        
        $this->dispatchBrowserEvent('showDeleteAlert');
    }

    public $listeners = ['removeKaryawan'];

    public function removeKaryawan()
    {
        Karyawan::find($this->deletedId)->delete();
    }

    public function printPdf()
    {   
        $karyawan = Karyawan::all();
        $pdf = PDF::loadview('livewire.karyawan.karyawan_pdf',['karyawan' => $karyawan]);
    	// return $pdf->download('laporan-karyawan-pdf.pdf');
        return view('livewire.karyawan.karyawan_pdf',['karyawan' => $karyawan]);
    }

    public function render()
    {
        $users = User::all();
        $karyawan = Karyawan::where('nama_karyawan', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.karyawan.karyawan-component', [
            'karyawan' => $karyawan,
            'users' => $users,
        ])->extends('layouts.app');
    }
}
