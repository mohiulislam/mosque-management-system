
    <div class="max-w-full mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h2 class="text-2xl font-semibold mb-4">Create Mosque</h2>

        <form wire:submit.prevent="store">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input type="text" wire:model="name" placeholder="Enter mosque name"
                    class="input w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">Address</label>
                <input type="text" wire:model="address" placeholder="Enter address"
                    class="input w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="contact_number">Contact Number</label>
                <input type="text" wire:model="contact_number" placeholder="Enter contact number"
                    class="input w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="capacity">Capacity</label>
                <input type="number" wire:model="capacity" placeholder="Enter capacity"
                    class="input w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea wire:model="description" placeholder="Enter description"
                    class="input w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Image</label>
                <input type="file" wire:model="image"
                    class="input w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="btn btn-primary w-full py-2 px-4 bg-blue-600 text-white font-bold rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Create
                Mosque</button>
        </form>
    </div>

