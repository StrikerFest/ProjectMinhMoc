<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Home extends Component
{
    public $productLastest2;

    // Xem nhanh
    public function quickView($id)
    {
        $product = Product::find($id);
        $this->emit('showquickView', $product);
    }

    // Thêm vào cart
    public function addToCart($id)
    {
        $product = Product::find($id);
        $quantity_Product = $product->quantity;
        $cart = session()->get('cart', []);
        $i = 1;
        if (!isset($cart[$id])) {
            $cart[$id] = [
                // check quantity of product
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => $i,
                "price" => $product->export_price,
                "image" => $product->image
            ];
        } else {
            $cart[$id]['quantity'] += 1;
            if ($cart[$id]['quantity'] > $quantity_Product) {
                $cart[$id]['quantity'] = $quantity_Product;
            }
        }
        session()->put('cart', $cart);
        $this->emit('showCart', $cart);
        $this->emit('minicart');
    }

    // Hiển thị trang home
    public function render()
    {
        // get product lastest
        $this->productLastest2 =product::where('Is_Active', 0)->where('quantity', '>', 0)->orderBy('id', 'desc')->take(8)->get();
        return view('livewire.home');
    }
}
