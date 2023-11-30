<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Minicart extends Component
{
    protected $listeners = ['minicart'];

    // Hiển thị minicart ?
    public function minicart(){

    }

    // Hiển thị minicart
    public function render()
    {
        // Đếm số sản phẩm trong cart
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
