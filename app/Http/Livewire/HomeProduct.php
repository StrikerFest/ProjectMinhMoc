<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\product;
use Illuminate\Support\Facades\DB;

class HomeProduct extends Component
{
    // Xem nhanh
    public function quickView($id)
    {
        $product = Product::find($id);
        $this->emit('showquickView', $product);
    }

    // Thêm vào giỏ hàng
    public function addToCart($id)
    {

        $product = Product::find($id);
        $quantity_Product = $product->quantity;
        $cart = session()->get('cart', []);
        if (!isset($cart[$id])) {

            $cart[$id] = [
                // check quantity of product
                "id" => $product->id,
                "name" => $product->name,
                "quantity" => 1,
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
        $this->emit('addCartPopUp');
    }

    // Hiển thị trang sản phẩm
    public function render()
    {
        // Lấy 8 sản phẩm mới nhất (Đang giao bán) (Số lượng > 0)
        $productLastest = product::where('Is_Active', 0)->where('quantity', '>', 0)->orderBy('id', 'desc')->take(8)->get();

        // lấy 8 sản phẩm bán chạy nhất có Is_Active = 0 và quantity > 0
        $productBestSeller = DB::table('orders_details')
            ->select('product.id', 'product.name', 'product.image', 'product.export_price', DB::raw('SUM(orders_details.quantity) as total'))
            ->join('product', 'orders_details.product_id', '=', 'product.id')
            ->groupBy('product.id', 'product.name', 'product.image', 'product.export_price')
            ->orderBy('total', 'desc')
            ->where('product.Is_Active', 0)
            ->where('product.quantity', '>', 0)
            ->take(8)
            ->get();
        return view('livewire.home-product', ['productLastest' => $productLastest, 'productBestSeller' => $productBestSeller]);
    }
}
