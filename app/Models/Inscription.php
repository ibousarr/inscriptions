<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [

        'annee_scolaire_id',
        'type_inscription_id',
        'user_id',
        'student_id',
        'classe_room_id',
        'statut_inscription_id',
        'dossier'
    ];


    public function type(){
        return $this->belongsTo(TypeInscription::class, "type_inscription_id", "id");
    }

    public function statut(){
        return $this->belongsTo(StatutInscription::class, "statut_inscription_id", "id");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function classeRoom(){
        return $this->belongsTo(ClasseRoom::class);
    }
}
