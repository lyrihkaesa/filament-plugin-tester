<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\Attributes\Computed;

class Random extends Component
{
    public $take;
    public $title;
    public $description;
    public $class;

    public function mount($take = 3, $title = null, $description = null, $class = '')
    {
        $this->take = $take;
        $this->title = $title ?? 'Random posts';
        $this->description = $description;
        $this->class = $class;
    }

    #[Computed()]
    public function posts()
    {
        return \App\Models\Post::isPublished()->inRandomOrder()
            ->take($this->take)->get();
    }

    public function render()
    {
        return view('livewire.post.random');
    }
}
