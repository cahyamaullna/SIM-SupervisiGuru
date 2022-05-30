<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasGuru extends Model
{
    use HasFactory;

    protected $table = 'berkas_guru';
    protected $fillable = ['nama_guru', 'mata_pelajaran', 'kompetensi_dasar', 'materi', 'rombel', 'rpp', 'modul', 'instrumen', 'jadwal'];
}
