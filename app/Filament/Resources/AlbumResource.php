<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AlbumResource\Pages;
use App\Filament\Resources\AlbumResource\RelationManagers;
use App\Models\Album;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;

class AlbumResource extends Resource
{
    protected static ?string $model = Album::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Album';
    protected static ?string $modelLabel = 'Album';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('artist_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('release_date')
                    ->required(),
                Forms\Components\TextInput::make('cover_art')
                    ->maxLength(255)
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
    return $table
        ->columns([
                Tables\Columns\TextColumn::make('artist.artist_name')
                    ->label('Artist')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->toggleable(), // Make this column toggleable
                Tables\Columns\TextColumn::make('tracks_count')
                    ->label('Number of Tracks')
                    ->counts('tracks')
                    ->sortable()
                    ->toggleable(), // Make this column toggleable
                Tables\Columns\TextColumn::make('release_date')
                    ->date()
                    ->sortable()
                    ->toggleable(), // Make this column toggleable
                Tables\Columns\TextColumn::make('cover_art')
                    ->searchable()
                    ->toggleable(), // Make this column toggleable
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Make this column toggleable, hidden by default
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Make this column toggleable, hidden by default
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

    
    public static function Infolist(Infolist $infolist): Infolist
    {
        return $infolist
        ->schema([
        Section::make('Album Details')
            ->schema([
            TextEntry::make('title')
            ->label('Title'),
            TextEntry::make('artist.artist_name')
            ->label('Artist'),
            TextEntry::make('release_date')
            ->label('Release Date')
            ->date(),
            TextEntry::make('tracks_count')
            ->label('Number of Tracks'),
            ])
        ->columns(2),
    
        Section::make('Cover & Metadata')
            ->schema([
            TextEntry::make('cover_art')
            ->label('Cover Art URL'),
            TextEntry::make('created_at')
            ->label('Created At')
            ->dateTime(),
            TextEntry::make('updated_at')
            ->label('Last Updated')
            ->dateTime(),
            ])
        ->columns(2),
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
            'index' => Pages\ListAlbums::route('/'),
            'create' => Pages\CreateAlbum::route('/create'),
            //'view' => Pages\ViewAlbum::route('/{record}'),
            'edit' => Pages\EditAlbum::route('/{record}/edit'),
        ];
    }
}
