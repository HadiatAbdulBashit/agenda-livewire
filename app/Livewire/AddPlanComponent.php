<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class AddPlanComponent extends Component
{

    #[Rule('required|min:3')]
    public $task;
    #[Rule('required')]
    public $tag_id;
    #[Rule('required')]
    public $priority;
    public $tags;

    public function mount()
    {
        $this->tags = Tag::all();
    }

    public function save()
    {
        dd($this->tag_id[0]);
        $this->validate([
            'task' => 'required|min:3',
            'tag_id' => 'required',
            'priority' => 'required',
        ]);

        Plan::create([
            'task' => $this->task,
            'priority' => $this->priority,
            'is_completed' => false,
            'tag_id' => $this->tag_id,
        ]);

        $this->reset();
    }

    #[On('loadTags')]
    public function reLoadTags()
    {
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('livewire.add-plan-component', [
            'tags' => Tag::all()
        ]);
    }
}
