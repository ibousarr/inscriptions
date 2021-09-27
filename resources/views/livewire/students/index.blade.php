<div wire:ignore.self>

    @if($currentPage == PAGECREATEFORM)
         @include("livewire.students.create")
    @endif

    @if($currentPage == PAGEEDITFORM)
        @include("livewire.students.edit")
    @endif

    @if($currentPage == PAGELIST)
        @include("livewire.students.liste")
    @endif

    @include("livewire.students.addAbsence")

</div>

<script>
    window.addEventListener("showSuccessMessage", event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast:true,
                title: event.detail.message || "Opération effectuée avec succès!",
                showConfirmButton: false,
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
                @this.deleteStudent(event.detail.message.data.student_id)
            }
        }
        })
    });

    window.addEventListener("showConfirmAbsence", event=>{
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
                @this.absenceStudent(event.detail.message.data.student_id)
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
       $("#editModalProp").modal({
           "show": true,
           "backdrop": "static"
       })
    })
    window.addEventListener("closeEditModal", event=>{
       $("#editModalProp").modal("hide")
    })
</script>

