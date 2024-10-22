<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory,HasUuids;

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function alattulis(){
        return $this->belongsTo(alatTulis::class, 'id_alat_tulis');
    }

    protected $fillable =['id_pelanggan','id_alat_tulis','tanggal'];
}

