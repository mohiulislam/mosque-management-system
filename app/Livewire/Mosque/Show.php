<?php

namespace App\Livewire\Mosque;

use Livewire\Component;
use App\Models\Mosque;

class Show extends Component
{
    public $mosque;

    public function mount($id)
    {
        $this->mosque = Mosque::find($id);
    }

    public function render()
    {
        return view('livewire.mosque.show', ['mosque' => $this->mosque]);
    }
}
