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

    public function absences()
    {
        return $this->hasMany(Absence::class);
    }
    
    public function inscription()
    {
        return $this->hasOne(Inscription::class);
    }

    public function scopeNomComplet()
    {

        return $this->prenoms .' '. $this->nom;
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($student) {
            $student->inscription()->create([
                'annee_scolaire_id' => 2,
                'type_inscription_id'   => 1,
                'user_id'   => auth()->user()->id,
                'student_id'    => $student->id,
                'classe_room_id'    => 1,
                'statut_inscription_id' => 1,
            ]);

           // Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }
}
