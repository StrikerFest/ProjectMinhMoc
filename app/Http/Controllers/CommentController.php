<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Product;
use App\Models\customer;

class CommentController extends Controller
{
    // Lấy tất cả comment
    public function index()
    {
        // Lấy comment join với product join với customer
        $comment = Comments::join('product', 'comments.id_product', '=', 'product.id')
            ->join('customers', 'comments.id_user', '=', 'customers.id')
            ->select('comments.*', 'product.name as name_product','product.image as image_product', 'customers.name as name_customer')
            ->get();

        return view('admin.comment', ['comment' => $comment]);
    }

    // Xóa comment
    public function deleteComment($id)
    {
        $comment = Comments::find($id);
        $comment->delete();
        return redirect('/admin/comment');
    }
}
