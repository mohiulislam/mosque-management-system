<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrayerTimeResource\Pages;
use App\Filament\Resources\PrayerTimeResource\RelationManagers;
use App\Models\Tenant\PrayerTime;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrayerTimeResource extends Resource
{
    protected static ?string $model = PrayerTime::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('prayer_name')
                    ->label('Prayer Name')
                    ->required()
                    ->options([
                        'Fajr',
                        'Dhuhr',
                        'Asr',
                        'Maghrib',
                        'Isha',
                        'Jumu`ah',
                    ]),
                Forms\Components\TimePicker::make('time')
                    ->label('Time')
                    ->required(),
                Forms\Components\DatePicker::make('date')
                    ->label('Date')
                    ->required(),
                Forms\Components\Select::make('mosque_id')
                    ->label('Mosque')
                    ->required()
                    ->options(\App\Models\Tenant\Mosque::all()->pluck('name', 'id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('prayer_name')
                    ->label('Prayer Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('time')
                    ->label('Prayer Time')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date')
                    ->label('Date')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mosque.name')
                    ->label('Mosque')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListPrayerTimes::route('/'),
            'create' => Pages\CreatePrayerTime::route('/create'),
            'edit' => Pages\EditPrayerTime::route('/{record}/edit'),
        ];
    }
}
