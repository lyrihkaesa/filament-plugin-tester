<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\Attributes\Computed;

class Show extends Component
{
    public $slug;

    public function mount($slug): void
    {
        $this->slug = $slug;
    }

    #[Computed()]
    public function post()
    {
        return  \App\Models\Post::query()
            ->with(['author', 'editor'])
            ->where('slug', $this->slug)
            ->isPublished()
            ->first();
    }

    public function render()
    {
        if (!$this->post) {
            abort(404);
        }

        return view('livewire.post.show')->title($this->post->title);
    }
}
