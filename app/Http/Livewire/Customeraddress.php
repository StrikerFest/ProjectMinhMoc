<?php

namespace App\Http\Livewire;

use Livewire\Component;
use \Kjmtrue\VietnamZone\Models\Province;
use \Kjmtrue\VietnamZone\Models\District;
use \Kjmtrue\VietnamZone\Models\Ward;

class Customeraddress extends Component
{
    public $cart;
    public $province_id;
    public $districts;
    public $district_id;
    public $ward_id;
    public $wards;

    public function render()
    {
        // Lấy thông tin cart
        $this->cart = session()->get('cart', []);
        $provinces = Province::all();
        $districts = [];
        $wards = [];

        // Đếm tổng giá cart
        $total = 0;
        foreach ($this->cart as $details) {
            $total += $details['price'] * $details['quantity'];
        }

        return view('livewire.Customeraddress', [
            'total' => $total,
            'cart' => $this->cart,
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards,
        ]);
    }

    // Cập nhật >?
    public function updated($propertyName)
    {
        $district_id = District::where('province_id', $this->province_id)->get();
        $ward_id = Ward::where('district_id', $this->district_id)->get();
        $this->districts = $district_id;
        $this->wards = $ward_id;
    }
}
