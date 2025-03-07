<?php

namespace App\Livewire;

use App\Models\Plan;
use Livewire\Component;

class AddPlanComponent extends Component
{
    public $task;
    public $tag_id;
    public $priority;
    public $canSubmit = false;

    public function updating($property, $value)
    {
        if ($property === 'task' && $value !== '') {
            $this->canSubmit = true;
        }
    }

    public function save()
    {
        $this->validate([
            'task' => 'required|min:3',
            'tag_id' => 'required',
            'priority' => 'required',
        ]);

        Plan::create([
            'task' => $this->task,
            'priority' => $this->priority,
            'is_completed' => false,
            'tag_id' => 1,
        ]);

        $this->canSubmit = false;
    }

    public function render()
    {
        return view('livewire.add-plan-component');
    }
}
