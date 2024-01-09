<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $guarded = [
        'id'
    ];

    public function supplier()
    {
        return $this->belongsTo(User::class, 'id_supplier');
    }
}
