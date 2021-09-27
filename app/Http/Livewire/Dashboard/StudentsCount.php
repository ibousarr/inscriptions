<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Student;

class StudentsCount extends Component
{
	public $studentsCount;
    public $masculins;
    public $feminins;

    public function mount()
    {
        $this->getStudentsCount();
    }

    public function getStudentsCount($option = 'TODAY')
    {
        $this->studentsCount = Student::query()
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
        $this->masculins = Student::query()
            ->where('sexe', 'M')
            ->count();
        
        $this->feminins = Student::query()
        ->where('sexe', 'F')
        ->count();
        
        return view('livewire.dashboard.students-count');
    }
}
