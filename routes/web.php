<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/blog', \App\Livewire\Post\Index::class)->name('posts.index');
Route::get('/blog', function () {
    return 'ini index post';
})->name('posts.index');
Route::get('/blog/{slug}', \App\Livewire\Post\Show::class)->name('posts.show');

Route::get('/medias/factory', function () {
    $media2 = \Awcodes\Curator\Models\Media::factory()->create()->fresh();

    $media = \Awcodes\Curator\Models\Media::factory()->create([
        'name' => 'testfile',
    ])->fresh();

    return response()->json([
        'media' => [
            'name' => $media->name,
            'fullPath' => $media->fullPath,
            'path' => $media->path,
            'basename' => basename($media->fullPath),
            'check' => basename($media->fullPath) === $media->path
        ],
        'media2' => [
            'name' => $media2->name,
            'fullPath' => $media2->fullPath,
            'path' => $media2->path,
            'basename' => basename($media2->fullPath),
            'check' => basename($media2->fullPath) === $media2->path
        ],
    ]);
});

Route::get('/medias/{media}', function (App\Models\Media $media) {
    return response()->json([
        'media.name' => $media->name,
        'media.fullPath' => $media->fullPath,
        'media.path' => $media->path,
        'media.basename' => basename($media->fullPath),
        'media.check' => basename($media->fullPath) === $media->path,
    ]);
})->name('media.show');
