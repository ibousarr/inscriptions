<div class="row p-4 pt-5">
            <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-sitemap-plus fa-2x"></i> Formulaire de création d'une nouvellle classe</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addClasse()">
                <div class="card-body">

                {{-- <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label >Référence</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label >Dénomination</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div> --}}

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Référence</label>
                            <input type="text" wire:model="newClasse.refClasse" class="form-control @error('newClasse.refClasse') is-invalid @enderror">

                            @error("newClasse.refClasse")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Dénomination</label>
                            <input type="text" wire:model="newClasse.libClasse" class="form-control @error('newClasse.libClasse') is-invalid @enderror">

                            @error("newClasse.libClasse")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Niveau</label>
                            <input type="text" wire:model="newClasse.niveau" class="form-control @error('newClasse.niveau') is-invalid @enderror">

                            @error("newClasse.niveau")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Nbre de tables</label>
                            <input type="text" wire:model="newClasse.nbTables" class="form-control @error('newClasse.nbTables') is-invalid @enderror">

                            @error("newClasse.nbTables")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Enregistrer</button>
                  <button type="button" wire:click="goToListClasse()" class="btn btn-danger">Retouner à la liste des classes</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>

