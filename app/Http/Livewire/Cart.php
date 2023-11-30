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

    // Xóa sản phẩm trong cart
    public function delete($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }

    // Xóa tất cả sản phẩm trong cart
    public function deleteAll()
    {
        session()->forget('cart');
    }

    public function render()
    {
        // Lấy cart từ session
        $this->cart = session()->get('cart', []);

        // Đếm tổng giá
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return view('livewire.cart', ['cart' => $this->cart, 'total' => $total]);
    }
}
