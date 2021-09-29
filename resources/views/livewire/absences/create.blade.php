<div class="row p-4 pt-5">
            <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-sitemap-plus fa-2x"></i> Formulaire d'ajout d'une absence</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addAbsence()">
                <div class="card-body">

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Classe</label>                            
                            <select class="outline-none" wire:model="newAbsence.classe_room_id">
                            <option value="">---------</option>
                            @foreach($lesClasses as $classe)
                                <option value="{{$classe->id}}">{{$classe->libClasse}}</option>
                            @endforeach
                        </select>
                            @error("newAbsence.classe_room_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Type</label>
                            <select class="form-control @error('newAbsence.type') is-invalid @enderror" wire:model="newAbsence.type">
                                <option value="Absence">Absence</option>
                                <option value="Retard">Retard</option>
                                <option value="Renvoi temporaire">Renvoi temporaire</option>
                            </select>
                            @error("newAbsence.type")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Date de début</label>
                            <input type="date"  class="form-control @error('newAbsence.debut') is-invalid @enderror" wire:model="newAbsence.debut">

                            @error("newAbsence.debut")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Date de fin des absences</label>
                            <input type="date" class="form-control @error('newAbsence.fin') is-invalid @enderror" wire:model="newAbsence.fin">

                            @error("newAbsence.fin")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Heure de début</label>
                            <input type="date"  class="form-control @error('newAbsence.debut') is-invalid @enderror" wire:model="newAbsence.debut">

                            @error("newAbsence.debut")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Heure de fin</label>
                            <input type="date" class="form-control @error('newAbsence.fin') is-invalid @enderror" wire:model="newAbsence.fin">

                            @error("newAbsence.fin")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nombre de jours</label>
                            <input type="text"  class="form-control @error('newAbsence.nbJours') is-invalid @enderror" wire:model="newAbsence.nbJours">

                            @error("newAbsence.nbJours")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nombre d'heures</label>
                            <input type="text" class="form-control @error('newAbsence.nbHeures') is-invalid @enderror" wire:model="newAbsence.nbHeures">

                            @error("newAbsence.nbHeures")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group flex-grow-1 mr-2">
                            <label >Elève</label>                            
                            <select class="outline-none" wire:model="newAbsence.student_id">
                            <option value="">---------</option>
                            @foreach($inscriptions as $inscription->student)
                                <option value="{{$inscription->student->id}}">{{$inscription->student->nomComplet()}}</option>
                            @endforeach
                        </select>
                            @error("newAbsence.student_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <button type="submit" class="btn btn-primary">
                                Enregistrer
                            </button>
                            <button type="button" wire:click="goToListStudent()" class="btn btn-danger">
                                Retouner à la liste des élèves
                            </button>
                        </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer bg-info">
                    <p>OK</p>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>


