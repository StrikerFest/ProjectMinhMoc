<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\customer;
use App\Models\order;
use App\Models\orders_details;
use \Kjmtrue\VietnamZone\Models\Province;
use \Kjmtrue\VietnamZone\Models\District;
use \Kjmtrue\VietnamZone\Models\Ward;
use App\Models\address;


class Customervieworder extends Component
{

    public function quickView($id)
    {
        $order_details_id = $id;
 
        // emit to show modal
        $this->emit('showModal', $order_details_id);
    }
    public function cancelOrder($id){
        $order_id = $id;
        // emit to show modal
        $this->emit('cancelorder', $order_id);
    }
    public function render()
    {
        // get id customer from session
        $customer = session()->get('customer');
        $customer_id = $customer->id;
        //get info customer
        $customer = customer::find($customer_id);
        // get address by customer id
        $addressCustomer = [];
        $address = address::where('id_customer', $customer_id)->get();
        foreach ($address as $key => $value) {
            $province = Province::find($value->province);
            $district = District::find($value->district);
            $ward = Ward::find($value->ward);
            $value->province = $province->name;
            $value->district = $district->name;
            $value->ward = $ward->name;
            array_push($addressCustomer, $value);
        }
        $order = order::where('customer_id', $customer_id)->orderBy('id', 'desc')->paginate(10);
        // join table order ,province,district,ward
        $order = order::leftJoin('provinces', 'orders.province', '=', 'provinces.id')
            ->leftJoin('districts', 'orders.district', '=', 'districts.id')
            ->leftJoin('wards', 'orders.ward', '=', 'wards.id')
            ->select('orders.*', 'provinces.name as province_name', 'districts.name as district_name', 'wards.name as ward_name')
            ->where('orders.customer_id', $customer_id)
            ->orderBy('orders.id', 'desc')
            ->paginate(10);
        return view('livewire.customervieworder', [
            'customer' => $customer,
            'addressCustomer' => $addressCustomer,
            'order' => $order
        ]);
    }
}
