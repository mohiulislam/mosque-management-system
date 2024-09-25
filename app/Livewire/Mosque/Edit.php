<?php

namespace App\Livewire\Mosque;

use Livewire\Component;
use App\Models\Mosque;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $mosque;
    public $name, $address, $contact_number, $capacity, $description, $image;

    public function mount($id)
    {
        $this->mosque = Mosque::find($id);
        $this->name = $this->mosque->name;
        $this->address = $this->mosque->address;
        $this->contact_number = $this->mosque->contact_number;
        $this->capacity = $this->mosque->capacity;
        $this->description = $this->mosque->description;
    }

    public function render()
    {
        return view('livewire.mosque.edit');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'contact_number' => 'nullable|string|max:20',
            'capacity' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('images', $imageName, 'public');
            $this->mosque->image = $imageName;
        }

        $this->mosque->update([
            'name' => $this->name,
            'address' => $this->address,
            'contact_number' => $this->contact_number,
            'capacity' => $this->capacity,
            'description' => $this->description,
            'image' => $this->mosque->image,
        ]);

        session()->flash('message', 'Mosque updated successfully!');

        return redirect()->route('mosques.index');
    }
}
