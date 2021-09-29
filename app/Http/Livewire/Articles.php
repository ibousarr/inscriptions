<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Article;
use App\Models\TypeArticle;
use App\Models\ProprieteArticle;
use Livewire\WithPagination;

class Articles extends Component
{
	use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $currentPage = PAGELIST;

    public $newArticle = [];
    public $editArticle = [];
    public $types;

    public function render()
    {
        return view('livewire.articles.index', [
        	'articles'	=>	Article::paginate(5)
        ])
        ->extends("layouts.master")
        ->section("contenu");
    }

    public function rules(){
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editArticle.nom' => 'required',
                'editArticle.no_serie' => 'required',
                'editArticle.type_article_id' => 'required',
                'editArticle.estDisponible' => 'number',

            ];
        }

        return [
            'newArticle.nom' => 'required',
            'newArticle.noSerie' => 'required',
            'newArticle.estDisponible' => 'number',
            'newArticle.type_article_id' => 'required',
        ];
    }


    public function goToAddArticle(){

    	$this->types = TypeArticle::all();
    	
        $this->currentPage = PAGECREATEFORM;
    }

    public function addArticle(){

        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();

        //dump($validationAttributes);
        // Ajouter un nouvel utilisateur
        User::create($validationAttributes["newArticle"]);

        $this->newArticle = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article créé avec succès!"]);
    }

    public function goToEditArticle($id){
        $this->editArticle = Article::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }


    public function confirmDelete($name, $id){
        $this->dispatchBrowserEvent("showConfirmMessage", ["message"=> [
            "text" => "Vous êtes sur le point de supprimer $name de la liste des articles. Voulez-vous continuer?",
            "title" => "Êtes-vous sûr de continuer?",
            "type" => "warning",
            "data" => [
                "article_id" => $id
            ]
        ]]);
    }

    public function deleteArticle($id){
        Article::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message"=>"Article supprimé avec succès!"]);
    }
}
