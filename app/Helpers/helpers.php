<?php
use Illuminate\Support\Str;
use App\Models\Absence;

define("PAGELIST", "liste");
define("PAGECREATEFORM", "create");
define("PAGEEDITFORM", "edit");
define("PAGEVOIR", "voir");
define("DEFAULTPASSOWRD", "password");



function userFullName(){
    return auth()->user()->prenom . " " . auth()->user()->nom;
}

function setMenuClass($route, $classe){
    $routeActuel = request()->route()->getName();

    if(contains($routeActuel, $route) ){
        return $classe;
    }
    return "";
}

function setMenuActive($route){
    $routeActuel = request()->route()->getName();

    if($routeActuel === $route ){
        return "active";
    }
    return "";
}

function contains($container, $contenu){
    return Str::contains($container, $contenu);
}

function nbAbsences($id = null)
    {
        if($id == null){
            $nb = Absence::count();
        }else{
            $nb = Absence::where('classe_room_id', $id)->count();
        }
        
        return $nb;
    }

function getRolesName(){
    $rolesName = "";
    $i = 0;
    foreach(auth()->user()->roles as $role){
        $rolesName .= $role->nom;

        //
        if($i < sizeof(auth()->user()->roles) - 1 ){
            $rolesName .= ",";
        }

        $i++;

    }

    return $rolesName;
}
