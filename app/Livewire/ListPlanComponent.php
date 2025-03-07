<?php

namespace App\Livewire;

use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;

class ListPlanComponent extends Component
{
    public $plans;
    public $editMode = false;
    public $selectedPlanId;

    public function deletePlan($id)
    {
        // dd($this->selectedPlanId);
        $plan = Plan::find($id);
        $plan->delete();
    }

    #[On('loadPlans')]
    public function render()
    {
        $this->plans = Plan::all()->sortBy('priority');
        return view('livewire.list-plan-component');
    }
}
