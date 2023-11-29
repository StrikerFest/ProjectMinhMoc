@extends('customer.layout.default')
@section('content')


<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('assets_customers/assets/images/breadcrumb/bg/1-1-1919x388.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Contact</h2>
                        <ul>
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-form-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-wrap">
                        <div class="contact-info text-white" data-bg-image="{{asset('assets_customers/assets/images/contact/1-1-370x500.jpg')}}">
                            <h2 class="contact-title">Thông Tin Liên Hệ:</h2>
                            <ul class="contact-list">
                                <li>
                                    <i class="pe-7s-call"></i>
                                    <a href="tel://0942603115">0942603115</a>
                                </li>
                                <li>
                                    <i class="pe-7s-mail"></i>
                                    <a href="mailto://info@example.com">cuahangminhmoc</a>
                                </li>
                                <li>
                                    <i class="pe-7s-map-marker"></i>
                                    <span>A17, Tạ Quang Bửu , Hà Nội </span>
                                </li>
                            </ul>
                        </div>
                        <form id="contact-form" class="contact-form"
                            action="https://whizthemes.com/mail-php/mamunur/pronia/pronia.php">
                            <div class="group-input">
                                <div class="form-field me-lg-30 mb-35 mb-lg-0">
                                    <input type="text" name="con_firstName" placeholder="Họ*"
                                        class="input-field" required>
                                </div>
                                <div class="form-field mb-35">
                                    <input type="text" name="con_lastName" placeholder="Tên*" class="input-field" required>
                                </div>
                            </div>
                            <div class="group-input mb-35">
                                <div class="form-field me-lg-30 mb-35 mb-lg-0">
                                    <input type="text" name="con_phone" placeholder="Số điện thoại*" class="input-field" required>
                                </div>
                                <div class="form-field">
                                    <input type="text" name="con_email" placeholder="Email*" class="input-field" required>
                                </div>
                            </div>
                            <div class="form-field mb-5">
                                <textarea name="con_message" placeholder="Sẵn sàng lắng nghe" class="textarea-field" required></textarea>
                            </div>
                            <div class="contact-button-wrap">
                                <button type="submit" class="btn btn btn-custom-size xl-size btn-pronia-primary" >Gửi Tâm sự
                                </button>
                            </div>
                            <p class="form-message mt-3 mb-0"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-with-map">
        <div class="contact-map">
            <iframe class="contact-map-size"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.719050887819!2d105.84493117492828!3d21.003896180639224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac743b1a8db1%3A0x5cb621a8527618d6!2zQTE3IFAuIFThuqEgUXVhbmcgQuG7rXUsIELDoWNoIEtob2EsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1690392523946!5m2!1sen!2s"
                allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
</main>

@endsection
