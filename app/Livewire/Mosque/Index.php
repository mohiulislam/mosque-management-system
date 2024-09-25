<?php

namespace App\Livewire\Mosque;

use App\Models\Mosque;
use Livewire\Component;

class Index extends Component
{
    public $mosques;

    public function mount()
    {
        $this->mosques = Mosque::all();
    }

    public function delete($id)
    {
        Mosque::find($id)->delete();
        session()->flash('message', 'Mosque deleted successfully!');
    }


    public function render()
    {

        return view('livewire.mosque.index');
    }
}
