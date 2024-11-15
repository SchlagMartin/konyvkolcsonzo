<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class konyv extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['cim', 'szerzo', 'mufaj', 'kiadasev'];
    public function foglalasok()
    {
        return $this->hasMany(Foglalas::class);
    }
}
