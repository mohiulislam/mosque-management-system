<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Add Mosque') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                    @if (session()->has('message'))
                        <div class="mb-4 text-green-600">{{ session('message') }}</div>
                    @endif

                    <form wire:submit.prevent="submit">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 dark:text-gray-300">Mosque Name</label>
                            <input type="text" wire:model="name" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300" />
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 dark:text-gray-300">Address</label>
                            <textarea wire:model="address" id="address" rows="3"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="contact_number" class="block text-gray-700 dark:text-gray-300">Contact
                                Number</label>
                            <input type="text" wire:model="contact_number"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300" />
                        </div>

                        <div class="mb-4">
                            <label for="capacity" class="block text-gray-700 dark:text-gray-300">Capacity</label>
                            <input type="number" wire:model="capacity"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300" />
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 dark:text-gray-300">Description</label>
                            <textarea wire:model="description" id="description" rows="3"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 dark:text-gray-300">Image</label>
                            <input type="file" wire:model="image"
                                class="mt-1 block w-full text-gray-700 dark:text-gray-300" />
                            @error('image')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="admin_id" class="block text-gray-700 dark:text-gray-300">Admin</label>
                            <select wire:model="admin_id" id="admin_id"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300">
                                <option value="">Select Admin</option>
                                @foreach ($admins as $admin)
                                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                                Add Mosque
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>
