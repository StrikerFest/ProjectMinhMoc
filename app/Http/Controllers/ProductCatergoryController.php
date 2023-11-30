<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_catergory;
class ProductCatergoryController extends Controller
{
    // view
    public function index()
    {
        $productCategory = product_catergory::all();
        return view('admin.product_category', compact('productCategory'));
    }
    // view all category
    public function viewAllCategory()
    {

    }
    public function addCategory(Request $request)
    {
        // Validate if empty
        if (empty($request->name)) {
            return redirect()->back()->with('error', 'Vui lòng nhập tên loại sản phẩm');
        }

        $productCategory = product_catergory::create([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Thể loại thêm thành công');
    }
    // update category
    public function editCategory(Request $request, $id)
    {

        $productCategory = product_catergory::find($id);
        $productCategory->name = $request->name;
        $productCategory->save();
        return redirect()->back()->with('success', 'Thể loại cập nhật thành công');
    }
}
