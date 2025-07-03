<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ProductManager extends Component
{
    use WithFileUploads;

    public $products;
    public $productId;
    public $isEditing = false;
    public $showForm = false;
    public $image;

    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|min:10')]
    public $description = '';

    #[Validate('required|numeric|min:0.01')]
    public $price = '';

    protected $rules = [
        'name' => 'required|min:3',
        'description' => 'required|min:10',
        'price' => 'required|numeric|min:0.01',
        'image' => 'nullable|image|max:2048', // max 2MB
    ];

    public function mount()
    {
        $this->loadProducts();
    }

    public function loadProducts()
    {
        $this->products = Product::latest()->get();
    }

    public function showCreateForm()
    {
        $this->resetForm();
        $this->showForm = true;
        $this->isEditing = false;
    }

    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('products', 'public');
        }

        if ($this->isEditing) {
            $product = Product::findOrFail($this->productId);
            
            // Delete old image if new one is uploaded
            if ($this->image && $product->image) {
                \Storage::disk('public')->delete($product->image);
            }
            
            $product->update([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $imagePath ?: $product->image,
            ]);
            session()->flash('message', 'Product updated successfully!');
        } else {
            Product::create([
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
                'image' => $imagePath,
            ]);
            session()->flash('message', 'Product created successfully!');
        }

        $this->resetForm();
        $this->loadProducts();
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $this->productId = $id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->isEditing = true;
        $this->showForm = true;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        
        // Delete image file if exists
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }
        
        $product->delete();
        session()->flash('message', 'Product deleted successfully!');
        $this->loadProducts();
    }

    public function cancel()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['name', 'description', 'price', 'productId', 'isEditing', 'showForm', 'image']);
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.product-manager');
    }
}
