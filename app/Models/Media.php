<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Awcodes\Curator\Models\Media as MediaCurator;

class Media extends MediaCurator
{
    protected static function booted(): void
    {
        static::creating(function (Media $media) {
            $media->user_id = auth('')->user()->id;
        });
    }
}
