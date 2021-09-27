<div class="row p-4 pt-1">
    <div class="col-12">
        <div class="card row">
            <div class="card-header text-white bg-gradient-info d-flex align-items-center">
                <h2 class="card-title flex-grow-1">
                    <i class="fas fa-pen fa-2x"></i>
                    Liste des Absences
                </h2>
            </div>
        </div>

            <!-- /.card-header -->
        <div class="card-body table-responsive p-0 table-striped" style="height: 450px;">
                
            <table class="table table-head-fixed">
                <thead>
                    <tr>
                        <th >Mat</th>
                        <th >Nom complet</th>
                        <th >Classe</th>
                        <th >Type</th>
                        <th >DateDébut</th>
                        <th >DateFin</th>
                        <th >HDébut</th>
                        <th >HFin</th>
                        <th >NbJours</th>
                        <th >NbHeures</th>
                        <th  class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absences as $absence)
                    <tr>
                        <td>
                           {{ $absence->student->matricule }} 
                        </td>
                        <td> {{ $absence->student->nomComplet() }} </td>
                        <td class="text-left"> {{ $absence->classeRoom->libClasse }} </td>
                        <td> {{ $absence->type }} </td>
                        <td> {{ $absence->dateDebut }} </td>
                        <td> {{ $absence->dateFin }} </td>
                        <td> {{ $absence->heureDebut }} </td>
                        <td> {{ $absence->heureFin }} </td>
                        <td> {{ $absence->nbJours }} </td>
                        <td> {{ $absence->nbHeures }} </td>
                        <td class="text-center">
                            <button class="btn btn-link text-success"> <i class="far fa-edit"></i> </button>
                           
                              <button class="btn btn-link text-danger">
                                <i class="far fa-trash-alt"></i>
                              </button>
                        
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- /.card-body -->
            <div class="card-footer">
               
                <div class="float-right">
                    {{ $absences->links() }}
                </div>
                
            </div>
        </div>
            
    </div>
              
            
            <!-- /.card -->
</div>




