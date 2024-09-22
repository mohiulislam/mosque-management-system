<?php

namespace App\Filament\Resources\QuranClassResource\Pages;

use App\Filament\Resources\QuranClassResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuranClass extends EditRecord
{
    protected static string $resource = QuranClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
