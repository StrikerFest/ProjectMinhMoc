<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon"
        href="{{ asset('assets/images/logo-img.png+++++++++++++++++') }}"
        type="image/png" />
    <!--plugins-->
    <link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/select2-bootstrap4.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- Date Picker CSS -->
    <link
        href="{{ asset('assets/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/css/datetimepicker/css/classic.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/datetimepicker/css/classic.date.css') }}"
        rel="stylesheet">


    <!-- loader-->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">

    <script src="{{ asset('vendor/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 500,
            // theme: 'modern',
            plugins: 'image',
            toolbar: 'insertfile undo redo|heading | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  |image',
            extended_valid_elements: 'span[style|class|color]',
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '/upload/image',
            file_picker_types: 'image',
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                };
                input.click();
            },
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });

    </script>
    <!-- summer note -->
    <title>Minh Mộc - Admin</title>
</head>

<body class="bg-theme bg-theme2">
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon"
                        alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">Minh - Mộc</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="/admin">
                        <div class="parent-icon"><i class='bx bx-home-circle'></i>
                        </div>
                        <div>Trang Chủ</div>
                    </a>
                </li>
                <li>

                    <a href="/admin/statistical">Thống kê</a>
                </li>

                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Quản lý</div>
                    </a>
                    <ul>
                        <li> <a href="/admin/product"><i class="bx bx-right-arrow-alt"></i>Sản Phẩm</a>
                        </li>
                        <li> <a href="/admin/category"><i class="bx bx-right-arrow-alt"></i>Loại Sản Phẩm</a>
                        </li>
                        <li> <a href="/allorder"><i class="bx bx-right-arrow-alt"></i>Hóa Đơn</a>
                        </li>
                        <li> <a href="/admin/comment"><i class="bx bx-right-arrow-alt"></i>Bình Luận</a></li>
                        <li> <a href="/admin/customer"><i class="bx bx-right-arrow-alt"></i>Khách Hàng</a></li>
                    </ul>

                </li>

            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="search-bar flex-grow-1">
                        <!-- <div class="position-relative search-bar-box">
                            <input type="text" class="form-control search-control" placeholder="Type to search...">
                            <span class="position-absolute top-50 search-show translate-middle-y"><i
                                    class='bx bx-search'></i></span>
                            <span class="position-absolute top-50 search-close translate-middle-y"><i
                                    class='bx bx-x'></i></span>
                        </div> -->
                    </div>
                    <di class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">
                                <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <!-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a> -->
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a> -->
                                    <div class="header-notifications-list">

                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">

                                <div class="dropdown-menu dropdown-menu-end">

                                    <div class="header-message-list">

                                    </div>

                                </div>
                            </li>
                        </ul>
                    </di>
                    <!-- <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/avatars/avatar-2.png') }}" class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">Pauline Seitz</p>
                                <p class="designattion mb-0">Web Designer</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-cog"></i><span>Settings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-home-circle'></i><span>Dashboard</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-download'></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div> -->
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        @yield('content')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--><a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2023. By ChuMin.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Thay đổi giao diện</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr />
            <p class="mb-0">Gaussian Texture</p>
            <hr>

            <ul class="switcher">
                <li id="theme1"></li>
                <li id="theme2"></li>
                <li id="theme3"></li>
                <li id="theme4"></li>
                <li id="theme5"></li>
                <li id="theme6"></li>
            </ul>
            <hr>
            <p class="mb-0">Gradient Background</p>
            <hr>

            <ul class="switcher">
                <li id="theme7"></li>
                <li id="theme8"></li>
                <li id="theme9"></li>
                <li id="theme10"></li>
                <li id="theme11"></li>
                <li id="theme12"></li>
                <li id="theme13"></li>
                <li id="theme14"></li>
                <li id="theme15"></li>
            </ul>
        </div>
    </div>
    <!-- popup -->


    <!-- end popup -->


    </script>
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}">
    </script>
    <script src="{{ asset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}">
    </script>
    <script>
        $(document).ready(function () {
            $('#Transaction-History').DataTable({
                lengthMenu: [
                    [6, 10, 20, -1],
                    [6, 10, 20, 'Todos']
                ]
            });
        });

    </script>

    <!-- <script>
        new PerfectScrollbar('.product-list');
        new PerfectScrollbar('.customers-list');
    </script> -->
    <script src="{{ asset('assets/plugins/Drag-And-Drop/dist/imageuploadify.min.js') }}">
    </script>
    <!--app JS-->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- summernote -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace()

    </script>
    <script>
        $(document).ready(function () {
            $('#image-uploadify').imageuploadify();
        })

    </script>

</body>

</html>
