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
        $idCustomeraddress = [];
        // count total price
        $total = 0;
        if (empty($customer)) {
            $address = [];
        } else {
            $address = address::where('id_customer', $customer['id'])->where('status', 1)->get(); 
            $idCustomeraddress = address::where('id_customer', $customer['id'])->where('status', 1)->first();  
        }
        // get customers address and status = 1
        

        foreach ($address as $key => $value) {
            $province = Province::find($value->province);
            $district = District::find($value->district);
            $ward = Ward::find($value->ward);
            $value->province = $province->name;
            $value->district = $district->name;
            $value->ward = $ward->name;
            array_push($customeraddress, $value);
        }
       
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
            'address' => $customeraddress,
            'idCustomeraddress' => $idCustomeraddress
        ]);
    }
    public function updated($propertyName)
    {
        $district_id = District::where('province_id', $this->province_id)->get();
        $ward_id = Ward::where('district_id', $this->district_id)->get();
        $this->districts = $district_id;
        $this->wards = $ward_id;
    }
}
