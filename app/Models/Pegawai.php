<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory,HasUuids;

    protected $fillable =['nama','jenis_kelamin','tanggal_lahir','no_telp'];
}
