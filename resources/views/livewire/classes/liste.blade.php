<div class="row p-4 pt-1">
          <div class="col-12">
            <div class="card">
              <div class="card-header text-white bg-gradient-info d-flex align-items-center">
                <h2 class="card-title flex-grow-1">
                    <i class="fas fa-sitemap fa-2x"></i>
                    Liste des classes
                </h2>
                <div class="card-tools d-flex align-items-center ">
                    <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddClasse()">
                        <i class="fas fa-sitemap"></i>
                        Nouvelle classe
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
                      <th style="width:20%;">Référence</th>
                      <th style="width:15%;" >Libellé</th>
                      <th style="width:20%;">Nombre de Tables</th>
                      <th style="width:20%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($classes as $classe)
                    <tr>
                      <td>
                        {{ $classe->id }}
                      </td>
                      <td>{{ $classe->refClasse }}</td>
                      <td>{{ $classe->libClasse}}</td>
                      <td class="text-left"><span class="tag tag-success">{{ $classe->nbTables }}</span></td>
                      <td class="text-center">
                        <button class="btn btn-link" wire:click="goToEditClasse({{$classe->id}})"> <i class="far fa-edit"></i> </button>
                        <button class="btn btn-link text-danger" wire:click="confirmDelete('{{ $classe->libClasse }}', {{$classe->id}})"> <i class="far fa-trash-alt"></i> </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{ $classes->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>




