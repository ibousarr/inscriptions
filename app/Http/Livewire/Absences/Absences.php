<?php

namespace App\Http\Livewire\Absences;

use Livewire\Component;
use App\Models\User;
use App\Models\Absence;
use App\Models\Student;
use App\Models\Inscription;
use App\Models\ClasseRoom;
use App\Exports\StudentsExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use Livewire\WithPagination;

class Absences extends Component
{
	use WithPagination;

	protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newAbsence = [];
    public $editAbsence = [];
    public $lesClasses;
    public $voirForm = false;

    public $quelleClasse="";
    public $inscriptions = [];
    public $laClasse;
    public $classesAbsence = [];
    public $absenceClasse;
    public $classeName;
    public $absenceStudent=null;
    public $absenceUser;
    public $student;

    public function filterAbsencesByClasse($classe = null)
    {
        $this->resetPage();

        $this->laClasse = $classe;
        $this->inscriptionStatut = null;
    }

    public function render()
    {

        if($this->laClasse == null){
            $absences = Absence::with(['student', 'classeRoom', 'user'])
                                                ->latest()
                                                ->paginate(5);
        } else {
            $absences = Absence::with(['student', 'classeRoom', 'user'])
                                                ->where('classe_room_id', $this->laClasse)
                                                ->latest()
                                                ->paginate(5);
        }
        $this->currentPage = PAGELIST;

        return view('livewire.absences.index', [
                        'absences'      =>  $absences,
                        'classes'       =>  ClasseRoom::where('refClasse', '>', 30)->get(),
                        
                    ])
                    ->extends("layouts.master")
                    ->section("contenu");
    }

    public function goToAddAbsenceForm()
    {
        $this->voirForm = true;
    }

    public function updatedQuelleClasse()
    {
        $this->inscriptions  =  Inscription::with(['student'])
                            ->where('classe_room_id', $this->quelleClasse)
                            ->get();
    }

    public function goToAddAbsence($classeId)
    {
        
        
        $this->laClasse = $classeId;
       // dd($classe);
        $this->inscriptions  =  Inscription::with(['student'])
                            ->where('classe_room_id', $this->laClasse)
                            ->get();
        //dd($this->inscriptions[0]->student->prenoms);
        $this->lesClasses = ClasseRoom::all();
        $this->currentPage = PAGECREATEFORM;

        //dump($this->inscriptions);
    }

    protected $rules = [

            'newAbsence.user_id' => 'required',
            'newAbsence.student_id' => 'required',
            'newAbsence.classe_room_id' => 'required',
            'newAbsence.type' => 'required',
            'newAbsence.dateDebut' => 'required',
            'newAbsence.dateFin' => 'required',
            'newAbsence.heureDeb' => 'required',
            'newAbsence.heureFin' => 'required',
            'newAbsence.nbJours' => 'required',
            'newAbsence.nbHeures' => 'required',
        ];
    
    public function addAbsence()
    {
        
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validatedData = $this->validate();
       
        //dd($$this->validatedData['newAbence.type']);
        
        // Ajouter une nouvelle absence
        Absence::create($validationAttributes["newAbsence"]);

        $this->newAbsence = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"L'absence est créée avec succès!"]);
    }

    public function goToEditAbsence($id){
        $this->editAbsence = Absence::find($id)->toArray();
        dd($this->editAbsence);
        $this->currentPage = PAGEEDITFORM;
    }

    public function updateAbsence(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();


        Absence::find($this->editAbsence["id"])->update($validationAttributes["editAbsence"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Absence mise à jour avec succès!"]);

        $this->currentPage = PAGELIST;
        $this->editAbsence = [];

    }


    public function confirmDelete($name, $id){
        
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer une absence de $name de la base de données. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "absence_id" => $id
            ]
        ]]);
    }

    public function deleteAbsence($id){
    	
        Absence::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Absence supprimée avec succès!"]);

       $this->currentPage = PAGELIST;
    }

    public function showModalAbsence($classeId)
    {
        //dd($classeId);
        $this->absenceClasse = $classeId;
        $this->newAbsence['user_id'] = auth()->user()->id;
        $this->newAbsence['classe_room_id'] = $classeId;
        $this->classesAbsence = ClasseRoom::where('id',$this->absenceClasse)->first();
        $this->classeName = $this->classesAbsence->libClasse;
        $this->dispatchBrowserEvent("showAbsenceModal", [
            'classeName' => $this->classeName,
            'absenceClasse' => $this->absenceClasse,
        ]);
    }

    public function addAbsenceClasse()
    {

        $validationAttributes = $this->validate();
       // dd($validationAttributes["newAbsence"]);
        Absence::create([

            'user_id'           =>  $this->newAbsence['user_id'], 
            'student_id'        =>  $this->newAbsence['student_id'], 
            'classe_room_id'    =>  $this->newAbsence['classe_room_id'],
            'type'              =>  $this->newAbsence['type'], 
            'dateDebut'         =>  $this->newAbsence['dateDebut'], 
            'dateFin'           =>  $this->newAbsence['dateFin'], 
            'heureDeb'          =>  $this->newAbsence['heureDeb'], 
            'heureFin'          =>  $this->newAbsence['heureFin'], 
            'nbJours'           =>  $this->newAbsence['nbJours'], 
            'nbHeures'          =>  $this->newAbsence['nbHeures'],
        ]);

        $this->newAbsence = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Votre saisie a été validée avec succès!"]);
        $this->closeAbsenceModal();

    }

    public function closeAbsenceModal(){
        $this->newAbsence = [];
        $this->dispatchBrowserEvent("showAbsenceModal", []);
    }

    public function showEditModalAbsence($name, $classe, $absenceId)
    {
        $this->classeName = $classe;
        $this->student = $name;
        $this->editAbsence = Absence::with('student')->find($absenceId)->toArray();
        
        $this->dispatchBrowserEvent("showEditModal", [

            'editAbsence' => $this->editAbsence,
            'student'     => $this->student,
            'classeName'  => $this->classeName,
            'student'     => $this->student,
        ]);
    }

    public function updateAbsenceClasse(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        //$validationAttributes = $this->validate();

        $validatedData = $this->validate([

            'editAbsence.type' => 'required',
            'editAbsence.dateDebut' => 'required',
            'editAbsence.dateFin' => 'required',
            'editAbsence.heureDeb' => 'required',
            'editAbsence.heureFin' => 'required',
            'editAbsence.nbJours' => 'required',
            'editAbsence.nbHeures' => 'required',
        ]);

        //dd($validatedData);


        Absence::find($this->editAbsence["id"])->update($validatedData["editAbsence"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Données mises à jour avec succès!"]);

        $this->editAbsence = [];
        $this->closeEditAbsenceModal();

    }

    public function closeEditAbsenceModal(){
        $this->editAbsence = [];
        $this->dispatchBrowserEvent("showEditModal", []);
    }


}
