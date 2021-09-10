<div class="row p-4 pt-5">
            <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-sitemap-plus fa-2x"></i> Formulaire d'édition d'une nouvellle classe</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="updateClasse()">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Référence</label>
                            <input type="text" wire:model="editClasse.refClasse" class="form-control @error('editClasse.refClasse') is-invalid @enderror">

                            @error("editClasse.refClasse")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Dénomination</label>
                            <input type="text" wire:model="editClasse.libClasse" class="form-control @error('editClasse.libClasse') is-invalid @enderror">

                            @error("editClasse.libClasse")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1">
                            <label >Nombre de tables disponibles</label>
                            <input type="text" wire:model="editClasse.nbTables" class="form-control @error('editClasse.nbTables') is-invalid @enderror">

                            @error("editClasse.nbTables")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Mettre à jour</button>
                  <button type="button" wire:click="goToListClasse()" class="btn btn-danger">Retouner à la liste des classes</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>

