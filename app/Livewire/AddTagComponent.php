<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddTagComponent extends Component
{
    #[Rule('required|min:3')]
    public $nameTag = '';

    public function save()
    {
        $this->validate();
        Tag::create([
            'name' => $this->nameTag
        ]);

        $this->reset();
        $this->dispatch('loadTags');
        $this->dispatch('closeModal', 'addTag');
    }

    public function render()
    {
        return view('livewire.add-tag-component');
    }
}
