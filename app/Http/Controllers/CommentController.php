<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\Product;
use App\Models\customer;

class CommentController extends Controller
{
    //getFullComment
    public function index()
    {
        // get comments join with product join with customer
        $comment = Comments::join('product', 'comments.id_product', '=', 'product.id')
            ->join('customers', 'comments.id_user', '=', 'customers.id')
            ->select('comments.*', 'product.name as name_product','product.image as image_product', 'customers.name as name_customer')
            ->get();
        // get created_at from comments and count time
       
        return view('admin.comment', ['comment' => $comment]);
    }
    // delete comment
    public function deleteComment($id)
    {
        $comment = Comments::find($id);
        $comment->delete();
        return redirect('/admin/comment');
    }
}
