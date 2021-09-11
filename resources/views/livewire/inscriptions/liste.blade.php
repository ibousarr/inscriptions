<div class="row p-4 pt-1">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-white bg-gradient-info d-flex align-items-center">
                <h2 class="card-title flex-grow-1">
                    <i class="fas fa-coins fa-2x"></i>
                    Inscriptions
                </h2>
                <div class="card-tools d-flex align-items-center ">
                    <a class="btn btn-link text-white mr-4 d-block">
                        <i class="fas fa-pen"></i>
                        Nouvelle inscription
                    </a>
                    <div class="input-group block float-right" style="width: 550px;">
                        <label class="form-control text-right">Afficher les élèves de la classe =></label>
                        <select class="outline-none" wire:model="quelleClasse">
                                <option value="">---------</option>
                                @foreach($classes as $classe)
                                    <option value="{{$classe->libClasse}}">{{$classe->libClasse}}</option>
                                @endforeach
                            </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped" style="height: 450px;">
                
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width:10%;">Matricule</th>
                            <th style="width:30%;">Nom complet</th>
                            <th style="width:5%;">Classe</th>
                            <th style="width:15%;">Type</th>
                            <th style="width:15%;">Statut</th>                            
                            <th style="width:10%;">Montant</th>
                            <th style="width:15%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscriptions as $inscription)
                        <tr>
                            <td>
                               {{ $inscription->student->matricule }} 
                            </td>
                            <td> {{ $inscription->student->nomComplet() }} </td>
                            <td class="text-left"> {{ $inscription->classeRoom->libClasse }} </td>
                            <td> {{ $inscription->type->nom }} </td>
                            <td> {{ $inscription->statut->nom }} </td>
                            <td> {{ $inscription->type->montant }} </td>
                            <td class="text-center">
                                <button class="btn btn-link text-success"> <i class="far fa-edit"></i> </button>
                               
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
                    @if($inscriptions->count()>0)
                    <div class="float-right">
                        {{ $inscriptions->links() }}
                    </div>
                    @else
                        <div class="text-center font-bold"><h2><b>Pas d'élèves pour la classe "{{$quelleClasse}}" choisie</b></h2></div>
                    @endif
                </div>
            </div>
            
        </div>
              
            
            <!-- /.card -->
    </div>
</div>




