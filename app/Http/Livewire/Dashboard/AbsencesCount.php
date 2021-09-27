<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Absences;

class AbsencesCount extends Component
{
	public $absencesCount;

    public function mount()
    {
        $this->getAbsencesCount();
    }

    public function getAbsencesCount($option = 'TODAY')
    {
        $this->absencesCount = Absence::query()
            ->whereBetween('created_at', $this->getDateRange($option))
            ->count();
    }

    public function getDateRange($option)
    {
        if ($option == 'TODAY') {
            return [now()->today(), now()];
        }

        if ($option == 'MTD') {
            return [now()->firstOfMonth(), now()];
        }

        if ($option == 'YTD') {
            return [now()->firstOfYear(), now()];
        }

        return [now()->subDays($option), now()];
    }

    public function render()
    {
        return view('livewire.dashboard.absences-count');
    }
}
