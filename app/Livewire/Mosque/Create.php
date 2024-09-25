<?php

namespace App\Livewire\Mosque;

use Livewire\Component;
use App\Models\Mosque;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name, $address, $contact_number, $capacity, $description, $image;

    public function render()
    {
        return view('livewire.mosque.create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'contact_number' => 'nullable|string|max:20',
            'capacity' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle the image upload
        if ($this->image) {
            $imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('images', $imageName, 'public');
        }

        Mosque::create([
            'name' => $this->name,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
            'capacity' => $this->capacity,
            'description' => $this->description,
            'image' => $imageName ?? null,
        ]);

        session()->flash('message', 'Mosque created successfully!');

        return redirect()->route('dashboard');
    }
}
