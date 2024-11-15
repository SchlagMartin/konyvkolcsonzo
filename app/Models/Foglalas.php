<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class foglalas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [ 'email', 'konyv_id', 'rent_start', 'rent_end'];
    public function konyv()
    {
        return $this->belongsTo(Konyv::class);
    }
}
