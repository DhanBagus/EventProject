<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partisipans extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'kontak', 'keterangan','id_event'
    ];
}
