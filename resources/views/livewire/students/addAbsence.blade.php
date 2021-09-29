<div class="modal fade" id="modalAbsence" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><h2><b>Elève : {{$absenceName}}</b></h2>.</h5>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-sitemap-plus fa-2x"></i> Formulaire d'ajout d'une absence</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="addAbsence()">
                <div class="card-body bg-gray">

                    <div class="d-flex">
                        
                        <div class="form-group flex-grow-2 mr-2">
                            <label >Type</label>
                            <select class="form-control @error('newAbsence.type') is-invalid @enderror" wire:model="newAbsence.type">
                                <option value="">Choix du type d'absence</option>
                                <option value="Absence">Absence</option>
                                <option value="Retard">Retard</option>
                                <option value="Renvoi temporaire">Renvoi</option>
                            </select>
                            @error("newAbsence.type")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Date de début de l'absence</label>
                            <input type="date"  class="form-control @error('newAbsence.dateDebut') is-invalid @enderror" wire:model="newAbsence.dateDebut">

                            @error("newAbsence.dateDebut")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Date de fin des absences</label>
                            <input type="date" class="form-control @error('newAbsence.dateFin') is-invalid @enderror" wire:model="newAbsence.dateFin">

                            @error("newAbsence.dateFin")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Heure de début</label>
                            <input type="time"  class="form-control @error('newAbsence.heureDeb') is-invalid @enderror" wire:model="newAbsence.heureDeb">

                            @error("newAbsence.heureDeb")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Heure de fin</label>
                            <input type="time" class="form-control @error('newAbsence.heureFin') is-invalid @enderror" wire:model="newAbsence.heureFin">

                            @error("newAbsence.heureFin")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

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

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Eleve</label>
                            <input disabled="true" type="text" class="form-control @error('newAbsence.student_id') is-invalid @enderror" wire:model="absenceStudent">

                            @error("newAbsence.student_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Classe</label>
                            <input disabled="true" type="text" class="form-control @error('newAbsence.clase_room_id') is-invalid @enderror" wire:model="absenceClasse"  value="{{$absenceClasse}}">

                            @error("newAbsence.clase_room_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Agent</label>
                            <input disabled="true" type="text" class="form-control @error('newAbsence.user_id') is-invalid @enderror" wire:model="absenceUser">

                            @error("newAbsence.user_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <button type="submit" class="btn btn-primary mr-20">
                                Enregistrer
                            </button>
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger" wire:click="closeModal">Annuler</button>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            </div>
            <div class="modal-footer bg-info">
                <h3>Saisie par : {{auth()->user()->prenom}} {{auth()->user()->nom}} </h3>
            </div>
        </div>
    </div>
</div>
