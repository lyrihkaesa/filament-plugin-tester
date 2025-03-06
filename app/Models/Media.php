<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Awcodes\Curator\Models\Media as MediaCurator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Media extends MediaCurator
{
    /** @use HasFactory<\Database\Factories\MediaFacory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::creating(function (Media $media) {
            $media->user_id = auth('')->user()->id;
        });
    }
}
