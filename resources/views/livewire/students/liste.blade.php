<div class="row p-4 pt-1">
          <div class="col-12">
            <div class="card">
              <div class="card-header text-white bg-gradient-info d-flex align-items-center">
                <h2 class="card-title flex-grow-1">
                    <i class="fas fa-pencil fa-2x"></i>
                    Liste des Elèves
                </h2>
                <div class="card-tools d-flex align-items-center ">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddStudent()">
                        <i class="fas fa-pencil"></i>
                        Nouvel élève
                    </a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                      <th style="width:5%;">#</th>
                      <th style="width:20%;">Nom complet</th>
                      <th style="width:10%;">Né le</th>
                      <th style="width:15%;">A</th>
                      <th style="width:15%;">Classe</th>
                      <th style="width:50%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($inscriptions as $inscription)
                    <tr>
                      <td>
                        {{ $inscription->student->id }}
                      </td>
                      <td>{{ $inscription->student->nomComplet() }}</td>
                      <td class="text-left">{{ $inscription->student->dateNaissance->format('d/m/Y') }}</td>
                      <td>{{ $inscription->student->lieuNaissance}}</td>
                      <td>{{ $inscription->classeRoom->libClasse }} </td>
                      <td class="text-center">
                        <button class="btn btn-link" wire:click="goToEditStudent({{$inscription->student->id}})"> <i class="far fa-edit"></i> </button>
                        @can('superadmin')
                          <button class="btn btn-link text-danger" wire:click="confirmDelete('{{ $inscription->student->nomComplet }}', {{$inscription->student->id}})">
                            <i class="far fa-trash-alt"></i>
                          </button>
                        @endcan
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{ $inscriptions->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>




