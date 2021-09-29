<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Inscription;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StudentsExport implements FromView
{
	use Exportable;

    protected $selectedRows;

    public function __construct($selectedRows)
    {
        $this->selectedRows = $selectedRows;
    }

    // public function map($student): array
    // {
    //     return [
    //         $student->id,
    //         $student->prenoms,
    //         $student->nom,
    //         $student->dateNaissance->format('d-m-Y'),
    //         $student->lieuNaissance,
    //         $student->sexe,
    //         $student->matricule,
    //         $student->inscription->classeRoom->libClasse,
    //         $student->absences->count(),
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         'Num',
    //         'Prénoms',
    //         'Nom',
    //         'Date naissance',
    //         'Lieu naissance',
    //         'Sexe',
    //         'Matricule',
    //         'Classe',
    //         'NbreAbs',
    //     ];
    // }

    public function view(): View
    {
        //return Student::whereIn('id', $this->selectedRows)->with('inscription','absences');
        $inscriptions = Inscription::with('student', 'classeRoom')->get();
      //  dd($inscriptions[0]);
        return view('users', compact('inscriptions'));
    }
}
