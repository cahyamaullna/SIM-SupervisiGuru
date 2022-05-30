<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    use HasFactory;

    protected $table = 'rekap_supervisi';
    protected $fillable = ['nama', 'mata_pelajaran', 'rpp', 'pelaksanaan', 'penilaian', 'nilai_akhir', 'keterangan'];
}
