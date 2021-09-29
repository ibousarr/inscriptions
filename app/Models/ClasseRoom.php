<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseRoom extends Model
{
    use HasFactory;

    protected $fillable = ['refClasse', 'libClasse', 'niveau', 'nbTables'];

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    
    public function inscriptions()
    {
        return $this->hasMany(Inscription::class);
    }
}
