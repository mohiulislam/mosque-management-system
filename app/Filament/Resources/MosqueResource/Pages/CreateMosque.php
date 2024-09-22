<?php

namespace App\Filament\Resources\MosqueResource\Pages;

use App\Filament\Resources\MosqueResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\User; // Import the User model
use Illuminate\Support\Facades\Auth;

class CreateMosque extends CreateRecord
{
    protected static string $resource = MosqueResource::class;

    protected function afterCreate(): void
    {
        $user = Auth::user();
        $mosque = $this->record;
        $userModel = User::find($user->id);
        $userModel->mosque_id = $mosque->id;
        $userModel->save();
    }
}
