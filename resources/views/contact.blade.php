@extends('layouts.app', ['title' => 'ارتباط با من', 'my_class' => 'contact'])

@section('content')

<!-- Page Title Starts -->
<section class="title-section text-left text-sm-center revealator-slideup revealator-once revealator-delay1">
    <h1>ارتباط <span>با من</span></h1>
    <span class="title-bg">ارتباط</span>
</section>
<!-- Page Title Ends -->
<!-- Main Content Starts -->
<section class="main-content revealator-slideup revealator-once revealator-delay1">
    <div class="container">
        <div class="row">
            <!-- Left Side Starts -->
            <div class="col-12 col-lg-4">
                <h3 class="text-uppercase custom-title mb-0 ft-wt-600 pb-3">خجالت نکشید!</h3>
                <p class="open-sans-font mb-3">در صورت تمایل با من در تماس باشید. من همیشه در مورد بحث درباره پروژه های جدید ، ایده های خلاقانه یا فرصت هایی که بخشی از دیدگاه های شما باشد ، باز هستم.</p>
                <p class="open-sans-font custom-span-contact position-relative">
                    <i class="fa fa-envelope-open position-absolute"></i>
                    <span class="d-block">ایمیل من</span>steve@mail.com
                </p>
                <p class="open-sans-font custom-span-contact position-relative">
                    <i class="fa fa-phone-square position-absolute"></i>
                    <span class="d-block">تلفن من</span>09013234324
                </p>
                <ul class="social list-unstyled pt-1 mb-5">
                    <li class="facebook"><a title="Facebook" href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="twitter"><a title="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="youtube"><a title="Youtube" href="#"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li class="dribbble"><a title="Dribbble" href="#"><i class="fa fa-dribbble"></i></a>
                    </li>
                </ul>
            </div>
            <!-- Left Side Ends -->
            <!-- Contact Form Starts -->
            <div class="col-12 col-lg-8">
                <form class="contactform" method="post" action="https://tunis.setinco.com/dark/php/process-form.php">
                    <div class="contactform">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <input type="text" name="name" placeholder="نام شما ">
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="email" name="email" placeholder="ایمیل شما ">
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="text" name="subject" placeholder="موضوع شما ">
                            </div>
                            <div class="col-12">
                                <textarea name="message" placeholder="پیغام شما"></textarea>
                                <button type="submit" class="button">
                                    <span class="button-text">ارسال پیام</span>
                                    <span class="button-icon fa fa-send"></span>
                                </button>
                            </div>
                            <div class="col-12 form-message">
                                <span class="output_message text-center font-weight-600 text-uppercase"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Contact Form Ends -->
        </div>
    </div>

</section>
<!-- Main Content Ends -->

@endsection
