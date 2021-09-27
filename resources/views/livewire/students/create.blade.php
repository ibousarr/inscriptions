<div class="row p-4 pt-5">
    <div class="col-md-10  mx-auto">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title"><i class="fas fa-sitemap-plus fa-2x"></i> Formulaire d'ajout d'un nouvel élève</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" wire:submit.prevent="addStudent()">
        <div class="card-body">

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Prénom</label>
                    <input type="text" wire:model="newStudent.prenoms" class="form-control @error('newStudent.prenoms') is-invalid @enderror">

                    @error("newStudent.prenoms")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1 mr-2">
                    <label >Nom de famille</label>
                    <input type="text" wire:model="newStudent.nom" class="form-control @error('newStudent.nom') is-invalid @enderror">

                    @error("newStudent.nom")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Date de naissance</label>                            
                    <input 
                        wire:model.lazy="newStudent.dateNaissance"
                        type="date" class="form-control @error('newStudent.dateNaissance') is-invalid @enderror" 
                       >
                    @error("newStudent.dateNaissance")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1 mr-2">
                    <label >Lieu de naissance</label>
                    <input type="text" wire:model="newStudent.lieuNaissance" class="form-control @error('newStudent.lieuNaissance') is-invalid @enderror">

                    @error("newStudent.lieuNaissance")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Sexe</label>
                    <select wire:model="newStudent.sexe" class="form-control @error('newStudent.sexe') is-invalid @enderror">
                        <option value="">Choisir le sexe</option>
                        <option value="M">Garçon</option>
                        <option value="F">Fille</option>
                    </select>
                    @error("newStudent.sexe")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1 mr-2">
                    <label >Matricule</label>
                    <input type="text" wire:model="newStudent.matricule" class="form-control @error('newStudent.matricule') is-invalid @enderror">

                    @error("newStudent.matricule")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Provenance</label>
                    <input type="text" wire:model="newStudent.provenance" class="form-control @error('newStudent.provenance') is-invalid @enderror">

                    @error("newStudent.provenance")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1 mr-2">
                    <label >Photo</label>
                    <input type="text" wire:model="newStudent.photo" class="form-control @error('newStudent.photo') is-invalid @enderror">

                    @error("newStudent.photo")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Prénoms du père</label>
                    <input type="text" wire:model="newStudent.pere" class="form-control @error('newStudent.pere') is-invalid @enderror">

                    @error("newStudent.pere")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1 mr-2">
                    <label >Prénoms et Nom de le mère</label>
                    <input type="text" wire:model="newStudent.mere" class="form-control @error('newStudent.mere') is-invalid @enderror">

                    @error("newStudent.mere")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="d-flex">
                <div class="form-group flex-grow-1 mr-2">
                    <label >Prénoms et Nom du tuteur</label>
                    <input type="text" wire:model="newStudent.tuteur" class="form-control @error('newStudent.tuteur') is-invalid @enderror">

                    @error("newStudent.tuteur")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group flex-grow-1 mr-2">
                    <label >Contact de la  famille</label>
                    <input type="text" wire:model="newStudent.contact" class="form-control @error('newStudent.contact') is-invalid @enderror">

                    @error("newStudent.contact")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group flex-grow-1 mr-2">
                    <label >Adresse</label>
                    <input type="text" wire:model="newStudent.adresse" class="form-control @error('newStudent.adresse') is-invalid @enderror">

                    @error("newStudent.adresse")
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Enregistrer</button>
          <button type="button" wire:click="goToListStudent()" class="btn btn-danger">Retouner à la liste des élèves</button>
        </div>
      </form>
    </div>
    <!-- /.card -->

  </div>
</div>


