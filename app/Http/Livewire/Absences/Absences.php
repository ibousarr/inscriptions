<?php

namespace App\Http\Livewire\Absences;

use Livewire\Component;
use App\Models\User;
use App\Models\Absence;
use App\Models\Student;
use App\Models\Inscription;
use App\Models\ClasseRoom;
use Carbon\Carbon;

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


    public function render()
    {
        $this->currentPage = PAGELIST;

        return view('livewire.absences.index', [
                        'absences'      =>  Absence::with(['student', 'classeRoom', 'user'])
                                                ->latest()
                                                ->paginate(5),
                        'classes'       =>  ClasseRoom::all(),
                        
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


    public function rules()
    {
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editAbsence.user_id' => 'required',
                'editAbsence.student_id' => 'required',
                'editAbsence.classe_room_id' => 'required',
                'editAbsence.type' => 'required',
                'editAbsence.debut' => 'required',
                'editAbsence.fin' => 'required',
                'editAbsence.nbJours' => 'nullable',
                'editAbsence.nbHeures' => 'nullable',


            ];
        }
        if($this->currentPage == PAGECREATEFORM){
            return [
                'newAbsence.user_id' => 'required',
                'newAbsence.student_id' => 'required',
                'newAbsence.classe_room_id' => 'required',
                'newAbsence.type' => 'required',
                'newAbsence.dateDebut' => 'required',
                'newAbsence.dateFin' => 'nullable',
                'newAbsence.heureDebut' => 'nullable',
                'newAbsence.heureFin' => 'nullable',
                'newAbsence.nbJours' => 'nullable',
                'newAbsence.nbHeures' => 'nullable',
            ];
        }
    }

    public function addAbsence()
    {
        
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();
       

        dd($request->all());
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

}
