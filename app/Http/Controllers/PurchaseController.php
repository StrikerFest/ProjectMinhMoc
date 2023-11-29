<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\purchase;
use App\Models\purchase_detail as PurchaseDetail;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    //
    public function index()
    {
        $products = product::all();
        $purchases = purchase::all();
        return view('admin.purchase', compact('products', 'purchases'));
    }
    // get name Product By Id
    public function getProductById($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Tạo một mảng kết quả chỉ chứa mã sản phẩm và tên của sản phẩm
        $result = [
            'id' => $product->id,
            'name' => $product->name
        ];

        // Trả về response JSON với mảng kết quả
        return response()->json($result);
    }
    // add purchase
    public function addPurchase(Request $request)
    {
        // Lấy dữ liệu từ request
        $products = $request->input('products');
        $date = $request->input('date');

        // Tạo đối tượng Purchase và lưu thông tin
        $purchase = new Purchase();
        $purchase->date = $date;

        // Lưu purchase vào database
        $purchase->save();

        // Tính toán và lưu thông tin chi tiết mua hàng
        $total = 0;
        foreach ($products as $product) {
            $purchaseDetail = new PurchaseDetail();
            $purchaseDetail->id_purchase = $purchase->id;
            $purchaseDetail->id_product = $product['productId'];
            $purchaseDetail->quantity = $product['quantity'];
            $purchaseDetail->price = $product['price'];
            $purchaseDetail->save();

            // Cập nhật tổng số tiền
            $total += $product['quantity'] * $product['price'];
            // Cập nhật số lượng sản phẩm
            $product = Product::find($product['productId']);
            $product->quantity += $product['quantity'];
            $product->save();
        }

        // Cập nhật tổng số tiền trong purchase
        $purchase->Total = $total;
        $purchase->save();

        // Trả về phản hồi thành công (status code 200) hoặc bất kỳ thông tin nào bạn muốn trả về

        return response()->json(['message' => 'Purchase added successfully'], 200);
    }
    // get purchase by id
    public function getPurchaseById($id)
    {

        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['message' => 'Purchase not found'], 404);
        }
        $purchaseDetails = PurchaseDetail::join('product as p', 'purchase_detail.id_product', '=', 'p.id')
            ->where('purchase_detail.id_purchase', $purchase->id)
            ->select('purchase_detail.id', 'purchase_detail.id_purchase', 'purchase_detail.id_product', 'p.name', 'purchase_detail.quantity', 'purchase_detail.price', DB::raw('purchase_detail.quantity * purchase_detail.price AS total'))
            ->get();
        // Trả về response JSON với mảng kết quả
        return response()->json($purchaseDetails);
    }
    // edit purchase
    public function editPurchase($id)
    {
        $purchase = Purchase::find($id);
        $purchaseId = $id;
        $product = PurchaseDetail::join('product as p', 'purchase_detail.id_product', '=', 'p.id')
            ->where('purchase_detail.id_purchase', $purchase->id)
            ->select('purchase_detail.id_product')
            ->get();
        $products = product::Select('id', 'name')
            ->whereNotIn('id', $product)
            ->get();
        $purchaseDetails = PurchaseDetail::join('product as p', 'purchase_detail.id_product', '=', 'p.id')
            ->where('purchase_detail.id_purchase', $purchase->id)
            ->select('purchase_detail.id', 'purchase_detail.id_purchase', 'purchase_detail.id_product', 'p.name', 'purchase_detail.quantity', 'purchase_detail.price', DB::raw('purchase_detail.quantity * purchase_detail.price AS total'))
            ->get();
        return view('admin.editPurchase', compact('purchase', 'purchaseDetails', 'products', 'purchaseId'));
    }
    // insertPurchaseById
    public function insertPurchaseById(request $request)
    {
        $products = $request->input('products');
        $purchaseId = $request->input('purchaseId');
        // Tạo đối tượng Purchase và lưu thông tin
        $purchase = Purchase::find($purchaseId);

        // Lưu purchase vào database
        $purchase->save();

        // Tính toán và lưu thông tin chi tiết mua hàng
        $total = 0;
        foreach ($products as $product) {
            $purchaseDetail = new PurchaseDetail();
            $purchaseDetail->id_purchase = $purchase->id;
            $purchaseDetail->id_product = $product['productId'];
            $purchaseDetail->quantity = $product['quantity'];
            $purchaseDetail->price = $product['price'];
            $purchaseDetail->save();

            // Cập nhật tổng số tiền
            $total += $product['quantity'] * $product['price'];
            // Cập nhật số lượng sản phẩm
            $product = Product::find($product['productId']);
            $product->quantity += $product['quantity'];
            $product->save();
        }

        // Cập nhật tổng số tiền trong purchase
        $purchase->Total = $total;
        $purchase->save();

        // Trả về phản hồi thành công (status code 200) hoặc bất kỳ thông tin nào bạn muốn trả về

        return response()->json(['message' => 'Purchase added successfully'], 200);
    }
    // updatePurchaseById
    public function updatePurchaseById(request $request)
    {


        $purchaseDetail = $request->input('data');
        foreach ($purchaseDetail as $item) {
            $purchaseDetail = PurchaseDetail::find($item['id']);
            $product = Product::find($item['idProduct']);
            if ($product == null) {
                return response()->json(['message' => 'Product not found'], 404);
            } else {
                // get quantity product
                $quantityProduct = $product->quantity;
                // get old quantity purchase
                $oldQuantityPurchase = $purchaseDetail->quantity;
                $purchaseDetail->id_product = $item['idProduct'];
                $purchaseDetail->quantity = $item['quantity'];
                $purchaseDetail->price = $item['price'];
                $product->quantity = $quantityProduct - $oldQuantityPurchase + $item['quantity'];
                $product->save();
                $purchaseDetail->save();
            }
        }
        return response()->json(['message' => 'Purchase updated successfully'], 200);
    }
}
