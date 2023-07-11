<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IkutEvent extends Model
{
    use HasFactory;
    protected $table = 'ikut_event';
    protected $fillable = [
        'event_id',
        'user_id',
        'harga',
        'diskon',
        'bayar',
        'status',
        'payment',
    ];
    public function event()
    {
        return $this->hasOne(Events::class,'id','event_id');
    }
}
