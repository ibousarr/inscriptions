<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absence;

class AbsenceController extends Controller
{
    public function store(Request $request)
    {
    	Absence::create([
    		'user_id'	=>	$request->user_id,
    		'student_id'	=>	$request->student_id,
    		'classe_room_id'	=>	$request->classe_room_id,
    		'type'	=>	$request->type,
            'debut'	=>	$request->debut,
            'fin'	=>	$request->fin,
            'nbJours'	=>	$request->nbJours,
            'nbHeures'	=>	$request->nbHeures
    	]);

    	session()->flash('success', 'Absence créée avec succès!');

    	return redirect()->back();
    }
}
