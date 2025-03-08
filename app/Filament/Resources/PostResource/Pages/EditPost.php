<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Models\Post;
use Filament\Actions;
use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('viewPublished')
                ->label('View Published')
                ->color('gray')
                ->icon('heroicon-s-eye')
                ->openUrlInNewTab()
                ->url(fn(Post $record): string => route('posts.show', $record->slug)),
            Actions\DeleteAction::make(),
        ];
    }
}
