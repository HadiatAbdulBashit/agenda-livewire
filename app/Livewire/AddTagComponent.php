<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddTagComponent extends Component
{
    #[Rule('required')]
    public $name = '';

    public function save()
    {
        $this->validate();

        Tag::create([
            'name' => $this->name
        ]);

        $this->reset();
        $this->dispatch('loadTags');
    }

    public function render()
    {
        return view('livewire.add-tag-component');
    }
}
