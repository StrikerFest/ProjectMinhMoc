@extends('admin.layout.default')
@section('content')

<div class="page-wrapper">
        <div class="page-content">
            <div class="card">
                <div class="card-body p-4">
                    <form action="/admin/product/editProduct/{{$product->id}}" method="POST" enctype="multipart/form-data">
                        {{ Method_field('POST') }}
                        @csrf
                        @method('POST')
                        <h5 class="card-title">Sửa Sản phẩm</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle"  class="form-label">Tên Cây</label>
                                            <input type="text" name="name" value="{{$product->name}}" class="form-control" id="inputProductTitle"
                                                placeholder="Nhập Tên Cây">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Mô tả</label>
                                            <textarea name="description" class="form-control"
                                                id="inputProductDescription" rows="3">{{$product->description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Ảnh Sản Phẩm</label>
                                            <input name="image" id="image-uploadify" type="file" value="{{$product->image}}"
                                                accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                                multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <label for="inputCostPerPrice" class="form-label">Giá Bán</label>
                                                <input type="number" value="{{$product->export_price}}" name="export_price" class="form-control"
                                                    id="inputCostPerPrice" placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Số Lượng</label>
                                                <input type="text" value="{{$product->quantity}}" name="quantity" class="form-control"
                                                    id="inputStarPoints" >
                                            </div>
                                            <div class="col-12">
                                                <label for="inputProductType" class="form-label">Loại Cây</label>
                                                <select name="id_category" class="form-select" id="inputProductType">
                                                    @foreach($productCategory as $productCategory1)
                                                        <option value="{{ $productCategory1->id }}">
                                                            {{ $productCategory1->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-light">Sửa Sản Phẩm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
