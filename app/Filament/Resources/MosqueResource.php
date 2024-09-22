<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MosqueResource\Pages;
use App\Filament\Resources\MosqueResource\RelationManagers;
use App\Models\Tenant\Mosque;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class MosqueResource extends Resource
{
    protected static ?string $model = Mosque::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('address')
                    ->maxLength(65535)
                    ->nullable(),
                TextInput::make('contact_number')
                    ->tel()
                    ->maxLength(20)
                    ->nullable(),
                TextInput::make('imam_id')
                    ->numeric()
                    ->nullable(),
                TextInput::make('capacity')
                    ->numeric()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('address')
                    ->sortable(),
                TextColumn::make('contact_number')
                    ->sortable(),
                TextColumn::make('imam_id')
                    ->sortable(),
                TextColumn::make('capacity')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime(),
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', Auth::id());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMosques::route('/'),
            'create' => Pages\CreateMosque::route('/create'),
            'edit' => Pages\EditMosque::route('/{record}/edit'),
        ];
    }
}
