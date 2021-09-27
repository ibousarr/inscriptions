<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
            <div class="d-flex justify-content-between">
                <h3 wire:loading.delay.remove>{{ $absencesCount }}</h3>
                <div wire:loading.delay>
                    <x-animations.ballbeat />
                </div>
                <select wire:change="getAbsencesCount($event.target.value)" style="height: 2rem; outline: 2px solid transparent;" class="px-1 rounded border-0">
                    <option value="TODAY">Today</option>
                    <option value="30">30 days</option>
                    <option value="60">60 days</option>
                    <option value="360">360 days</option>
                    <option value="MTD">Month to Date</option>
                    <option value="YTD">Year to Date</option>
                </select>
            </div>
            <p>Absences</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="{{ route('admin.absences') }}" class="small-box-footer">Voir les absences <i class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
<!-- ./col -->
