@extends('admin.layout.default')
@section('content')

@if($product==null)
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">eCommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin/product"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-light">Settings</button>
                            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button> -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <!-- <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item"
                                    href="javascript:;">Separated link</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <form action="/admin/addNewProduct2" method="POST" enctype="multipart/form-data">
                        {{ Method_field('POST') }}
                        @csrf
                        @method('POST')
                        <h5 class="card-title">Thêm Sản Phẩm</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Tên Cây</label>
                                            <input type="text" name="name" class="form-control" id="inputProductTitle"
                                                placeholder="Nhập Tên Cây">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Mô tả</label>
                                            <textarea name="description" class="form-control"
                                                id="inputProductDescription" rows="3"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Ảnh Sản Phẩm</label>
                                            <input name="image" id="image-uploadify" type="file"
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
                                                <input type="number" name="export_price" class="form-control"
                                                    id="inputCostPerPrice" placeholder="00.00">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Số Lượng</label>
                                                <input type="text" name="quantity" class="form-control"
                                                    id="inputStarPoints" placeholder="00.00">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputProductType" class="form-label">Loại Cây</label>
                                                <select name="id_category" class="form-select" id="inputProductType">
                                                    @foreach($productCategory as $productCategory)
                                                        <option value="{{ $productCategory->id }}">
                                                            {{ $productCategory->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-light">Thêm Sản Phẩm</button>
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
@else
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">eCommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="/admin/product"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Sửa Sản Phẩm</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <!-- <button type="button" class="btn btn-light">Settings</button>
                            <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                            </button> -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <!-- <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item"
                                    href="javascript:;">Separated link</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

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
                                            <p>Ảnh sản phẩm</p>
                                            <input name="image" type="file" value="{{$product->image}}"
                                                accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf">{{$product->image}} </input>
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
                                                    @foreach($productCategory as $productCategory)
                                                        <option value="{{ $productCategory->id }}">
                                                            {{ $productCategory->name }}</option>
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
                            <!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif


<!--end page wrapper -->
<!--start overlay-->
@endsection
