<div>
    <form wire:submit.prevent="update">
        <input type="text" wire:model="name" placeholder="Name">
        <input type="text" wire:model="address" placeholder="Address">
        <input type="text" wire:model="contact_number" placeholder="Contact Number">
        <input type="number" wire:model="capacity" placeholder="Capacity">
        <textarea wire:model="description" placeholder="Description"></textarea>
        <input type="file" wire:model="image">

        <button type="submit" class="btn btn-primary">Update Mosque</button>
    </form>
</div>
