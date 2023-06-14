<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'tanggal','nama_event', 'detail_event', 'diskon_event', 'harga_event'
    ];
}
