<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\orders_details;
use App\Models\order;
class Customerorder extends Component
{
    // listen event from livewire
    protected $listeners = ['showModal'];
    public $order_detail;

    public function showModal($order_details_id){
       $this -> order_detail = null;
       $this -> order_detail = $order_details_id;
    }

    public function render()
    {
        // join table order_details and product
        // Lấy chi tiết đơn hàng
        $order_details = orders_details::leftJoin('product', 'orders_details.product_id', '=', 'product.id')
            ->select('orders_details.*', 'product.name as product_name')
            ->where('orders_details.order_id', $this->order_detail)
            ->get();

        return view('livewire.customerorder',['order_details'=> $order_details]);
    }
}
