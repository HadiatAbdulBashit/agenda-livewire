<?php

namespace App\Livewire;

use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;

class ListPlanComponent extends Component
{
    public $plans;
    public $selectedPlanId = '';
    public $updatedTask = '';

    public function updatePlan()
    {
        // dd($this->selectedPlanId);
        $plan = Plan::find($this->selectedPlanId);
        $plan->task = $this->updatedTask;
        $plan->save();
        $this->selectedPlanId = '';
        $this->updatedTask = '';
    }

    public function completePlan($id)
    {
        // dd($id);
        $plan = Plan::find($id);
        $plan->is_completed = !$plan->is_completed;
        $plan->save();
        $this->dispatch('loadPlans');
    }

    public function editMode($id)
    {
        // dd($id);
        $this->selectedPlanId = $id;
        $this->updatedTask = Plan::find($id)->task;
    }

    public function deletePlan($id)
    {
        // dd($this->selectedPlanId);
        $plan = Plan::find($id);
        $plan->delete();
    }

    #[On('loadPlans')]
    public function render()
    {
        $this->plans = Plan::all()->sortBy('priority')->where('is_completed', false);
        return view('livewire.list-plan-component');
    }
}
