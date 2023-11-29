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
        $productCategory = product_catergory::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('success', 'Category Added Successfully');
    }
    // update category
    public function editCategory(Request $request, $id)
    {
        
        $productCategory = product_catergory::find($id);
        $productCategory->name = $request->name;
        $productCategory->save();
        return redirect()->back()->with('success', 'Category Updated Successfully');
    }
}
