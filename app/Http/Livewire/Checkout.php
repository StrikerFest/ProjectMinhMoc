<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\address;
use \Kjmtrue\VietnamZone\Models\Province;
use \Kjmtrue\VietnamZone\Models\District;
use \Kjmtrue\VietnamZone\Models\Ward;

class Checkout extends Component
{
    public $cart;
    public $province_id;
    public $districts;
    public $district_id;
    public $ward_id;
    public $wards;

    public function render()
    {
        $this->cart = session()->get('cart', []);
        $customer = session()->get('customer', []);
        $provinces = Province::all();
        $districts = [];
        $wards = [];
        $customeraddress = [];

        // Đếm tổng giá
        $total = 0;

        // Lấy sản phẩm trong cart
        foreach ($this->cart as $details) {
            $total += $details['price'] * $details['quantity'];
        }
        return view('livewire.checkout', [
            'total' => $total,
            'cart' => $this->cart,
            'provinces' => $provinces,
            'districts' => $districts,
            'wards' => $wards,
            'customer' => $customer,
            'address' => $customeraddress
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
