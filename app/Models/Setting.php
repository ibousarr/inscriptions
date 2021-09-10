<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
    	'etablissement',
        'ief',
        'academie',
        'adresse',
        'email',
        'phone',
        'cetab',
        'site',
        'ien',
        'banque',
        'compte',
        'president_ape',
    ];
}
