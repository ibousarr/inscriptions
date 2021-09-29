<div class="row p-4 pt-1">
    <div class="col-12">
        <div class="card row">
            <div class="card-header text-white bg-gradient-primary d-flex align-items-center">
                <h2 class="card-title flex-grow-1">
                    <i class="fas fa-pen fa-2x"></i>
                    Absences
                </h2>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button wire:click="filterAbsencesByClasse" type="button" class="btn {{ is_null($laClasse) ? 'btn-secondary' : 'btn-info' }}">
                            <span class="mr-1">All</span>
                            <span class="badge badge-pill badge-warning">{{nbAbsences()}}</span>
                        </button>
                        @foreach($classes as $classe)
                        <button  wire:click="filterAbsencesByClasse({{$classe->id}})" type="button" class="btn {{ ($laClasse == $classe->id) ? 'btn-secondary' : 'btn-info' }} border-r border-solid">
                            <span class="mr-1">{{$classe->libClasse}}</span>
                            <span class="badge badge-pill badge-danger">{{nbAbsences($classe->id)}}</span>
                        </button>
                        @endforeach
                        @if(!is_null($laClasse))
                            <div>
                                <button wire:click="showModalAbsence({{$laClasse}})" type="button" class="btn btn-success">
                                    <span class="mr-1">Nouvelle absence</span>
                                    <span class="p-1 badge badge-pill badge-info"><i class="fas fa-pen"></i></span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div> 
            </div>
        </div>

            <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-striped" style="height: 450px;">
            @if($absences->count()>0)   
            <table class="table table-head-fixed">
                <thead>
                    <tr>
                        <th >Mat</th>
                        <th >Nom complet</th>
                        <th >Classe</th>
                        <th >Type</th>
                        <th >DateDébut</th>
                        <th >DateFin</th>
                        <th >HDébut</th>
                        <th >HFin</th>
                        <th >NbJours</th>
                        <th >NbHeures</th>
                        <th  class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absences as $absence)
                    <tr>
                        <td>
                           {{ $absence->student->matricule }} 
                        </td>
                        <td> {{ $absence->student->nomComplet() }} </td>
                        <td class="text-left"> {{ $absence->classeRoom->libClasse }} </td>
                        <td> {{ $absence->type }} </td>
                        <td> {{ $absence->dateDebut }} </td>
                        <td> {{ $absence->dateFin }} </td>
                        <td> {{ $absence->heureDeb }} </td>
                        <td> {{ $absence->heureFin }} </td>
                        <td> {{ $absence->nbJours }} </td>
                        <td> {{ $absence->nbHeures }} </td>
                        <td class="text-center">

                            <button wire:click="showEditModalAbsence('{{$absence->student->nomComplet()}}','{{ $absence->classeRoom->libClasse }}', {{$absence->id}})" type="button" class="btn btn-link text-success"> <i class="far fa-edit"></i> </button>
                           
                              <button class="btn btn-link text-danger">
                                <i class="far fa-trash-alt"></i>
                              </button>
                        
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            <!-- /.card-body -->
            <div class="card-footer">
               
                <div class="float-right">
                    {{ $absences->links() }}
                </div>
                
            </div>
            @else
            <div class="text-center bg-secondary py-3">
                Pas d'absences pour la classe
            </div>
            @endif
        </div>
            
    </div>
              
            
            <!-- /.card -->
</div>




