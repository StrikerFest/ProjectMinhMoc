<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product_catergory;
class Menucustomer extends Component
{
    public function render()
    {
        $productCategory = product_catergory::all();
        return view('livewire.menucustomer',['productCategory'=>$productCategory]);
    }
}
