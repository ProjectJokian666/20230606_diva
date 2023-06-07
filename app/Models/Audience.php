<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audience extends Model
{
    use HasFactory;
    protected $table = 'audiences';
    protected $fillable = [
        'user_id', 'pendaftaran_kelas_id', 'status_hadir'
    ];
}
