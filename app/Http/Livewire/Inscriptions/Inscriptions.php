<?php

namespace App\Http\Livewire\Inscriptions;

use Livewire\Component;
use App\Models\Student;
use App\Models\Inscription;
use App\Models\TypeInscription;
use App\Models\StatutInscription;
use App\Models\ClasseRoom;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use Livewire\WithPagination;

class Inscriptions extends Component
{
	use WithPagination;

	protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newInscription = [];
    public $editInscription = [];
    public $quelleClasse;
    public $quelType;
    public $quelStatut;

    public function render()
    {
    	$classeId = $this->quelleClasse;
        $paramcl = '%'.$classeId.'%';
        $paramty = '%'.$this->quelType.'%';
    	$paramst = '%'.$this->quelStatut.'%';



        return view('livewire.inscriptions.index', [
            'classes'       =>  ClasseRoom::all(),
            'types'         =>  TypeInscription::all(),
        	'statuts'	    =>	StatutInscription::where('id', '<', 4)->get(),
        	'inscriptions'  =>  Inscription::with(['student'])
                                            ->where('statut_inscription_id', '<', 4)
                                            ->whereRelation('classeRoom', 'libClasse', 'like', $paramcl)
                                            ->WhereRelation('type', 'nom', 'like', $paramty)
                                            ->WhereRelation('statut', 'nom', 'like', $paramst)
                                            ->get()
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function updatedQuelleClasse($value)

    {
    	$this->resetPage();
    	$this->quelleClasse = $value;
       
    }

    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer l'inscription de $name. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "inscription_id" => $id
            ]
        ]]);
    }

    public function deleteInscription($id)
    {
        $inscrit = Inscription::with('student')->where('id',$id)->firstOrFail();
        $name = $inscrit->student->nomComplet();
        
        Inscription::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"L'Inscription de $name a été supprimée avec succès!"]);
    }
}
