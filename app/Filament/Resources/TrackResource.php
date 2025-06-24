<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrackResource\Pages;
use App\Filament\Resources\TrackResource\RelationManagers;
use App\Models\Track;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrackResource extends Resource
{
    protected static ?string $model = Track::class;

    protected static ?string $navigationIcon = 'heroicon-o-musical-note';
    protected static ?string $navigationLabel = 'Track';
    protected static ?string $modelLabel = 'Track';
    protected static ?string $navigationGroup = 'Content Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('youtube_id')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('album_id')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('file_path')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('track_number')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('genre')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('release_date'),
                Forms\Components\Textarea::make('lyrics')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('plays')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('youtube_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('album_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
               Tables\Columns\TextColumn::make('duration')
                    ->label('Duration')
                    ->sortable()
                    ->formatStateUsing(function ($state) {
                    if ($state === null) return '-';
                    
                    $minutes = floor($state / 60);
                    $seconds = $state % 60;
                    
                    if ($minutes > 0 && $seconds > 0) {
                    return "{$minutes} min {$seconds} sec";
                    } elseif ($minutes > 0) {
                    return "{$minutes} min";
                    } else {
                    return "{$seconds} sec";
                    }
                    }),
                Tables\Columns\TextColumn::make('file_path')
                    ->searchable(),
                Tables\Columns\TextColumn::make('track_number')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('genre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('release_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('plays')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTracks::route('/'),
            'create' => Pages\CreateTrack::route('/create'),
            'view' => Pages\ViewTrack::route('/{record}'),
            'edit' => Pages\EditTrack::route('/{record}/edit'),
        ];
    }
}
