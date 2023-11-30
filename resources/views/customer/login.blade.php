@extends('customer.layout.default')
@section('content')

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height"
        data-bg-image="{{ asset('assets_customers/assets/images/breadcrumb/bg/1-1-1919x388.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Đăng Nhập & Đăng Ký</h2>
                        <ul>
                            <li>
                                <a href="/">trang Chủ</a>
                            </li>
                            <li>Đăng Nhập | Đăng Ký</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-register-area section-space-y-axis-100">
        <div class="container">
            <div class="containerform" id="containerform" style="top: 50%; left: 50%;transform: translate(-50%, -50%);">
                <div class="form-container register-container">
                    <form class="form" action="/registerCustomer" method="POST">
                        @csrf
                        <h1>Đăng ký</h1>
                        <input class="input" type="text" placeholder="Tên" name="name" required />
                        <input class="input" type="text" placeholder="Số điện thoại" name="phone" required />
                        <input class="input" type="email" placeholder="Email" name="email" require />
                        <input class="input" type="password" placeholder="Mật khẩu" minlength="6" name="password" required />
                        <button class="button" type="submit">Đăng ký</button>
                    </form>
                </div>

                <div class="form-container login-container">
                    <form class="form" action="SignUpCustomer" method="POST">
                        @csrf
                        <h1>Đăng nhập</h1>
                        <input class="input" type="email" placeholder="Email" name="email" required />
                        <input class="input" type="password" placeholder="Mật Khẩu" minlength="6" name="password" required />
                        <button class="button" type="submit">Đăng nhập</button>
                    </form>
                </div>
                <div class="overlay-container">
                    <div class="overlay">
                        <div class="overlay-panel overlay-left">
                            <h1>Chào mừng quay trở lại!</h1>
                            <p>Để giữ kết nối với chúng tôi, vui lòng đăng nhập bằng thông tin cá nhân của bạn</p>
                            <button class="button ghost" id="login">Đăng nhập<i class="fa fa-sign-in"></i></button>
                        </div>
                        <div class="overlay-panel overlay-right">
                            <h1>Xin chào, Bạn của tôi ơi!</h1>
                            <p>Nhập thông tin cá nhân của bạn và bắt đầu hành trình với chúng tôi</p>
                            <button class="button ghost" id="register">Đăng ký <i class="fa fa-sign-up"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    const registerButton = document.getElementById('register');
    const loginButton = document.getElementById('login');
    const container = document.getElementById('containerform');
    registerButton.addEventListener('click', () => {
        container.classList.add('right-panel-active')
    });
    loginButton.addEventListener('click', () => {
        container.classList.remove('right-panel-active')
    });

</script>
<!-- Main Content Area End Here -->
@endsection;
