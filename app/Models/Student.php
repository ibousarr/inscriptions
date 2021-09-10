<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $casts = [
        'dateNaissance' => 'date:d-m-Y',
    ];

    protected $fillable = [

    	'prenoms',
		'nom',
		'dateNaissance',
		'lieuNaissance',
		'sexe',
		'matricule',
		'photo',
		'provenance',
		'pere',
		'mere',
		'tuteur',
		'contact',
		'adresse',
    ];

    public function inscription(){
        return $this->hasOne(Inscription::class);
    }

    public function scopeNomComplet()
    {

        return $this->prenoms .' '. $this->nom;
    }
}
