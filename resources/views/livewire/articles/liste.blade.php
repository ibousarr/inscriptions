<div class="row p-4 pt-1">
          <div class="col-12">
            <div class="card">
              <div class="card-header bg-gradient-primary d-flex align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i> Liste des articles</h3>

                <div class="card-tools d-flex align-items-center ">
                <a class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddArticle()"><i class="fas fa-user-plus"></i> Nouvel article</a>
                  <div class="input-group input-group-md" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
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
                      <th style="width:20%;">Nom</th>
                      <th style="width:15%;" >NumSérie</th>
                      <th style="width:20%;">Image</th>
                      <th style="width:20%;" >Type</th>
                      <th style="width:20%;" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($articles as $article)
                    <tr>
                      <td>
                        {{ $article->id }}
                      </td>
                      <td>{{ $article->nom }}</td>
                      <td>{{ $article->noSerie}}</td>
                      <td>
                          <img width="30%" src="{{ $article->imageUrl}}" alt="Image">
                      </td>
                      <td class="text-left"><span class="tag tag-success">{{ $article->type->nom }}</span></td>
                      <td class="text-center">
                        <button class="btn btn-link" wire:click="goToEditArticle({{$article->id}})"> <i class="far fa-edit"></i> </button>
                        <button class="btn btn-link" wire:click="confirmDelete('{{ $article->nom }}', {{$article->id}})"> <i class="far fa-trash-alt"></i> </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                    {{ $articles->links() }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>



