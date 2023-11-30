<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
class Quickview extends Component
{
    //
    protected $listeners = ['showquickView'];
    public $p;

    public function showquickView($product)
    {
        $this->p=null;
        $this->p = $product;
    }

    // Hiện xem nhanh
    public function render()
    {
        return view('livewire.quickview')->with('p',$this->p);
    }

}
