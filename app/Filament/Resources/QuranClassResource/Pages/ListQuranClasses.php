<?php

namespace App\Filament\Resources\QuranClassResource\Pages;

use App\Filament\Resources\QuranClassResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListQuranClasses extends ListRecords
{
    protected static string $resource = QuranClassResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
