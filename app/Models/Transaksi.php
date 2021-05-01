<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Take extends Model
{
   
    protected $table = 'transaksi';
    protected $guarded = [];
    public function products()
    {
        return $this->belongsTo(product::class);
    }
}
