<?php

namespace App\Http\Livewire\Students;

use Livewire\Component;
use App\Models\Student;
use App\Models\Inscription;
use App\Models\classeRoom;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Livewire\WithPagination;


class Students extends Component
{
	use WithPagination;

	protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newStudent = [];
    public $editStudent = [];
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
        $this->editClasse = [];
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
                'editStudent.matricule'  =>	['required', Rule::unique("students", "matricule")->ignore($this->editStudent["id"]) ] ,
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


    public function confirmDelete($name, $id){

        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des élèves. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
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
