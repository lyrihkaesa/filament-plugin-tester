<?php

namespace App\Mason;

use Awcodes\Mason\Brick;
use Awcodes\Mason\EditorCommand;
use Awcodes\Mason\Mason;

class RandomPost
{
    public static function make(): Brick
    {
        return Brick::make('randomPost')
            ->label('Random post')
            ->modalHeading('Random post Settings')
            ->icon('heroicon-o-cube-transparent')
            ->slideOver()
            ->fillForm(fn (array $arguments): array => [
                //
            ])
            ->form([
                //
            ])
            ->action(function (array $arguments, array $data, Mason $component) {
                $component->runCommands(
                    [
                        new EditorCommand(
                            name: 'setBrick',
                            arguments: [[
                                'identifier' => 'randomPost',
                                'values' => $data,
                                'path' => 'mason.random-post',
                                'view' => view('mason.random-post', $data)->toHtml(),
                            ]],
                        ),
                    ],
                    editorSelection: $arguments['editorSelection'],
                );
            });
    }
}
