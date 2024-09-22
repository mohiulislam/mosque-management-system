<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuranClassResource\Pages;
use App\Filament\Resources\QuranClassResource\RelationManagers;
use App\Models\Tenant\QuranClass;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuranClassResource extends Resource
{
    protected static ?string $model = QuranClass::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuranClasses::route('/'),
            'create' => Pages\CreateQuranClass::route('/create'),
            'edit' => Pages\EditQuranClass::route('/{record}/edit'),
        ];
    }
}
