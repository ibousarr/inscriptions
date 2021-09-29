<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Inscription;

class InscriptionsCount extends Component
{
	public $inscriptionsCount;
    public $masculins;
    public $feminins;

    public function mount()
    {
        $this->getInscriptionsCount();
    }

    public function getInscriptionsCount($option = 'TODAY')
    {
        $this->studentsCount = Inscription::query()
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
        $this->masculins = Inscription::query()
            ->whereRelation('student', 'sexe', 'M')
            ->count();
        
        $this->feminins = Inscription::query()
        ->where(Relation('student', 'sexe', 'F')
        ->count();
        return view('livewire.dashboard.inscriptions-count');
    }
}
