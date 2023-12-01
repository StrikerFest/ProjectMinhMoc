<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\orders_details;
use App\Models\order;

class Cancelorder extends Component
{
    public $listeners = ['cancelorder'];
    public $order_id;
    public function cancelorder($order_id)
    {
        $this->order_id = null;
        $this->order_id = $order_id;
    }
    public function cancel()
    {
        $order = order::where('id', $this->order_id)->first();
        if ($order->Status == 0) {
            $order->Status = 3;
            $order->save();
        }
        $this->emit('cancelOrderSuccess');
        return redirect('myAccount')->with('success','Đã hủy thành công');
    }
    public function render()
    {
        return view('livewire.cancelorder');
    }
}
