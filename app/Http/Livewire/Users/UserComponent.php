<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\WithPagination;
use PDF;

class UserComponent extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';
 
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public $email, $password, $level, $aktif;

    public $componentType = "LIST";

    public $rules = [
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'level' => 'required',
        'aktif' => 'required',

    ];

    public function resetInput()
    {
        $this->email = null;
        $this->password = null;
        $this->level = null;
        $this->aktif = null;
    }

    public function closeForm()
    {
        $this->resetInput();
        $this->componentType = "LIST";
    }

    // ! =========================================================== CREATE

    public function addForm()
    {
        $this->componentType = "ADD";
    }

    public function createUser()
    {
        $this->validate();

        User::create([
            'email' => strtolower($this->email),
            'password' => Hash::make($this->password),
            'level' => $this->level,
            'aktif' => $this->aktif,
        ]);

        $this->resetInput();
        $this->componentType = "LIST";
        $this->dispatchBrowserEvent('showSuccess', ['title' => 'User Added Successfully']);
    }

    // ! ====================================================== UPDATE
    public $userEditId;
    public $old_password, $new_password;
    public function editForm($id)
    {
        $user = User::find($id);

        if ($user) {
            $this->userEditId = $id;
            $this->email = $user->email;
            $this->level = $user->level;
            $this->aktif = $user->aktif;
            $this->old_password = $user->password;           
        }


        $this->componentType = "EDIT";
    }


    public function updateUser()
    {
        $this->validate([
            'email' => 'required|unique:users,email,'.$this->userEditId,
            'level' => 'required',
            'aktif' => 'required',
        ]);


        if ($this->userEditId) {
            if ($this->new_password) {
                User::find($this->userEditId)->update([
                    'email' => strtolower($this->email),
                    'password' => Hash::make($this->new_password),
                    'level' => $this->level,
                    'aktif' => $this->aktif,
                ]);
            } else {
                User::find($this->userEditId)->update([
                    'email' => strtolower($this->email),
                    'password' => $this->old_password,
                    'level' => $this->level,
                    'aktif' => $this->aktif,
                ]);
            }
        }

        $this->dispatchBrowserEvent('showSuccess', ['title' => 'Success']);
        $this->resetInput();
        $this->componentType = "LIST";
    }

    // ! ====================================================== DELETE
    public $deletedUserId;
    public function deleteUser($id)
    {
        $user = User::find($id);
        $this->deletedUserId = $user->id;
        $this->dispatchBrowserEvent('showDeleteAlert');
    }

    public $listeners = ['removeUser'];

    public function removeUser()
    {
        User::find($this->deletedUserId)->delete();
    }

    public function printPdf()
    {   
        $user = User::all();
        $pdf = PDF::loadview('livewire.users.user_pdf',['users' => $user]);
    	// return $pdf->download('laporan-user-pdf.pdf');
        return view('livewire.users.user_pdf',['users' => $user]);
    }


    public function render()
    {
        $users = User::where('email', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
        return view('livewire.users.user-component', [
            "users" => $users,
        ])->extends('layouts.app');
    }
}
