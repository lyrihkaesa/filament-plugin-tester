<?php

namespace App\Mason;

class BrickCollection
{
    public static function make(): array
    {
        return [
            Section::make(),
            Carausel::make(),
        ];
    }
}
