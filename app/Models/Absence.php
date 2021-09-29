<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'student_id', 'classe_room_id',
                          'type', 'dateDebut', 'dateFin', 'heureDeb', 'heureFin', 'nbJours', 'nbHeures'  
                          ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function classeRoom()
    {
        return $this->belongsTo(ClasseRoom::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
