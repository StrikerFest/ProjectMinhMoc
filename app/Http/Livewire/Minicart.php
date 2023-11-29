<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Minicart extends Component
{
    protected $listeners = ['minicart'];
    public function minicart(){

    }
    public function render()
    {
        // count item in cart not quantity
        $cart = session()->get('cart');
        $total = 0;
        if ($cart != null) {
            foreach ($cart as $item) {
                $total += $item['quantity'];
            }
        }
        return view('livewire.minicart', ['total' => $total]);
    }
}
