<div class="row p-4 pt-5">
            <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-sitemap-plus fa-2x"></i> Formulaire d'édition : {{$this->editStudent['prenoms']}} {{$this->editStudent['nom']}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="updateStudent()">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Prénom</label>
                            <input type="text" wire:model="editStudent.prenoms" class="form-control @error('editStudent.prenoms') is-invalid @enderror">

                            @error("editStudent.prenoms")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nom de famille</label>
                            <input type="text" wire:model="editStudent.nom" class="form-control @error('editStudent.nom') is-invalid @enderror">

                            @error("editStudent.nom")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Date de naissance</label>
                            <!-- <input 
                                type="text" 
                                wire:model="editStudent.dateNaissance" 
                                class="form-control @error('editStudent.dateNaissance') is-invalid @enderror"
                                value="{{Carbon\Carbon::parse($editStudent['dateNaissance'])->format('m/d/Y')}}"
                            > -->
                            <input 
                                wire:model.lazy="editStudent.dateNaissance"
                                type="text" class="form-control datepicker" placeholder="Date de Naissance" autocomplete="off"
                               >
                            @error("editStudent.dateNaissance")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Lieu de naissance</label>
                            <input type="text" wire:model="editStudent.lieuNaissance" class="form-control @error('editStudent.lieuNaissance') is-invalid @enderror">

                            @error("editStudent.lieuNaissance")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Sexe</label>
                            <input type="text" wire:model="editStudent.sexe" class="form-control @error('editStudent.sexe') is-invalid @enderror">

                            @error("editStudent.sexe")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Matricule</label>
                            <input type="text" wire:model="editStudent.matricule" class="form-control @error('editStudent.matricule') is-invalid @enderror">

                            @error("editStudent.matricule")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Provenance</label>
                            <input type="text" wire:model="editStudent.provenance" class="form-control @error('editStudent.provenance') is-invalid @enderror">

                            @error("editStudent.provenance")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Photo</label>
                            <input type="text" wire:model="editStudent.photo" class="form-control @error('editStudent.photo') is-invalid @enderror">

                            @error("editStudent.photo")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Prénoms du père</label>
                            <input type="text" wire:model="editStudent.pere" class="form-control @error('editStudent.pere') is-invalid @enderror">

                            @error("editStudent.pere")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Prénoms et Nom de le mère</label>
                            <input type="text" wire:model="editStudent.mere" class="form-control @error('editStudent.mere') is-invalid @enderror">

                            @error("editStudent.mere")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Prénoms et Nom du tuteur</label>
                            <input type="text" wire:model="editStudent.tuteur" class="form-control @error('editStudent.tuteur') is-invalid @enderror">

                            @error("editStudent.tuteur")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Contact de la  famille</label>
                            <input type="text" wire:model="editStudent.contact" class="form-control @error('editStudent.contact') is-invalid @enderror">

                            @error("editStudent.contact")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group flex-grow-1 mr-2">
                            <label >Adresse</label>
                            <input type="text" wire:model="editStudent.adresse" class="form-control @error('editStudent.adresse') is-invalid @enderror">

                            @error("editStudent.adresse")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Mettre à jour</button>
                  <button type="button" wire:click="goToListStudent()" class="btn btn-danger">Retouner à la liste des élèves</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>


