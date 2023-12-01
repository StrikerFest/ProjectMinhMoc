<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_catergory;
use App\Models\product;
use Illuminate\View\View;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Index - Danh sách sản phẩm
    public function index()
    {
        $product = product::paginate(8);
        $productCategory = product_catergory::all();
        return view('admin.product', compact('product', 'productCategory'));
    }

    // Thêm sản phẩm
    public function addProduct()
    {
        $productCategory = product_catergory::all();
        $product = [];
        if ($productCategory->count() == 0) {
            return redirect('/admin/category')->with('error','Thêm thể loại sản phẩm đầu tiên đã');
        }
        return view('admin.addNewProduct', ['productCategory' => $productCategory, 'product' => $product]);
    }

    // Xử lý thêm sản phẩm
    public function addNewProduct(Request $request)
    {

        $request->validate([
            'id_category' => 'integer',
            'name' => 'required|string',
            'quantity' => 'required|int',
            'description' => 'required|string',
            'export_price' => 'required|string',
            'import_price' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Lấy file được upload
        $image = $request->file('image');

        // Tạo tên cho file theo thời gian
         $imageName = time().'.'.$image->extension();

        // Lưu vào public/images (trong storage)
         Storage::putFileAs('public/images', $image, $imageName);

        // Tạo sản phẩm
        $data = Product::create([
            'id_category' => $request->id_category,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'export_price' => $request->export_price,
            'import_price' => $request->import_price,
            'Is_Active' => 0,
            'image' => $imageName,
        ]);
        return redirect('/admin/product')->with('success', 'Sản phẩm được thêm thành công');
    }

    // Xóa sản phẩm - Chuyển trạng thái sản phẩm
    public function deleteProduct($id)
    {
        $product = product::find($id);

        $status = $product->Is_Active;

        if ($status == 0) {
            $product->Is_Active = 1;
        } else {
            $product->Is_Active = 0;
        }
        $product->save();

        return redirect()->back()->with('success', 'Sản phẩm thay đổi trạng thái bán thành công');
    }
    // Cập nhật sản phẩm
    public function editProduct(Request $request, $id)
    {
        $found = Product::find($id);
        if (!$found) {
            return response()->json(['message' => 'Không tìm thấy sản phẩm'], 404);
        }

        //  $input = $request->all();
        //  dd($input['name']);

        //    $validator = Validator::make($request->all(), [
        //     'id_category' => 'integer',
        //       'name' => 'required|string',
        //       'import_price'=>'required|string',
        //       'export_price'=>'required|string',
        //       'quantity'=>'required|string',
        //       'description'=>'required|string',
        //       'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //    ]);
        //    if($validator ->fails()){
        //     return response()->json(['success' => false, 'message' => $validator->errors()], 400);
        //    }

        // Kiểm tra file ảnh có thay đổi không
        if ($request->hasFile('image')) {
            $completeFilename = $request->file('image')->getClientOriginalName();
            $filenameonly = pathinfo($completeFilename, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $comPic = str_replace(' ', '_', $filenameonly) . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/images', $comPic);
        } else {
            $comPic = $found->image;
        }

        // Cập nhật hoặc tạo mới
        $found = Product::updateOrCreate(
            ['id' => $id],
            [
                'id_category' => $request->id_category,
                'name' => $request->name,
                'export_price' => $request->export_price,
                'quantity' => $request->quantity,
                'description' => $request->description,
                'Is_Active' => 0,
                'image' => $comPic,
            ]
        );
        return redirect('/admin/product')->with('success', 'Sản phẩm cập nhật thành công');
    }


    // View cập nhật sản phẩm
    public function editProductview($id)
    {
        // join product and product_category
        // find product by id
        $product = product::find($id);
        $product = product::join('product_category', 'product.id_category', '=', 'product_category.id')->select('product.*', 'id_category')->where('product.id', $id)->first();
        $productCategory = product_catergory::all();
        return view('admin.addNewProduct', ['productCategory' => $productCategory, 'product' => $product]);
    }

    // Lấy sản phẩm theo id
    public function getProductById($id)
    {
        $product = product::find($id);
        return view('admin.editProduct', compact('product'));
    }
}
