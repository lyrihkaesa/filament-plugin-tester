<?php

namespace App\Mason;

use Awcodes\Mason\Brick;
use Awcodes\Mason\EditorCommand;
use Awcodes\Mason\Mason;

class Section
{
    public static function make(): Brick
    {
        return Brick::make('section')
            ->label('Section')
            ->modalHeading('Section Settings')
            ->icon('heroicon-o-cube')
            ->slideOver()
            ->fillForm(fn(array $arguments): array => [
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
                                'identifier' => 'section',
                                'values' => $data,
                                'path' => 'mason.section',
                                'view' => view('mason.section', $data)->toHtml(),
                            ]],
                        ),
                    ],
                    editorSelection: $arguments['editorSelection'],
                );
            });
    }
}
