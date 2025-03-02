<?php

namespace App\Livewire;

use App\Models\Product as ModelsProduct;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Product extends Component
{

    // add the properties for input fields
    #[Rule('required|min:5')]
    public $name = '';
    #[Rule('required|min:5')]
    public $description = '';

    public function render()
    {
        return view('livewire.product', ['products' => ModelsProduct::all()]);
    }

    public function saveProduct()
    {

        $validatedData = $this->validate();

        // dd($validatedData);
        ModelsProduct::create($validatedData);
        $this->resetFields();

        $this->dispatch('closeModal', 'addProduct');

        //toast
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => "Product Added Successfully!!",
        ]);
    }

    public function resetFields()
    {
        $this->resetValidation();
        $this->name = '';
        $this->description = '';
    }

    #[On('product-deleted')]
    public function deleteProduct($id)
    {
        ModelsProduct::find($id)->delete();

        //toast
        $this->dispatch('alert', [
            'type' => 'success',
            'message' => "Product deleted Successfully!!",
        ]);
    }
}
