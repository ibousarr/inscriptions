<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInscription extends Model
{
    use HasFactory;

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
}
