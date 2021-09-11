<?php

namespace App\Http\Livewire\Inscriptions;

use Livewire\Component;
use App\Models\Student;
use App\Models\Inscription;
use App\Models\classeRoom;
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
    public $quelleClasse = "6";

    public function render()
    {
    	
        $classeId = $this->quelleClasse;
    	$param = '%'.$classeId.'%';
        return view('livewire.inscriptions.index', [
        	'classes'	=>	classeRoom::all(),
        	'inscriptions' => Inscription::with(['student'])->whereRelation('classeRoom', 'libClasse', 'like', $param)->paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function updatedQuelleClasse($value)

    {
    	$this->resetPage();
    	$this->quelleClasse = $value;
       
    }
}
