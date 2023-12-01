<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
class Cartdetail extends Component
{
    public $cart;
    protected $listeners = ['updateCart'];

    // Cập nhật cart
    public function updateCart(){
        $this->cart = session()->get('cart', []);
    }

    // Xóa sản phẩm trong giỏ hàng
    public function delete($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    }

    // Giảm số lượng sản phẩm trong giỏ hàng
    public function reduce($id)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
                session()->put('cart', $cart);
            } else {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        // emit event to update cart
        $this->emit('updateCart');
        $this->emit('minicart');
    }

    // Tăng số lượng trong giỏ hàng
    public function increase($id)
    {

        $product = Product::find($id);
        $quantity_Product = $product->quantity;
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] < $quantity_Product) {
                $cart[$id]['quantity']++;
                session()->put('cart', $cart);
            }
        }

        // Cập nhật cart
        $this->emit('updateCart');
    }

    // Loại bỏ
    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        // Cập nhật cart và minicart
        $this->emit('updateCart');
        $this->emit('minicart');
    }

    // Xóa tất cả cart
    public function deleteAll()
    {
        session()->forget('cart');
        $this->emit('showCart',[]);
    }

    public function render()
    {
        // Lấy cart từ session
        $this->cart = session()->get('cart', []);

        // Lấy tổng giá
        $total = 0;
        foreach ($this->cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('livewire.cartdetail', ['cart' => $this->cart], ['total' => $total]);
    }
}
