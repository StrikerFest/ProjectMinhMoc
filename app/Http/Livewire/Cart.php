<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    protected $listeners = ['showCart'];
    public $cart;
    public function showCart($product)
    {
        
    }
    // delete item from cart
    public function delete($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }
    // delete all item from cart
    public function deleteAll()
    {
        session()->forget('cart');
    }
    public function render()
    {
        // get cart from session
        $this->cart = session()->get('cart', []);
        // count total price
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return view('livewire.cart', ['cart' => $this->cart, 'total' => $total]);
    }
}
