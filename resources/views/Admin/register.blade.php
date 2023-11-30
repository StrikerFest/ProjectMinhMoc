<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- loader-->
    <link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
    <title>Minh - Mộc Admin</title>
</head>

<body class="bg-theme bg-theme2">
<!--wrapper-->
<div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                <div class="col mx-auto">
                    <div class="mb-4 text-center">
                        <img src="{{ asset('assets/images/logo-img.png') }}" width="180" alt="" />
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Đăng Nhập</h3>
                                </div>
                                <div class="d-grid">
                                </div>
                                <div class="form-body">
                                    <form action="/admin/newAdmin" method="post">
                                        @Method('POST')
                                        @csrf
                                        <input type="hidden" name="status" value="1">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>
<!--end wrapper-->
<!--start switcher-->
<div class="switcher-wrapper">
    <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
    </div>
    <div class="switcher-body">
        <div class="d-flex align-items-center">
            <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
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
<!--end switcher-->


<!--plugins-->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            let passwordInput = $('#show_hide_password input');
            let passwordI = $('#show_hide_password i');
            if (passwordInput.attr("type") === "text") {
                passwordInput.attr('type', 'password');
                passwordI.addClass("bx-hide");
                passwordI.removeClass("bx-show");
            } else if (passwordInput.attr("type") === "password") {
                passwordInput.attr('type', 'text');
                passwordI.removeClass("bx-hide");
                passwordI.addClass("bx-show");
            }
        });
    });

</script>

<script>
    $(".switcher-btn").on("click", function () {
        $(".switcher-wrapper").toggleClass("switcher-toggled")
    });
    $(".close-switcher").on("click", function () {
        $(".switcher-wrapper").removeClass("switcher-toggled")
    });

    // TODO: CLEAN THIS
    $('#theme1').click(theme1);
    $('#theme2').click(theme2);
    $('#theme3').click(theme3);
    $('#theme4').click(theme4);
    $('#theme5').click(theme5);
    $('#theme6').click(theme6);
    $('#theme7').click(theme7);
    $('#theme8').click(theme8);
    $('#theme9').click(theme9);
    $('#theme10').click(theme10);
    $('#theme11').click(theme11);
    $('#theme12').click(theme12);
    $('#theme13').click(theme13);
    $('#theme14').click(theme14);
    $('#theme15').click(theme15);

    function theme1() {
        $('body').attr('class', 'bg-theme bg-theme1');
    }

    function theme2() {
        $('body').attr('class', 'bg-theme bg-theme2');
    }

    function theme3() {
        $('body').attr('class', 'bg-theme bg-theme3');
    }

    function theme4() {
        $('body').attr('class', 'bg-theme bg-theme4');
    }

    function theme5() {
        $('body').attr('class', 'bg-theme bg-theme5');
    }

    function theme6() {
        $('body').attr('class', 'bg-theme bg-theme6');
    }

    function theme7() {
        $('body').attr('class', 'bg-theme bg-theme7');
    }

    function theme8() {
        $('body').attr('class', 'bg-theme bg-theme8');
    }

    function theme9() {
        $('body').attr('class', 'bg-theme bg-theme9');
    }

    function theme10() {
        $('body').attr('class', 'bg-theme bg-theme10');
    }

    function theme11() {
        $('body').attr('class', 'bg-theme bg-theme11');
    }

    function theme12() {
        $('body').attr('class', 'bg-theme bg-theme12');
    }

    function theme13() {
        $('body').attr('class', 'bg-theme bg-theme13');
    }

    function theme14() {
        $('body').attr('class', 'bg-theme bg-theme14');
    }

    function theme15() {
        $('body').attr('class', 'bg-theme bg-theme15');
    }

</script>
</body>
</html>
