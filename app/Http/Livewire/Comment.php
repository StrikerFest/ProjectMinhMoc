<?php

namespace App\Http\Livewire;

use App\Models\product;
use Livewire\Component;
use App\Models\comments;


class Comment extends Component
{
    public $product_id;
    public $message;
    public function submitForm()
    {
       // Lấy thông tin từ form
        $this->validate([
            'message' => 'required',
        ]);

        // Kiểm tra nếu khách đã đăng nhập ( Comment yêu cầu khách đăng nhập )
        if (!session()->has('customer')) {
            session()->flash('message', 'Please login to comment.');
            return redirect()->to('/login');
        } else{
            $data = [
                'id_product' => $this->product_id,
                'id_user' => session()->get('customer')->id,
                'content' => $this->message,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ];
            comments::create($data);
            $this->message = '';
            session()->flash('message', 'Comment successfully.');
        }
        return redirect()->back();

    }
    public function render()
    {
        // Kiểm tra khách đã đăng nhập chưa
        if (session()->has('customer')) {
            $customer = session()->get('customer');
            $customer_id = $customer->id;
            $customer_name = $customer->name;
        } else {
            $customer_id = null;
            $customer_name = null;
        }

        // Lấy comment theo mã sản phẩm join với bảng comment và customer
        $comments = comments::leftJoin('customers', 'comments.id_user', '=', 'customers.id')
            ->select('comments.*', 'customers.name as customer_name')
            ->where('comments.id_product', $this->product_id)
            ->orderBy('comments.id', 'desc')
            ->get();

        // Đếm comment
        $count = comments::where('id_product', $this->product_id)->count();

        return view('livewire.comment',['customer_id'=>$customer_id,'customer_name'=>$customer_name,'comments'=>$comments,'count'=>$count]);
    }
}
