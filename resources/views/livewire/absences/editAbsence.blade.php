<div class="modal fade" id="modalEditAbsence" tabindex="-1" role="dialog" wire:ignore.self>
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><h1><b>Gestion des absences</b></h1>.</h5>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fas fa-sitemap-plus fa-2x"></i>Modification d'une absence de : {{$student}} de la {{$classeName}}  </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" wire:submit.prevent="updateAbsenceClasse()">
                <div class="card-body bg-gray">

                    <div class="d-flex">
                        
                        <div class="form-group flex-grow-2 mr-2">
                            <label >Type</label>
                            <select class="form-control @error('editAbsence.type') is-invalid @enderror" wire:model="editAbsence.type">
                                <option value="">Choix du type d'absence</option>
                                <option value="Absence">Absence</option>
                                <option value="Retard">Retard</option>
                                <option value="Renvoi temporaire">Renvoi</option>
                            </select>
                            @error("editAbsence.type")
                                <span class="text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Date de début de l'absence</label>
                            <input type="date"  class="form-control @error('editAbsence.dateDebut') is-invalid @enderror" wire:model="editAbsence.dateDebut">

                            @error("editAbsence.dateDebut")
                                <span class="text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Date de fin des absences</label>
                            <input type="date" class="form-control @error('editAbsence.dateFin') is-invalid @enderror" wire:model="editAbsence.dateFin">

                            @error("editAbsence.dateFin")
                                <span class="text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Heure de début</label>
                            <input type="time"  class="form-control @error('editAbsence.heureDeb') is-invalid @enderror" wire:model="editAbsence.heureDeb">

                            @error("editAbsence.heureDeb")
                                <span class="text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Heure de fin</label>
                            <input type="time" class="form-control @error('editAbsence.heureFin') is-invalid @enderror" wire:model="editAbsence.heureFin">

                            @error("editAbsence.heureFin")
                                <span class="text-warning">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nombre de jours</label>
                            <input type="text"  class="form-control @error('editAbsence.nbJours') is-invalid @enderror" wire:model="editAbsence.nbJours">

                            @error("editAbsence.nbJours")
                                <span class="text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group flex-grow-1 mr-2">
                            <label >Nombre d'heures</label>
                            <input type="text" class="form-control @error('editAbsence.nbHeures') is-invalid @enderror" wire:model="editAbsence.nbHeures">

                            @error("editAbsence.nbHeures")
                                <span class="text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">

                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>

                    </div>
                </div>
                <!-- /.card-body -->
              </form>
            </div>
            </div>
            <div class="modal-footer bg-info">
                <button type="button" class="btn btn-danger" wire:click="closeEditAbsenceModal">
                        Annuler
                </button>
            </div>
        </div>
    </div>
</div>
