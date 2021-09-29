<div class="row p-4 pt-1">
    <div class="col-12">
        <div class="card row">
            <div class="card-header text-white bg-gradient-info d-flex align-items-center">
                <h2 class="col-2 card-title">
                    <i class="fas fa-coins fa-2x"></i>
                    Inscriptions
                </h2>
                <div class="col-3 align-items-center ">
                    <a class="btn btn-link text-white mr-24">
                        <i class="fas fa-pen"></i>
                        Nouvelle inscription
                    </a>
                </div>
                
                <div class="col-5 input-group block float-right">
                    <select class="mr-4 outline-none" wire:model="quelleClasse">
                        <option value="">Choix classe</option>
                        @foreach($classes as $classe)
                            <option value="{{$classe->libClasse}}">{{$classe->libClasse}}</option>
                        @endforeach
                    </select>
                    <select class="mr-4 outline-none" wire:model="quelType">
                        <option value="">Choix type</option>
                        @foreach($types as $type)
                            <option value="{{$type->nom}}">{{$type->nom}}</option>
                        @endforeach
                    </select>
                    <select class="mr-4 outline-none" wire:model="quelStatut">
                        <option value="">Choix statut</option>
                        @foreach($statuts as $statut)
                            <option value="{{$statut->nom}}">{{$statut->nom}}</option>
                        @endforeach
                    </select>
                    <!-- <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                    </div> -->
                </div>
                <div class="col-2">
                    @if($inscriptions->count()>0)
                    
                        {{ $inscriptions->count() }} élèves trouvés
                   
                    @else
                        Vos conditions ne sont pas remplies.
                    @endif
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
                           
                              <button class="btn btn-link text-danger" wire:click="confirmDelete('{{ $inscription->student->nomComplet() }}', {{$inscription->id}})">
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
                    {{ $inscriptions->count() }}
                </div>
                @else
                    <div class="text-center font-bold"><h3><b>Pas d'élèves de la classe "{{$quelleClasse}}" remplissant vos conditions.</b></h3></div>
                @endif
            </div>
        </div>
            
    </div>
              
            
            <!-- /.card -->
</div>




