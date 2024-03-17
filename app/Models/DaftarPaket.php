<?php

namespace App\Models;

use App\Models\PaketWisata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarPaket extends Model
{
    use HasFactory;

    protected $table = 'daftar_paket';

    protected $guarded = [];

    public function paket_wisata()
    {
        return $this->belongsTo(PaketWisata::class, 'id_paket_wisata', 'id');
    }
}
