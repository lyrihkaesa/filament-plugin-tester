<?php

namespace App\Policies;

use Awcodes\Curator\Models\Media;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MediaPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Media $media): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Media $media): bool
    {
        return false;
    }

    public function delete(User $user, Media $media): bool
    {
        return false;
    }

    public function restore(User $user, Media $media): bool
    {
        return false;
    }

    public function forceDelete(User $user, Media $media): bool
    {
        return false;
    }
}
