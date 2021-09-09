<div class="row p-4 pt-5">
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire de création d'un nouvel article</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addArticle()">
                <div class="card-body">

                {{-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label >Nom</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label >Prenom</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div> --}}

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nom</label>
                            <input type="text" wire:model="newArticle.nom" class="form-control @error('newArticle.nom') is-invalid @enderror">

                            @error("newArticle.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Numéro de série</label>
                            <input type="text" wire:model="newArticle.numSerie" class="form-control @error('newArticle.numSerie') is-invalid @enderror">

                            @error("newArticle.numSerie")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                  <div class="form-group">
                        <label >Image</label>
                        <input type="text" class="form-control @error('newArticle.imageUrl') is-invalid @enderror" wire:model="newArticle.imageUrl">
                        @error("newArticle.imageUrl")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                  </div>

                  <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Disponibilité</label>
                            <select class="form-control @error('newArticle.estDisponible') is-invalid @enderror" wire:model="newArticle.estDisponible">
                                <option value="">---------</option>
                                <option value="1">Est disponible</option>
                                <option value="0">Non disponible</option>
                            </select>
                            @error("newArticle.estDisponible")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Type d'article</label>
                            <select class="form-control @error('newArticle.type_article_id') is-invalid @enderror" wire:model="newArticle.type_article_id">
                                <option value="">---------</option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->nom}}</option>
                                @endforeach
                            </select>
                            @error("newArticle.type_article_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" wire:click="goToListArticle()" class="btn btn-danger">Retouner à la liste des articles</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>

