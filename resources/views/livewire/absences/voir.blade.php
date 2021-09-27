<div class="row p-4 pt-1">
    <div class="col-12">
        <div class="card">
            <div class="card-header text-white bg-gradient-info d-flex align-items-center">
                <h2 class="card-title flex-grow-1">
                    <i class="fas fa-pen fa-2x"></i>
                    Liste des Elèves
                </h2>

                <div class="card-tools d-flex align-items-center ">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">Choix classe</div>
                        </div>
                        <select class="form-control" wire:model="quelleClasse">
                            <option value="">Choisir une classe</option>
                            @foreach($classes as $classe)
                                <option value="{{$classe->id}}">{{$classe->libClasse}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if($quelleClasse>2)
                    <div class="col-auto">
                        <button 
                            type="submit" 
                            class="btn btn-primary"
                            wire:click.prevent="goToAddAbsence({{$quelleClasse}})">Ajouter une absence
                        </button>
                    </div>
                    @endif
                </div>
            </div>

            <!-- /.card-header -->
            <div class="card-body table-responsive p-0 table-striped" style="height: 450px;">
                
                <table class="table table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width:10%;">Matricule</th>
                            <th style="width:25%;">Nom complet</th>
                            <th style="width:5%;">Classe</th>
                            <th style="width:10%;">Début</th>
                            <th style="width:10%;">Fin</th>
                            <th style="width:10%;">NbJours</th>
                            <th style="width:10%;">NbHeures</th>
                            <th style="width:20%;" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absences as $absence)
                            <tr>
                                <td>{{ $absence->student->matricule }}</td>
                                <td>{{ $absence->student->nomComplet() }}</td>
                                <td>
                                    {{ $absence->classeRoom->libClasse }}
                                </td>
                                <td>
                                    {{ $absence->debut }}
                                </td>
                                <td>
                                    {{ $absence->fin }}
                                </td>
                                <td>
                                    {{ $absence->nbJours }}
                                </td>
                                <td>
                                    {{ $absence->nbHeures }}
                                </td>
                                <td class="text-center">
                                    @can('admin')
                                      <button class="btn btn-link text-info" wire:click.prevent="goToEditAbsence({{ $absence->id }})">
                                        <i class="far fa-trash-alt"></i>
                                      </button>
                                      <button class="btn btn-link text-danger" wire:click="confirmDelete('{{$absence->student->nomComplet()}}', {{$absence->id}})"> <i class="far fa-trash-alt"></i> </button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- /.card-body -->
                <div class="card-footer">
                    @if($absences->count()>0)
                    <div class="float-right">
                        {{ $absences->links() }}
                    </div>
                    @endif
                </div>
            </div>
            
        </div>
              
            
            <!-- /.card -->
    </div>
</div>
