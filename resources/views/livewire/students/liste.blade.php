<div>
    
    <div class="row p-4 pt-1">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-white bg-gradient-info d-flex justify-content-between align-items-center ">
                    <h2 class="card-title mr-6">
                        <i class="fas fa-pen fa-2x mr-2"></i>
                        Liste des Elèves
                    </h2>

                    <div class="d-flex">
                        <button wire:click="goToAddStudent" type="button" class="btn btn-default mr-3">
                            <i class="text-success fa fa-plus-circle mr-1"><span class="badge badge-pill badge-success"></i>Nouveau</span>
                        </button>
                        <div class="d-flex">
                            
                            <div class="mr-2">
                                <select class="form-control" wire:model="inscriptionStatut">
                                    <option value="">Inscription</option>
                                    <option value="En attente">En attente</option>
                                    <option value="En cours">En cours</option>
                                    <option value="Terminée">Terminée</option>
                                    <option value="Validée">Validée</option>
                                    <option value="Suspendue">Suspendue</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        @if ($selectedRows)
                        <div>
                            <div class="btn-group ml-2">
                                <button type="button" class="btn btn-default">Bulk Actions</button>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a wire:click.prevent="export" class="dropdown-item" href="#">Export</a>
                                </div>
                            </div>

                            <span class="mx-2">selected {{ count($selectedRows) }} {{ Str::plural('inscrit', count($selectedRows)) }}</span>
                        </div>
                        @else
                        <div class="input-group input-group-md mr-3" style="width: 250px;">
                            <input wire:model.debounce.500ms="search" type="search" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button wire:click="filterStudentsByNiveau" type="button" class="btn {{ is_null($niveau) ? 'btn-secondary' : 'btn-default' }}">
                                    <span class="mr-1">All</span>
                                    <span class="badge badge-pill badge-info">{{ $studentsCount }}</span>
                                </button>

                                <button wire:click="filterStudentsByNiveau('Troisième')" type="button" class="btn {{ ($niveau === 'Troisième') ? 'btn-secondary' : 'btn-default' }}">
                                    <span class="mr-1">3è</span>
                                    <span class="badge badge-pill badge-primary">{{ $troisiemesCount }}</span>
                                </button>

                                <button wire:click="filterStudentsByNiveau('Quatrième')" type="button" class="btn {{ ($niveau === 'Quatrième') ? 'btn-secondary' : 'btn-default' }}">
                                    <span class="mr-1">4è</span>
                                    <span class="badge badge-pill badge-warning">{{ $quatriemesCount }}</span>
                                </button>

                                <button wire:click="filterStudentsByNiveau('Cinquième')" type="button" class="btn {{ ($niveau === 'Cinquième') ? 'btn-secondary' : 'btn-default' }}">
                                    <span class="mr-1">5è</span>
                                    <span class="badge badge-pill badge-danger">{{ $cinquiemesCount }}</span>
                                </button>
                                <button wire:click="filterStudentsByNiveau('Sixième')" type="button" class="btn {{ ($niveau === 'Sixième') ? 'btn-secondary' : 'btn-default' }}">
                                    <span class="mr-1">6è</span>
                                    <span class="badge badge-pill badge-success">{{ $sixiemesCount }}</span>
                                </button>
                            </div>
                        </div>                       
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0 table-striped" style="height: 550px;">
                    
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th style="width:5%;">
                                    <div class="icheck-primary d-inline ml-2">
                                        <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                                        <label for="todoCheck2"></label>
                                    </div>
                                </th>
                                <th style="width:10%;">#</th>
                                <th style="width:20%;">Nom complet</th>
                                <th style="width:10%;">Né le</th>
                                <th style="width:15%;">A</th>
                                <th style="width:10%;">Classe</th>
                                <th style="width:10%;">Inscription</th>
                                <th style="width:20%;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inscriptions as $inscription)
                                <tr>
                                    <th>
                                        <div class="icheck-primary d-inline">
                                            <input wire:model="selectedRows" type="checkbox" value="{{ $inscription->student->id }}" name="todo2" id="{{ $inscription->student->id }}">
                                            <label for="{{ $inscription->student->id }}"></label>
                                        </div>
                                    </th>
                                    
                                    <td>
                                      <img width="30%" src="{{ $inscription->student->photo }}" alt="{{ $inscription->student->id }}">
                                    </td>
                                    <td>{{ $inscription->student->nomComplet() }}</td>
                                    <td class="text-left">{{ $inscription->student->dateNaissance->format('d/m/Y') }}</td>
                                    <td>{{ $inscription->student->lieuNaissance}}</td>
                                    <td>{{ $inscription->classeRoom->libClasse }} </td>
                                    <td>{{ $inscription->statut->nom }} </td>
                                    <td class="text-center">
                                        <button class="btn btn-link" wire:click="goToEditStudent({{$inscription->student->id}})"> <i class="far fa-edit"></i> </button>
                                    @if($inscription->statut->id > 2)
                                        <span class="badge badge-pill badge-primary">Inscrit</span>
                                    @else
                                      <button class="btn btn-link text-danger" wire:click="confirmDelete('{{ $inscription->student->nomComplet() }} - {{$inscription->classeRoom->libClasse}}', {{$inscription->student->id}})">
                                        <i class="far fa-trash-alt"></i>
                                      </button>
                                    @endif

                                      <button class="btn btn-link text-info" wire:click="showModalAbsence('{{ $inscription->student->nomComplet() }}', {{$inscription->student->id}}, {{ $inscription->classeRoom->id}})">
                                        <i class="fas fa-pen"></i>
                                      </button>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.card-body -->
                    <div class="card-footer">                        
                        
                    </div>
                </div>
                
            </div>
                     
                <!-- /.card -->
        </div>
    </div>
</div>




