<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->collapsed()
                    ->collapsible()
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label(__('Title'))
                            ->required()
                            ->live(onBlur: true)
                            ->minLength(1)
                            ->maxLength(255)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                if ($operation === 'edit') {
                                    return;
                                }

                                $set('slug', str()->slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->label(__('Slug'))
                            ->minLength(1)
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->required(),
                        Forms\Components\Select::make('author_id')
                            ->label('Author')
                            ->relationship('author', 'name')
                            ->required()
                            ->default(auth('')->user()->id),
                        Forms\Components\Select::make('editor_id')
                            ->label('Editor')
                            ->relationship('editor', 'name')
                            ->required()
                            ->default(auth('')->user()->id),
                        Forms\Components\DateTimePicker::make('published_at'),
                        Forms\Components\FileUpload::make('thumbnail'),
                    ]),
                \Awcodes\Mason\Mason::make('content')
                    ->bricks(\App\Mason\BrickCollection::make())
                    ->extraAttributes([
                        'x-load-js' => "['" . \Filament\Support\Facades\FilamentAsset::getScriptSrc('preline-script') . "']",
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('author_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('editor_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('visibility')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('thumbnail')
                    ->searchable(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
