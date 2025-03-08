<?php

namespace App\Mason;

use Awcodes\Mason\Brick;
use Awcodes\Mason\EditorCommand;
use Awcodes\Mason\Mason;

class Carausel
{
    public static function make(): Brick
    {
        return Brick::make('carausel')
            ->label('Carausel')
            ->modalHeading('Carausel Settings')
            ->icon('heroicon-o-cube-transparent')
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
                                'identifier' => 'carausel',
                                'values' => $data,
                                'path' => 'mason.carausel',
                                'view' => view('mason.carausel', $data)->toHtml(),
                            ]],
                        ),
                    ],
                    editorSelection: $arguments['editorSelection'],
                );
            });
    }
}
