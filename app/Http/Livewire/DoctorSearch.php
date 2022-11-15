<?php

namespace App\Http\Livewire;

use App\Models\doctors;
use App\Models\sections;
use Livewire\Component;

class DoctorSearch extends Component
{
    public $search = '';

    public $selectFilter = '';

    public function render()
    {
        // return view('livewire.doctor-search');

        return view('livewire.doctor-search', [
            'doctors' => doctors::where('code', $this->search)->orWhere('doctor_sections', $this->selectFilter)->get(),
            'sections' => sections::all(),
        ]);
    }
}
