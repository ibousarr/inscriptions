<div wire:ignore.self>
    @if($currentPage == PAGECREATEFORM)
         @include("livewire.absences.create")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.absences.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.absences.liste")
    @endif

    @if($currentPage == PAGEVOIR)
        @include("livewire.absences.voir")
    @endif

    @include("livewire.absences.addAbsence")

    @include("livewire.absences.editAbsence")

</div>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: true,
                timer: 5000
                }
            )
    })
</script>

<script>
    window.addEventListener("showConfirmMessage", event=>{
       Swal.fire({
        title: event.detail.message.title,
        text: event.detail.message.text,
        icon: event.detail.message.type,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuer',
        cancelButtonText: 'Annuler'
        }).then((result) => {
        if (result.isConfirmed) {
            if(event.detail.message.data){
                @this.deleteAbsence(event.detail.message.data.absence_id)
            }
        }
        })
    })
</script>
<script>
    window.addEventListener("showAbsenceModal", event=>{
       $("#modalAbsence").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("showAbsenceModal", event=>{
       $("#modalAbsence").modal("hide")
    })

    window.addEventListener("showEditModal", event=>{
       $("#modalEditAbsence").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("showEditModal", event=>{
       $("#modalEditAbsence").modal("hide")
    })
</script>