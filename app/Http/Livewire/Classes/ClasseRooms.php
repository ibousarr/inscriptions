<?php

namespace App\Http\Livewire\Classes;

use Livewire\Component;
use App\Models\ClasseRoom;
use Livewire\WithPagination;


class ClasseRooms extends Component
{
	use WithPagination;

	protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newClasse = [];
    public $editClasse = [];


    public function render()
    {
        return view('livewire.classes.index', [
        	'classes' => ClasseRoom::paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function goToListClasse(){
        $this->currentPage = PAGELIST;
        $this->editClasse = [];
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editClasse.refClasse' => 'required',
                'editClasse.libClasse' => 'required',
                'editClasse.niveau' => 'nullable',
                'editClasse.nbTables' => 'nullable',

            ];
        }

        return [
            'newClasse.refClasse' => 'required',
            'newClasse.libClasse' => 'required',
            'newClasse.niveau' => 'nullable',
            'newClasse.nbTables' => 'nullable',
        ];
    }


    public function goToAddClasse(){
    	
        $this->currentPage = PAGECREATEFORM;
    }

    public function addClasse(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        //dump($validationAttributes);
        // Ajouter un nouvel utilisateur
        ClasseRoom::create($validationAttributes["newClasse"]);

        $this->newClasse = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"La classe est créée avec succès!"]);
    }

    public function goToEditClasse($id){
        $this->editClasse = ClasseRoom::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }

    public function updateClasse(){
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();


        ClasseRoom::find($this->editClasse["id"])->update($validationAttributes["editClasse"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Classe mise à jour avec succès!"]);

        $this->currentPage = PAGELIST;
        $this->editClasse = [];

    }


    public function confirmDelete($name, $id){

        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des classes. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "classe_id" => $id
            ]
        ]]);
    }

    public function deleteClasse($id){
    	
        ClasseRoom::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Classe supprimée avec succès!"]);

       $this->currentPage = PAGELIST;
    }
}
