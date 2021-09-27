<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Student;
use App\Models\Inscription;
use App\Models\ClasseRoom;
use App\Models\Absence;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

use Livewire\WithPagination;


class Students extends Component
{
	use WithPagination;

	protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newStudent = [];
    public $newAbsence = [];
    public $editStudent = [];
    public $absenceName;
    public $absenceStudent;
    public $absenceClasse;
    public $absenceUser;
    public $quelleClasse = "";

    public function render()
    {
    	$classeId = $this->quelleClasse;
    	$param = '%'.$classeId.'%';
        return view('livewire.students.index', [
        	'classes'	=>	classeRoom::all(),
        	'inscriptions' => Inscription::with(['student'])->whereRelation('classeRoom', 'libClasse', 'like', $param)->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function goToListStudent(){
        $this->currentPage = PAGELIST;
        $this->editStudent = [];
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editStudent.prenoms' => 'required',
                'editStudent.nom' => 'required',
                'editStudent.dateNaissance' => 'nullable',
                'editStudent.lieuNaissance' => 'nullable',
                'editStudent.sexe' => 'required',
                'editStudent.matricule'  =>	['required', Rule::unique("students", "matricule")->ignore($this->editStudent['id']) ] ,
				'editStudent.photo'  =>	'nullable',
				'editStudent.provenance'  =>	'nullable',
				'editStudent.pere'  =>	'nullable',
				'editStudent.mere'  =>	'nullable',
				'editStudent.tuteur'  =>	'nullable',
				'editStudent.contact'  =>	'nullable',
				'editStudent.adresse'  =>	'nullable',

            ];
        }

        return [

            'newStudent.prenoms' => 'required',
            'newStudent.nom' => 'required',
            'newStudent.dateNaissance' => 'nullable',
            'newStudent.lieuNaissance' => 'nullable',
            'newStudent.sexe' => 'required',
            'newStudent.matricule'  =>	'required|string|unique:students,matricule',
			'newStudent.photo'  =>	'nullable',
			'newStudent.provenance'  =>	'nullable',
			'newStudent.pere'  =>	'nullable',
			'newStudent.mere'  =>	'nullable',
			'newStudent.tuteur'  =>	'nullable',
			'newStudent.contact'  =>	'nullable',
			'newStudent.adresse'  =>	'nullable',
        ];
    }


    public function goToAddStudent(){
    	
        $this->currentPage = PAGECREATEFORM;
    }

    public function addStudent(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        //dump($validationAttributes);
        // Ajouter un nouvel utilisateur
        Student::create($validationAttributes["newStudent"]);

        $this->newStudent = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"L'élève est créé avec succès!"]);

        $this->currentPage = PAGELIST;
    }

    public function goToEditStudent($id){
        $this->editStudent = Student::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function updateStudent(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

       // dd($this->editStudent["id"]);
        Student::find($this->editStudent["id"])->update($validationAttributes["editStudent"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Données mises à jour avec succès!"]);

        $this->currentPage = PAGELIST;
        $this->editStudent = [];

    }

    public function showModalAbsence($name, $studentId, $classeId)
    {
        //dd($studentId);
        $this->absenceClasse = $classeId;
        $this->absenceName = $name;
        $this->absenceStudent = $studentId;
        $this->absenceUser = auth()->user()->id;
        //$classesAbsence = ClasseRoom::where('id',$classeId)->get();
        
        $this->dispatchBrowserEvent("showAbsenceModal", []);
    }

    public function addAbsence()
    {
        
        

        $validated = $this->validate([
            'newAbsence.type'       =>  'required',
            'newAbsence.dateDebut'  =>  'required', 
            'newAbsence.dateFin'    =>  'nullable', 
            'newAbsence.heureDeb'   =>  'required', 
            'newAbsence.heureFin'   =>  'required', 
            'newAbsence.nbJours'    =>  'nullable', 
            'newAbsence.nbHeures'   =>  'nullable',

        ]);



        Absence::create(
            [
                'user_id'           =>  $this->absenceUser, 
                'student_id'        =>  $this->absenceStudent, 
                'classe_room_id'    =>  $this->absenceClasse,
                'type'              =>  $this->newAbsence['type'], 
                'dateDebut'         =>  $this->newAbsence['dateDebut'], 
                'dateFin'           =>  $this->newAbsence['dateFin'], 
                'heureDeb'          =>  $this->newAbsence['heureDeb'], 
                'heureFin'          =>  $this->newAbsence['heureFin'], 
                'nbJours'           =>  $this->newAbsence['nbJours'], 
                'nbHeures'          =>  $this->newAbsence['nbHeures'],
                              
            ]
        );

        $this->newAbsence = [];
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Votre a été validée avec succès!"]);
        $this->closeModal();

    }

    public function closeModal(){
        $this->dispatchBrowserEvent("showAbsenceModal", []);
    }


    public function confirmDelete($name, $id){

        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des élèves. Voulez-vous continuer ?",
            "title" => "Êtes-vous sûr de vouloir continuer la suppression?",
            "type" => "warning",
            "data" => [
                "student_id" => $id
            ]
        ]]);
    }

    public function deleteStudent($id){

    	$inscrit = Inscription::whereRelation('student', 'student_id', $id)->firstOrFail();

    	$inscrit->delete();
    	
        Student::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Elève supprimé avec succès!"]);

       $this->currentPage = PAGELIST;
    }
}
